<style>
    :root {
        --page-bg: #f5f5f4;
        --panel-blue: #f5f7fb;
        --accent-gold: #d6c09a;
        --accent-gold-dark: #b79f7b;
        --accent-blue: #4f6f96;
        --accent-blue-soft: #6d8fb5;
        --text-main: #374151;
        --text-muted: #6b7280;

        --c-principal: #d6c09a;
        --c-home-ins: #86a8b6;
        --c-taxes: #d1d5db;
        --c-mortgage-ins: #ffffff;
        --c-hoa: #9ca3ff;
        --c-extra: #c58a2a;
    }

    * {
        box-sizing: border-box;
    }

    

    .field {
        display: flex;
        flex-direction: column;
        gap: 4px;
        margin-bottom: 14px;
    }

    .field label {
        font-size: 12px;
        color: var(--text-muted);
    }

    .field-row {
        display: grid;
        grid-template-columns: minmax(0, 1.4fr) minmax(0, 0.8fr);
        gap: 12px;
    }

    .field input,
    .field select {
        padding: 0 10px;
        height: 58px;
        line-height: 56px;
        border-radius: 10px;
        border: 1px solid #D9D9D9;
        font-size: 14px;
        outline: none;
        background: #ffffff;
        transition: border-color 0.15s, box-shadow 0.15s;
    }

    .field input:hover {
        border: 1px solid #D9D9D9;
    }

    .field input:focus,
    .field select:focus {
        border-color: #7BA1BA;
        box-shadow: 0 0 0 1px rgba(79, 70, 229, 0.12);
    }

    .suffix-row {
        display: grid;
        grid-template-columns: 1fr auto;
        align-items: center;

        position: relative;
    }

    .suffix {
        font-size: 12px;
        color: var(--text-muted);
        position: absolute;
        right: 10px;
    }

    .advanced {
        margin: 10px 0 6px;
        font-size: 12px;
        font-weight: 500;
        color: #1E1E1E;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 20px;
    }

    .open.advanced span {
        transform: rotate(180deg);
    }

    .advanced-wrap{
        display: none;
    }
   .open.advanced-wrap{
        display: block;
    }

    .reset-row {
        margin-top: 10px;
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        color: var(--text-muted);
        justify-content: center;
        cursor: pointer;
        user-select: none;
    }

    .reset-row span:first-child {
        font-size: 14px;
    }

    /* ---------- CENTER PANEL (DONUT) ---------- */

    .center-panel {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    
    .center-title {
        font-size: 20px;
        font-weight: 500;
        margin-bottom: 16px;
    }

    .chart-card {
        background: #fbf9f5;
        border-radius: 30px;
        padding: 26px 22px 18px;
        width: 100%;
        box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
    }

    .chart-wrapper {
        position: relative;
        width: 260px;
        height: 260px;
        margin: 0 auto 18px;
    }

    .chart-wrapper svg {
        width: 100%;
        height: 100%;
        transform: rotate(-90deg);
    }

    .donut-bg {
        fill: none;
        stroke: #e5e7eb;
        stroke-width: 16;
    }

    .donut-segment {
        fill: none;
        stroke-width: 16;
        stroke-linecap: round;
        stroke-dasharray: 0 999;
        stroke-dashoffset: 0;
        transition: stroke-dasharray 0.4s ease, stroke-dashoffset 0.4s ease;
    }

    .seg-principal {
        stroke: var(--c-principal);
    }

    .seg-home-ins {
        stroke: var(--c-home-ins);
    }

    .seg-taxes {
        stroke: var(--c-taxes);
    }

    .seg-mortgage-ins {
        stroke: var(--c-mortgage-ins);
    }

    .seg-hoa {
        stroke: var(--c-hoa);
    }

    .seg-extra {
        stroke: var(--c-extra);
    }

    .donut-center {
        position: absolute;
        inset: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        pointer-events: none;
    }

    .donut-title {
        font-size: 13px;
        color: var(--text-muted);
        margin-bottom: 4px;
    }

    .donut-amount {
        font-size: 34px;
        font-weight: 500;
        color: var(--accent-blue);
    }

    .donut-note {
        margin-top: 4px;
        font-size: 11px;
        color: var(--text-muted);
    }

    .legend {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 6px 12px;
        margin-top: 8px;
    }

    @media (max-width: 900px) {
        .legend {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    .legend-item {
        display: flex;
        align-items: center;
        gap: 7px;
        font-size: 11px;
        color: #4b5563;
    }

    .legend-swatch {
        width: 14px;
        height: 14px;
        border-radius: 4px;
    }

    .legend-label {
        flex: 1;
    }

    .legend-value {
        font-weight: 500;
        color: #111827;
    }

    .legend-swatch.principal {
        background: var(--c-principal);
    }

    .legend-swatch.home-ins {
        background: var(--c-home-ins);
    }

    .legend-swatch.taxes {
        background: var(--c-taxes);
    }

    .legend-swatch.mortgage-ins {
        background: var(--c-mortgage-ins);
        border: 1px solid #e5e7eb;
    }

    .legend-swatch.hoa {
        background: var(--c-hoa);
    }

    .legend-swatch.extra {
        background: var(--c-extra);
    }


    .btn-tab-primary,
    .btn-tab-outline {
        flex: 0 0 auto;
        min-width: 140px;
        padding: 0 16px;
        height: 58px;
        line-height: 56px;
        border-radius: 10px;
        font-size: 13px;
        cursor: pointer;
        text-align: center;
    }

    .btn-tab-primary {
        background: #D8C3A5;
        border: none;
        color: #fff;
    }

    .btn-tab-outline {
        background: transparent;
        border: 1px solid #7BA1BA;
        color: var(--accent-blue);
    }

    input {
        color: #1E1E1E !important;
    }

    .donut-tooltip {
        position: absolute;
        left: 0;
        top: 0;
        transform: translate(-50%, -110%);
        background: rgba(17, 24, 39, 0.92);
        color: #fff;
        font-size: 12px;
        padding: 8px 10px;
        border-radius: 999px;
        box-shadow: 0 10px 22px rgba(0, 0, 0, 0.18);
        opacity: 0;
        pointer-events: none;
        transition: opacity .12s ease, transform .12s ease;
        white-space: nowrap;
        z-index: 5;
    }

    .donut-tooltip.is-visible {
        opacity: 1;
        transform: translate(-50%, -120%);
    }

    .donut-tooltip::after {
        content: "";
        position: absolute;
        left: 50%;
        bottom: -6px;
        transform: translateX(-50%);
        width: 0;
        height: 0;
        border-left: 7px solid transparent;
        border-right: 7px solid transparent;
        border-top: 7px solid rgba(17, 24, 39, 0.92);
    }


    /* Hover/active эффект сегмента */
    .donut-segment {
        cursor: pointer;
        filter: saturate(1);
        transition: stroke-dasharray .4s ease, stroke-dashoffset .4s ease, filter .15s ease, transform .15s ease;
        transform-origin: 110px 110px; /* центр SVG */
    }

    .donut-segment.is-active {
        filter: brightness(0.92);
        transform: scale(1.012);
    }

    /* Легенда: hover/active */
    .legend-item {
        border-radius: 12px;
        padding: 6px 8px;
        transition: background .15s ease, transform .15s ease;
    }

    .legend-item.is-active {
        background: rgba(17, 24, 39, 0.04);
        transform: scale(1.02);
    }

    /* Скрытие секций (если сумма = 0) */
    .is-hidden {
        display: none !important;
    }
</style>

<!-- begin mortgageCalculator -->
<section id="mortgageCalculator" class="mortgageCalculator section">
    <div class="container_center">
        <h1 class="section__title"><?php the_title(); ?></h1>
        <div class="mortgageCalculator__layout">

            <div class="mortgageCalculator__aside">
                <!-- FORM -->
                <div class="left-panel">
                    <div class="section__label">Let's calculate your monthly mortgage payment</div>
        
                    <form id="mortgage-form">
                        <div class="field">
                            <label for="home_price">Home Price</label>
                            <input type="number" id="home_price" value="400000" min="0" step="1000" placeholder="$400,000">
                        </div>
        
                        <div class="field-row">
                            <div class="field">
                                <label for="down_payment">Down Payment</label>
                                <input type="number" id="down_payment" value="40000" min="0" step="1000" placeholder="$400,00">
                            </div>
                            <div class="field">
                                <label for="down_payment_percent">&nbsp;</label>
                                <div class="suffix-row">
                                    <input type="number" id="down_payment_percent" value="10" min="0" max="100" step="0.1">
                                    <div class="suffix">%</div>
                                </div>
                            </div>
                        </div>
        
                        <div class="field-row">
        
        
                        </div>
                        <div class="field">
                            <label for="loan_term">Loan Term</label>
                            <select class="select" id="loan_term">
                                <option value="15">15 Years</option>
                                <option value="20">20 Years</option>
                                <option value="25">25 Years</option>
                                <option value="30" selected>30 Years</option>
                            </select>
                        </div>
                        <div class="field">
                            <label for="interest_rate">Interest Rate</label>
                            <div class="suffix-row">
                                <input type="number" id="interest_rate" value="5.625" min="0" max="40" step="0.001">
                                <div class="suffix">%</div>
                            </div>
                        </div>
        
                        <div class="advanced open">Advanced Options
                            <span>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 9L12 15L18 9" stroke="#697586" stroke-width="2" stroke-linecap="square"/>
                                </svg>
                            </span>
                        </div>
        
                        <div class="advanced-wrap open">
                            <div class="field-row">
                                <div class="field">
                                    <label for="home_insurance">Homeowner's Insurance</label>
                                    <input type="number" id="home_insurance" value="50" min="0" step="10">
                                </div>
                                <div class="field">
                                    <label for="property_taxes">Property Taxes</label>
                                    <input type="number" id="property_taxes" value="100" min="0" step="10">
                                </div>
                            </div>
        
                            <div class="field-row">
                                <div class="field">
                                    <label for="mortgage_insurance">Mortgage Insurance</label>
                                    <input type="number" id="mortgage_insurance" value="80" min="0" step="10">
                                </div>
                                <div class="field">
                                    <label for="hoa">HOA</label>
                                    <input type="number" id="hoa" value="60" min="0" step="10">
                                </div>
                            </div>
        
                            <div class="field">
                                <label for="additional_payment">Additional Payment</label>
                                <input type="number" id="additional_payment" value="0" min="0" step="10">
                            </div>
                        </div>
        
                        <button type="submit" class="btn btn-primary">Calculate</button>
        
                        <div class="reset-row" id="reset-btn">
                            <span>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.16992 14.83L14.8299 9.16998" stroke="#525252" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.8299 14.83L9.16992 9.16998" stroke="#525252" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <span>Reset Calculator</span>
                        </div>
        
                    </form>
                </div>
                
            </div>

            <div class="mortgageCalculator__content">
                <div class="mortgageCalculator__row">
                    <div class="mortgageCalculator__col chart">
                        <!-- DONUT CHART -->
                        <div class="center-panel">
                            <div class="section__subtitle">Monthly Payment Breakdown</div>
                            <div class="chart-card">
                                <div class="chart-wrapper">
                                    <svg viewBox="0 0 220 220">
                                        <circle class="donut-bg" cx="110" cy="110" r="90"/>
                                        <circle class="donut-segment seg-principal" cx="110" cy="110" r="90"/>
                                        <circle class="donut-segment seg-home-ins" cx="110" cy="110" r="90"/>
                                        <circle class="donut-segment seg-taxes" cx="110" cy="110" r="90"/>
                                        <circle class="donut-segment seg-mortgage-ins" cx="110" cy="110" r="90"/>
                                        <circle class="donut-segment seg-hoa" cx="110" cy="110" r="90"/>
                                        <circle class="donut-segment seg-extra" cx="110" cy="110" r="90"/>
                                    </svg>
                                    <div id="donut-tooltip" class="donut-tooltip" aria-hidden="true"></div>
                
                                    <div class="donut-center">
                                        <div class="donut-title">Estimated monthly payment</div>
                                        <div id="payment-amount" class="donut-amount">$0</div>
                                        <div class="donut-note" id="loan-summary"></div>
                                    </div>
                                </div>
                
                
                            </div>
                            <div class="legend">
                                <div class="legend-item">
                                    <div class="legend-swatch principal"></div>
                                    <div class="legend-label">Principal &amp; Interest</div>
                                    <div class="legend-value" id="legend-principal">$0</div>
                                </div>
                                <div class="legend-item">
                                    <div class="legend-swatch home-ins"></div>
                                    <div class="legend-label">Homeowner's Insurance</div>
                                    <div class="legend-value" id="legend-home-ins">$0</div>
                                </div>
                                <div class="legend-item">
                                    <div class="legend-swatch taxes"></div>
                                    <div class="legend-label">Property Taxes</div>
                                    <div class="legend-value" id="legend-taxes">$0</div>
                                </div>
                                <div class="legend-item">
                                    <div class="legend-swatch mortgage-ins"></div>
                                    <div class="legend-label">Mortgage Insurance</div>
                                    <div class="legend-value" id="legend-mortgage-ins">$0</div>
                                </div>
                                <div class="legend-item">
                                    <div class="legend-swatch hoa"></div>
                                    <div class="legend-label">HOA</div>
                                    <div class="legend-value" id="legend-hoa">$0</div>
                                </div>
                                <div class="legend-item">
                                    <div class="legend-swatch extra"></div>
                                    <div class="legend-label">Additional Payment</div>
                                    <div class="legend-value" id="legend-extra">$0</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mortgageCalculator__col">
                        <?php if (get_field('mortgageCalculator_top_content')) { ?>
                            <div class="section__content"><?php the_field('mortgageCalculator_top_content'); ?></div>
                        <?php } ?>
                        <?php render_section_buttons('mortgageCalculator_first_btn','mortgageCalculator_second_btn'); ?>                 
                    </div>
                </div>

                <div class="mortgageCalculator__row">
                    <?php if (get_field('mortgageCalculator_left_content')) { ?>
                        <div class="mortgageCalculator__col">
                            <div class="section__content"><?php the_field('mortgageCalculator_left_content'); ?></div>
                        </div>
                    <?php } ?>
                    <?php if (get_field('mortgageCalculator_right_content')) { ?>
                        <div class="mortgageCalculator__col">
                            <div class="section__content"><?php the_field('mortgageCalculator_right_content'); ?></div>
                        </div>
                    <?php } ?>
                </div>

                <?php 
                $list = get_field('faq_list');
                if( $list && get_field('faq_boolean') ) { ?>
                <div class="mortgageCalculator__row">
                    <div class="mortgageCalculator__col">
                        <!-- begin faq -->
                        <div class="faq user_select_none">
                            <div class="faq__content">
                                <?php foreach( $list as $item ) { ?>
                                    <div class="collapse" data-collapse-wrapper="">
                                        <div class="collapse__title" data-collapse=""><span><?php echo $item['faq_question']; ?></span></div>
                                        <div class="collapse__body" data-collapse-body="">
                                            <div class="section__content"><?php echo $item['faq_answer']; ?></div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- end faq -->
                    </div>
                </div>
                <?php } ?>
               
            </div>
        </div>
    </div>
</section>
<!-- end mortgageCalculator -->