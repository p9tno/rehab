
    // ------------------------------
    // DOM
    // ------------------------------
    const form = document.getElementById('mortgage-form');
    const resetBtn = document.getElementById('reset-btn');

    const chartWrapperEl = document.querySelector('.chart-wrapper');

    const paymentAmountEl = document.getElementById('payment-amount');
    const loanSummaryEl   = document.getElementById('loan-summary');
    const tooltipEl       = document.getElementById('donut-tooltip');

    // Inputs
    const homePriceEl = document.getElementById('home_price');
    const downPaymentEl = document.getElementById('down_payment');
    const downPaymentPercentEl = document.getElementById('down_payment_percent');
    const loanTermEl = document.getElementById('loan_term');
    const interestRateEl = document.getElementById('interest_rate');

    const homeInsuranceEl = document.getElementById('home_insurance');
    const propertyTaxesEl = document.getElementById('property_taxes');
    const mortgageInsuranceEl = document.getElementById('mortgage_insurance');
    const hoaEl = document.getElementById('hoa');
    const additionalPaymentEl = document.getElementById('additional_payment');

    // Segments
    const segPrincipal    = document.querySelector('.seg-principal');
    const segHomeIns      = document.querySelector('.seg-home-ins');
    const segTaxes        = document.querySelector('.seg-taxes');
    const segMortgageIns  = document.querySelector('.seg-mortgage-ins');
    const segHoa          = document.querySelector('.seg-hoa');
    const segExtra        = document.querySelector('.seg-extra');

    // Legend values
    const legendPrincipal   = document.getElementById('legend-principal');
    const legendHomeIns     = document.getElementById('legend-home-ins');
    const legendTaxes       = document.getElementById('legend-taxes');
    const legendMortgageIns = document.getElementById('legend-mortgage-ins');
    const legendHoa         = document.getElementById('legend-hoa');
    const legendExtra       = document.getElementById('legend-extra');

    // Legend item containers
    const legendItemPrincipal   = legendPrincipal.closest('.legend-item');
    const legendItemHomeIns     = legendHomeIns.closest('.legend-item');
    const legendItemTaxes       = legendTaxes.closest('.legend-item');
    const legendItemMortgageIns = legendMortgageIns.closest('.legend-item');
    const legendItemHoa         = legendHoa.closest('.legend-item');
    const legendItemExtra       = legendExtra.closest('.legend-item');

    // ------------------------------
    // Geometry / constants
    // ------------------------------
    const RADIUS = 90;
    const CIRCUMFERENCE = 2 * Math.PI * RADIUS;

    // SVG viewBox: 220x220, center = (110,110)
    const SVG_CENTER = { x: 110, y: 110 };

    // SVG is rotated -90deg, overlays are not -> shift overlay angles
    const ANGLE_OFFSET_RAD = -Math.PI / 2;

    // UI rule: values <= EPS are treated as zero (NOT drawn, NOT shown)
    const EPS = 0.5;

    const state = {
    lastTotal: 0,
    dpSyncLock: false,
    breakdown: null,        // last normalized breakdown
    totalLenMap: null,      // { [key]: {len, offset} } for tooltip
    bound: false,
};

    // ------------------------------
    // Utils
    // ------------------------------
    function clamp(num, min, max) {
    return Math.min(Math.max(num, min), max);
}

    function readNumberOrZero(inputEl) {
    const raw = inputEl?.value;
    if (raw === '' || raw == null) return 0;
    const n = Number(raw);
    return Number.isFinite(n) ? n : 0;
}

    function formatMoney(value) {
    return '$' + Number(value).toLocaleString('en-US', { maximumFractionDigits: 0 });
}

    function animateNumber(el, from, to, duration = 550) {
    if (!el) return;
    const start = performance.now();
    const diff = to - from;

    function tick(now) {
    const t = clamp((now - start) / duration, 0, 1);
    const eased = 1 - Math.pow(1 - t, 3); // easeOutCubic
    const current = Math.round(from + diff * eased);
    el.textContent = formatMoney(current);
    if (t < 1) requestAnimationFrame(tick);
}
    requestAnimationFrame(tick);
}

    // length on circumference -> angle radians (0 rad = 3 o'clock)
    function lengthToAngleRad(len) {
    return (len / CIRCUMFERENCE) * (Math.PI * 2);
}

    // Point on circle in SVG coords, with overlay offset applied
    function pointOnCircle(angleRad, radius) {
    const a = angleRad + ANGLE_OFFSET_RAD;
    return {
    x: SVG_CENTER.x + Math.cos(a) * radius,
    y: SVG_CENTER.y + Math.sin(a) * radius,
};
}

    // svg coords -> css px coords (responsive-safe)
    function svgToCssPx(svgX, svgY) {
    const w = chartWrapperEl?.clientWidth || 260;
    const h = chartWrapperEl?.clientHeight || 260;
    const scaleX = w / 220;
    const scaleY = h / 220;
    return { x: svgX * scaleX, y: svgY * scaleY };
}

    // ------------------------------
    // DP ↔ Percent sync
    // ------------------------------
    function syncDownPaymentToPercent() {
    if (state.dpSyncLock) return;
    state.dpSyncLock = true;

    const homePrice = readNumberOrZero(homePriceEl);
    const dp = readNumberOrZero(downPaymentEl);

    if (homePrice > 0) {
    const pct = (dp / homePrice) * 100;
    downPaymentPercentEl.value = (Math.round(pct * 10) / 10).toString();
} else {
    downPaymentPercentEl.value = '0';
}

    state.dpSyncLock = false;
}

    function syncPercentToDownPayment() {
    if (state.dpSyncLock) return;
    state.dpSyncLock = true;

    const homePrice = readNumberOrZero(homePriceEl);
    const pct = readNumberOrZero(downPaymentPercentEl);

    if (homePrice > 0) {
    const dp = homePrice * (pct / 100);
    downPaymentEl.value = Math.round(dp).toString();
} else {
    downPaymentEl.value = '0';
}

    state.dpSyncLock = false;
}

    function syncBothByPriority(priority = 'dp') {
    if (priority === 'pct') syncPercentToDownPayment();
    else syncDownPaymentToPercent();
}

    // ------------------------------
    // Mortgage formula
    // ------------------------------
    function calculateMonthlyPayment(P, annualRate, years) {
    const n = years * 12;
    if (P <= 0 || n <= 0) return 0;

    const r = annualRate / 100 / 12;
    if (r === 0) return P / n;

    const pow = Math.pow(1 + r, n);
    return P * (r * pow) / (pow - 1);
}

    // ------------------------------
    // Donut meta
    // ------------------------------
    const partsMeta = [
    { key: 'principal',   label: 'Principal & Interest',       el: segPrincipal,   legendEl: legendPrincipal,   legendItemEl: legendItemPrincipal },
    { key: 'homeIns',     label: "Homeowner's Insurance",      el: segHomeIns,     legendEl: legendHomeIns,     legendItemEl: legendItemHomeIns },
    { key: 'taxes',       label: 'Property Taxes',             el: segTaxes,       legendEl: legendTaxes,       legendItemEl: legendItemTaxes },
    { key: 'mortgageIns', label: 'Mortgage Insurance',         el: segMortgageIns, legendEl: legendMortgageIns, legendItemEl: legendItemMortgageIns },
    { key: 'hoa',         label: 'HOA',                        el: segHoa,         legendEl: legendHoa,         legendItemEl: legendItemHoa },
    { key: 'extra',       label: 'Additional Payment',         el: segExtra,       legendEl: legendExtra,       legendItemEl: legendItemExtra },
    ];

    function setSegment(el, segmentLength, offset) {
    el.style.strokeDasharray = `${segmentLength} ${CIRCUMFERENCE}`;
    el.style.strokeDashoffset = -offset;
}

    function resetSegment(el) {
    el.style.strokeDasharray = `0 ${CIRCUMFERENCE}`;
    el.style.strokeDashoffset = 0;
}

    function setSegmentVisible(part, visible) {
    // legend visibility
    part.legendItemEl.classList.toggle('is-hidden', !visible);

    // IMPORTANT:
    // hidden svg with dasharray=0 + stroke-linecap=round can render a "dot".
    // So we hide the segment element itself, not just dasharray.
    part.el.style.opacity = visible ? '1' : '0';
    part.el.style.visibility = visible ? 'visible' : 'hidden';
    part.el.style.pointerEvents = visible ? 'auto' : 'none';

    if (!visible) {
    resetSegment(part.el);
} else {
    // Keep rounded ends for visible segments (as requested)
    part.el.style.strokeLinecap = 'round';
}
}

    // ------------------------------
    // Tooltip
    // ------------------------------
    function showTooltip(text, cssX, cssY) {
    if (!tooltipEl) return;
    tooltipEl.textContent = text;
    tooltipEl.style.left = `${cssX}px`;
    tooltipEl.style.top  = `${cssY}px`;
    tooltipEl.classList.add('is-visible');
    tooltipEl.setAttribute('aria-hidden', 'false');
}

    function hideTooltip() {
    if (!tooltipEl) return;
    tooltipEl.classList.remove('is-visible');
    tooltipEl.setAttribute('aria-hidden', 'true');
}

    // ------------------------------
    // Active / Hover
    // ------------------------------
    function clearActive() {
    partsMeta.forEach(p => {
        p.el.classList.remove('is-active');
        p.legendItemEl.classList.remove('is-active');
    });
}

    function activatePart(partKey) {
        const part = partsMeta.find(p => p.key === partKey);
        if (!part || !state.breakdown || !state.totalLenMap) return;

        const value = Number(state.breakdown[partKey] || 0);
        if (value <= EPS) return;

        const info = state.totalLenMap[partKey];
        if (!info || info.len <= 0) return;

        clearActive();
        part.el.classList.add('is-active');
        part.legendItemEl.classList.add('is-active');

        // ✅ Было: середина сегмента (для principal это низ)
        // const midLen = info.offset + info.len / 2;

        // ✅ Стало: для principal — точка рядом со стартом (сверху, чуть вправо)
        const anchorFactor = (partKey === 'principal') ? 0.12 : 0.5; // 12% от длины
        const anchorLen = info.offset + info.len * anchorFactor;

        const angleRad = lengthToAngleRad(anchorLen);

        // tooltip чуть дальше от кольца (для читаемости)
        const pt = pointOnCircle(angleRad, RADIUS + 22);
        const css = svgToCssPx(pt.x, pt.y);

        showTooltip(`${part.label}: ${formatMoney(value)}`, css.x, css.y);
    }


    function bindInteractivityOnce() {
    if (state.bound) return;
    state.bound = true;

    partsMeta.forEach(p => {
    const onEnter = () => {
    if (!state.breakdown) return;
    if ((state.breakdown[p.key] || 0) <= EPS) return;
    activatePart(p.key);
};
    const onLeave = () => {
    clearActive();
    hideTooltip();
};

    p.legendItemEl.addEventListener('mouseenter', onEnter);
    p.legendItemEl.addEventListener('mouseleave', onLeave);

    p.el.addEventListener('mouseenter', onEnter);
    p.el.addEventListener('mouseleave', onLeave);
});
}

    bindInteractivityOnce();

    // ------------------------------
    // Update UI
    // ------------------------------
    function updateDonut(inputData) {
    // normalize: finite numbers only, EPS-threshold applied
    const data = {};
    partsMeta.forEach(p => {
    const n = Number(inputData[p.key] || 0);
    data[p.key] = (Number.isFinite(n) && n > EPS) ? n : 0;
});

    state.breakdown = data;

    const total = partsMeta.reduce((sum, p) => sum + (data[p.key] || 0), 0);

    // animate total
    animateNumber(paymentAmountEl, state.lastTotal, total, 550);
    state.lastTotal = total;

    // summary
    loanSummaryEl.textContent = total > 0
    ? `Includes ${formatMoney(data.principal || 0)} in principal & interest`
    : '';

    // Always reset segments first (prevents leftovers from previous runs)
    partsMeta.forEach(p => resetSegment(p.el));

    // Legend values + visibility (including hiding segments themselves)
    partsMeta.forEach(p => {
    const v = Math.round(data[p.key] || 0);
    p.legendEl.textContent = formatMoney(v);
    setSegmentVisible(p, v > 0);
});

    if (total <= 0) {
    state.totalLenMap = null;
    hideTooltip();
    clearActive();
    return;
}

    // build offsets only for visible segments
    state.totalLenMap = {};
    let offset = 0;

    partsMeta.forEach(p => {
    const value = data[p.key] || 0;

    if (value <= EPS) {
    state.totalLenMap[p.key] = { len: 0, offset: 0 };
    return;
}

    const len = (value / total) * CIRCUMFERENCE;

    // Keep rounded ends for visible segments
    p.el.style.strokeLinecap = 'round';

    setSegment(p.el, len, offset);
    state.totalLenMap[p.key] = { len, offset };

    offset += len;
});
}

    // ------------------------------
    // Collect + calc
    // ------------------------------
    function collectAndUpdate() {
    const homePrice = readNumberOrZero(homePriceEl);
    const dp = readNumberOrZero(downPaymentEl);

    const interestRate = readNumberOrZero(interestRateEl);
    const loanTerm = readNumberOrZero(loanTermEl);

    const homeIns = readNumberOrZero(homeInsuranceEl);
    const taxes = readNumberOrZero(propertyTaxesEl);
    const mortgageIns = readNumberOrZero(mortgageInsuranceEl);
    const hoa = readNumberOrZero(hoaEl);

    // FIX: empty -> 0, "0" -> 0, anything non-finite -> 0
    const extra = readNumberOrZero(additionalPaymentEl);

    const loanAmount = Math.max(homePrice - dp, 0);
    const principalMonthly = calculateMonthlyPayment(loanAmount, interestRate, loanTerm);

    updateDonut({
    principal: Math.round(principalMonthly),
    homeIns: Math.round(homeIns),
    taxes: Math.round(taxes),
    mortgageIns: Math.round(mortgageIns),
    hoa: Math.round(hoa),
    extra: Math.round(extra),
});
}

    // ------------------------------
    // Events
    // ------------------------------
    form.addEventListener('submit', (e) => {
    e.preventDefault();
    syncBothByPriority('dp');
    collectAndUpdate();
});

    // Live dp ↔ percent sync
    downPaymentEl.addEventListener('input', () => syncDownPaymentToPercent());
    downPaymentPercentEl.addEventListener('input', () => syncPercentToDownPayment());

    // If home price changes, dp is the source of truth
    homePriceEl.addEventListener('input', () => syncBothByPriority('dp'));

    // Recalc on change (not on each keystroke)
    [
    homePriceEl, downPaymentEl, downPaymentPercentEl,
    loanTermEl, interestRateEl,
    homeInsuranceEl, propertyTaxesEl, mortgageInsuranceEl, hoaEl, additionalPaymentEl
    ].forEach(el => {
    el.addEventListener('change', () => {
        syncBothByPriority('dp');
        collectAndUpdate();
    });
});

    resetBtn.addEventListener('click', () => {
    form.reset();

    homePriceEl.value = 0;
    downPaymentEl.value = 0;
    downPaymentPercentEl.value = 0;
    loanTermEl.value = 0;
    interestRateEl.value = 0;

    homeInsuranceEl.value = 0;
    propertyTaxesEl.value = 0;
    mortgageInsuranceEl.value = 0;
    hoaEl.value = 0;
    additionalPaymentEl.value = 0;

    syncBothByPriority('dp');
    state.lastTotal = 0;
    hideTooltip();
    clearActive();
    collectAndUpdate();
});

    // Initial render
    syncBothByPriority('dp');
    collectAndUpdate();

    document.addEventListener('DOMContentLoaded', () => {
        const advanced = document.querySelector('.advanced');
        const wrap = document.querySelector('.advanced-wrap');

        if (!advanced || !wrap) return;

        advanced.addEventListener('click', () => {
            advanced.classList.toggle('open');
            wrap.classList.toggle('open');
        });
    });