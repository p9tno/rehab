$(document).ready(function() {
    // ============================================
    // КОНФИГУРАЦИЯ И КОНСТАНТЫ
    // ============================================
    const CONFIG = {
        TRANSITION_DELAY: 500,
        DEBOUNCE_DELAY: 300,
        INITIAL_PRICE: 800000,
        INITIAL_PERCENT: 20,
        INITIAL_DOWN_PAYMENT: 160000
    };

    // ============================================
    // СОСТОЯНИЕ ПРИЛОЖЕНИЯ
    // ============================================
    const state = {
        totalQuestions: 0,
        currentQuestionId: 1,
        visibleQuestions: [1],
        userAnswers: {},
        currentPrice: CONFIG.INITIAL_PRICE,
        currentPercent: CONFIG.INITIAL_PERCENT,
        currentDownPayment: CONFIG.INITIAL_DOWN_PAYMENT,
        isTransitioning: false,
        debounceTimer: null
    };

    // ============================================
    // УТИЛИТЫ ДЛЯ ФОРМАТИРОВАНИЯ
    // ============================================
    const formatUtils = {
        formatNumberWithCommas: (number) => {
            const num = typeof number === 'string' 
                ? parseFloat(number.replace(/[^0-9.-]+/g, "")) 
                : number;
            if (isNaN(num)) return '0';
            const rounded = Math.round(num);
            return rounded.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        },

        formatPrice: (value) => `$${formatUtils.formatNumberWithCommas(value)}`,
        
        formatPercent: (value) => `${value}%`,
        
        getFormattedDownPayment: () => {
            const downPayment = (state.currentPrice * state.currentPercent) / 100;
            state.currentDownPayment = Math.round(downPayment);
            return formatUtils.formatPrice(state.currentDownPayment);
        }
    };

    // ============================================
    // УТИЛИТЫ ДЛЯ РАБОТЫ С DOM
    // ============================================
    const domUtils = {
        $quiz: () => $('#quiz'),
        $nextButton: () => $('.quiz-arrow__next'),
        $prevButton: () => $('.quiz-arrow__prev'),
        $submitButton: () => $('.quiz-submit'),
        $progressCurrent: () => $('.quiz-line__current'),
        $progressBar: () => $('.quiz-line__bg'),
        
        getQuestionElement: (questionId) => $(`.quiz-question[data-q="${questionId}"]`),
        
        getQuestionText: (questionId) => {
            const $question = domUtils.getQuestionElement(questionId);
            const title = $question.find('.quiz-question__title').text().trim();
            return title.replace(/<[^>]*>/g, '').replace(/\s+/g, ' ');
        },
        
        scrollToQuiz: () => {
            const quizScroll = domUtils.$quiz().offset().top;
            $('html, body').animate({
                scrollTop: quizScroll
            }, 300);
        },
        
        animateNumber: (start, end, duration, callback) => {
            const startTime = Date.now();
            const diff = end - start;
            
            const animate = () => {
                const elapsed = Date.now() - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const easeProgress = 1 - Math.pow(1 - progress, 3);
                const currentValue = start + (diff * easeProgress);
                
                callback(currentValue);
                
                if (progress < 1) {
                    requestAnimationFrame(animate);
                } else {
                    callback(end);
                }
            };
            
            animate();
        }
    };

    // ============================================
    // МЕНЕДЖЕР ВЕТВЛЕНИЯ
    // ============================================
    const branchManager = {
        branchQuestions: new Map(), // ID ветвления → номер вопроса
        questionParents: new Map(), // номер вопроса → ID родительского ветвления
        questionConditions: new Map(), // номер вопроса → условие показа
        branchIdToQuestionId: new Map(), // ID ветки → номер вопроса
        
        init: () => {
            // Сначала собираем все ветвящиеся вопросы
            $('[data-branch="true"]').each(function() {
                const $question = $(this);
                const questionId = parseInt($question.data('q'));
                const branchId = $question.data('branch-id');
                
                if (branchId) {
                    branchManager.branchQuestions.set(branchId, questionId);
                    // console.log(`Branch question ${branchId} → question ${questionId}`);
                }
            });
            
            // Затем собираем ветки
            $('[data-branch-parent]').each(function() {
                const $question = $(this);
                const questionId = parseInt($question.data('q'));
                const parentBranchId = $question.data('branch-parent');
                const branchValue = $question.data('branch-value');
                const branchId = $question.data('branch-id');
                
                // Сохраняем маппинг ID ветки → номер вопроса
                if (branchId) {
                    branchManager.branchIdToQuestionId.set(branchId, questionId);
                    // console.log(`Branch ID ${branchId} → question ${questionId}`);
                }
                
                // Находим родительский вопрос
                const parentQuestionId = branchManager.branchQuestions.get(parentBranchId);
                if (parentQuestionId && branchValue) {
                    branchManager.questionParents.set(questionId, parentQuestionId);
                    branchManager.questionConditions.set(questionId, branchValue);
                    // console.log(`Branch ${questionId} linked to parent ${parentQuestionId} (${parentBranchId}) with value "${branchValue}"`);
                } else {
                    console.warn(`Cannot link branch ${questionId}: parent ${parentBranchId} not found`);
                }
            });
        },
        
        isBranchQuestion: (questionId) => {
            // Проверяем, является ли вопрос ветвящимся
            const $question = domUtils.getQuestionElement(questionId);
            return $question.data('branch') === true;
        },
        
        getNextQuestionForAnswer: (questionId, answerValue) => {
            const $question = domUtils.getQuestionElement(questionId);
            
            if (!$question.length || !branchManager.isBranchQuestion(questionId)) {
                return null;
            }
            
            // Получаем выбранный label
            const $label = $question.find(`input[value="${answerValue}"]`).closest('label');
            
            // Проверяем, есть ли у выбранного варианта data-next
            if ($label.length && $label.data('next')) {
                const nextBranchId = $label.data('next');
                const nextQuestionId = branchManager.branchIdToQuestionId.get(nextBranchId);
                
                if (nextQuestionId) {
                    console.log(`Переход к ветке ${nextBranchId} (вопрос ${nextQuestionId})`);
                    return nextQuestionId;
                }
            }
            
            // Если нет data-next - возвращаем "continue" для перехода к следующему вопросу
            // console.log(`Вариант "${answerValue}" не имеет ветки, переходим к следующему вопросу`);
            return 'continue';
        },
        
        getDefaultNextQuestion: (questionId) => {
            for (let i = questionId + 1; i <= state.totalQuestions; i++) {
                // Пропускаем ветки (у которых есть branch-parent)
                const $question = domUtils.getQuestionElement(i);
                if (!$question.data('branch-parent')) {
                    return i;
                }
            }
            return null;
        },
        
        shouldShowQuestion: (questionId, userAnswers) => {
            // Если вопрос не имеет родителя - показываем всегда
            if (!branchManager.questionParents.has(questionId)) {
                return true;
            }
            
            const parentQuestionId = branchManager.questionParents.get(questionId);
            const requiredValue = branchManager.questionConditions.get(questionId);
            const parentAnswer = userAnswers[parentQuestionId];
            
            // Проверяем, есть ли у родительского ответа data-next
            if (parentAnswer) {
                const $parentQuestion = domUtils.getQuestionElement(parentQuestionId);
                const $selectedLabel = $parentQuestion.find(`input[value="${parentAnswer.answer}"]`).closest('label');
                
                // Если у выбранного варианта нет data-next - не показываем НИКАКИЕ ветки
                if ($selectedLabel.length && !$selectedLabel.data('next')) {
                    return false;
                }
            }
            
            // Показываем если родительский вопрос имеет нужный ответ
            return parentAnswer && parentAnswer.answer === requiredValue;
        },
        
        buildQuestionPath: () => {
            const path = [];
            const processedQuestions = new Set();
            
            const addQuestionToPath = (questionId) => {
                if (processedQuestions.has(questionId) || questionId > state.totalQuestions) {
                    return;
                }
                
                const $question = domUtils.getQuestionElement(questionId);
                if (!$question.length) return;
                
                processedQuestions.add(questionId);
                
                // Проверяем, должен ли вопрос показываться
                if (branchManager.shouldShowQuestion(questionId, state.userAnswers)) {
                    path.push(questionId);
                    
                    if (branchManager.isBranchQuestion(questionId)) {
                        const answer = answerManager.getAnswerFromQuestion(questionId);
                        
                        if (answer) {
                            const nextAction = branchManager.getNextQuestionForAnswer(questionId, answer);
                            
                            if (nextAction === 'continue') {
                                // Переходим к следующему вопросу после родительского
                                const nextQuestionId = branchManager.getNextNonBranchQuestion(questionId);
                                if (nextQuestionId) {
                                    addQuestionToPath(nextQuestionId);
                                }
                            } else if (nextAction) {
                                // Переходим в ветку
                                addQuestionToPath(nextAction);
                            }
                        } else {
                            // Нет ответа - ищем следующий вопрос
                            const nextQuestionId = branchManager.getNextNonBranchQuestion(questionId);
                            if (nextQuestionId) {
                                addQuestionToPath(nextQuestionId);
                            }
                        }
                    } else {
                        // Обычный вопрос - следующий по порядку
                        const nextQuestionId = questionId + 1;
                        if (nextQuestionId <= state.totalQuestions) {
                            addQuestionToPath(nextQuestionId);
                        }
                    }
                } else {
                    // Вопрос не показывается - ищем следующий
                    const nextQuestionId = branchManager.getNextNonBranchQuestion(questionId);
                    if (nextQuestionId) {
                        addQuestionToPath(nextQuestionId);
                    }
                }
            };
            
            addQuestionToPath(1);
            return path;
        },

        // Новый метод для поиска следующего вопроса после ветки
        getNextNonBranchQuestion: (currentQuestionId) => {
            for (let i = currentQuestionId + 1; i <= state.totalQuestions; i++) {
                const $question = domUtils.getQuestionElement(i);
                // Пропускаем вопросы-ветки (у которых есть data-branch-parent)
                if (!$question.data('branch-parent')) {
                    return i;
                }
            }
            return null;
        },
        
        updateQuestionPath: () => {
            const newPath = branchManager.buildQuestionPath();
            state.visibleQuestions = newPath;
            
            // console.log('Updated question path:', state.visibleQuestions);
            
            // Если текущего вопроса нет в новом пути, переходим к первому доступному
            if (!state.visibleQuestions.includes(state.currentQuestionId)) {
                const currentIndex = state.visibleQuestions.findIndex(id => id >= state.currentQuestionId);
                state.currentQuestionId = state.visibleQuestions[Math.max(0, currentIndex)];
                // console.log('Current question adjusted to:', state.currentQuestionId);
            }
        }
    };

    // ============================================
    // МЕНЕДЖЕР ВОПРОСОВ
    // ============================================
    const questionManager = {
        scanQuestions: () => {
            $('.quiz-question').each(function(index) {
                const questionId = index + 1;
                $(this)
                    .attr('data-q', questionId)
                    .find('input, textarea, select')
                    .each(function() {
                        if ($(this).attr('name') && $(this).attr('name').startsWith('q-')) {
                            $(this).attr('name', 'question_' + questionId);
                        }
                    });
            });
            state.totalQuestions = $('.quiz-question').length;
        },

        getCurrentQuestionIndex: () => state.visibleQuestions.indexOf(state.currentQuestionId),

        isLastVisibleQuestion: () => 
            questionManager.getCurrentQuestionIndex() === state.visibleQuestions.length - 1,

        isFirstVisibleQuestion: () => 
            questionManager.getCurrentQuestionIndex() === 0,

        shouldAutoEnableNext: (questionId) => {
            const $question = domUtils.getQuestionElement(questionId);
            return $question.data('auto-enable') === true;
        }
    };

    // ============================================
    // МЕНЕДЖЕР ОТВЕТОВ
    // ============================================
    const answerManager = {
        saveAnswer: (questionId, answer) => {
            if (!answer || answer === '') return;
            
            const questionText = domUtils.getQuestionText(questionId);
            state.userAnswers[questionId] = {
                question: questionText,
                answer: answer
            };
        },

        getAnswerFromQuestion: (questionId) => {
            const $question = domUtils.getQuestionElement(questionId);
            let answer = '';

            if ($question.hasClass('quiz-question__text')) {
                if ($question.find('input[type="radio"]').length > 0) {
                    const selected = $question.find('input[type="radio"]:checked');
                    if (selected.length) {
                        answer = selected.val().trim();
                    }
                } else if ($question.find('input[type="checkbox"]').length > 0) {
                    const answers = [];
                    $question.find('input[type="checkbox"]:checked').each(function() {
                        answers.push($(this).closest('label').find('p').text().trim());
                    });
                    answer = answers.join(', ');
                }
            } else if ($question.hasClass('quiz-question__slider')) {
                if ($question.find('#price_field').length) {
                    answer = formatUtils.formatPrice(state.currentPrice);
                } else if ($question.find('#percent_field').length) {
                    answer = `${formatUtils.formatPercent(state.currentPercent)} (${formatUtils.formatPrice(state.currentDownPayment)})`;
                }
            } else if ($question.hasClass('quiz-question__select')) {
                const selectedText = $question.find('select option:selected').text().trim();
                answer = selectedText || '';
            } else if ($question.hasClass('quiz-question__form')) {
                const values = [];
                $question.find('input').each(function() {
                    const value = $(this).val().trim();
                    if (value) values.push(value);
                });
                answer = values.join(', ');
            }

            return answer;
        },

        hasAnswerForQuestion: (questionId) => {
            const answer = answerManager.getAnswerFromQuestion(questionId);
            return answer && answer !== '';
        },

        collectAllAnswers: () => {
            const collected = {};
            
            state.visibleQuestions.forEach(questionId => {
                const answer = answerManager.getAnswerFromQuestion(questionId);
                if (answer && answer !== '') {
                    const questionText = domUtils.getQuestionText(questionId);
                    collected[questionId] = {
                        question: questionText,
                        answer: answer
                    };
                }
            });

            return collected;
        }
    };

    // ============================================
    // МЕНЕДЖЕР НАВИГАЦИИ
    // ============================================
    const navigationManager = {
        nextQuestion: () => {
            if (state.isTransitioning || questionManager.isLastVisibleQuestion()) return;

            if (state.debounceTimer) {
                clearTimeout(state.debounceTimer);
            }

            state.debounceTimer = setTimeout(() => {
                navigationManager._performNextQuestion();
            }, CONFIG.DEBOUNCE_DELAY);
        },

        _performNextQuestion: () => {
            if (state.isTransitioning) return;

            const currentIndex = questionManager.getCurrentQuestionIndex();
            if (currentIndex === -1 || currentIndex >= state.visibleQuestions.length - 1) return;

            state.isTransitioning = true;
            const currentQuestionId = state.visibleQuestions[currentIndex];
            const nextQuestionId = state.visibleQuestions[currentIndex + 1];

            const currentAnswer = answerManager.getAnswerFromQuestion(currentQuestionId);
            answerManager.saveAnswer(currentQuestionId, currentAnswer);

            domUtils.$prevButton().css('display', 'flex');

            state.currentQuestionId = nextQuestionId;
            uiManager.switchQuestions(currentQuestionId, nextQuestionId, () => {
                state.isTransitioning = false;
                uiManager.updateUIState();
            });
        },

        prevQuestion: () => {
            if (state.isTransitioning || questionManager.isFirstVisibleQuestion()) return;

            if (state.debounceTimer) {
                clearTimeout(state.debounceTimer);
            }

            state.debounceTimer = setTimeout(() => {
                navigationManager._performPrevQuestion();
            }, CONFIG.DEBOUNCE_DELAY);
        },

        _performPrevQuestion: () => {
            if (state.isTransitioning) return;

            const currentIndex = questionManager.getCurrentQuestionIndex();
            if (currentIndex <= 0) return;

            state.isTransitioning = true;
            const currentQuestionId = state.visibleQuestions[currentIndex];
            const prevQuestionId = state.visibleQuestions[currentIndex - 1];

            if (currentIndex - 1 === 0) {
                domUtils.$prevButton().hide();
            }

            state.currentQuestionId = prevQuestionId;
            uiManager.switchQuestions(currentQuestionId, prevQuestionId, () => {
                state.isTransitioning = false;
                uiManager.updateUIState();
            });
        }
    };

    // ============================================
    // МЕНЕДЖЕР UI
    // ============================================
    const uiManager = {
        switchQuestions: (fromId, toId, callback) => {
            const $current = domUtils.getQuestionElement(fromId);
            const $next = domUtils.getQuestionElement(toId);

            $current.fadeOut(300, () => {
                $current.removeClass('active');
                $next.fadeIn(300, () => {
                    $next.addClass('active');
                    if (callback) callback();
                });
            });
        },

        updateProgressBar: () => {
            const currentIndex = questionManager.getCurrentQuestionIndex();
            const totalVisible = state.visibleQuestions.length;
            
            let progress;
            if (totalVisible === 1) {
                progress = 0;
            } else {
                progress = Math.round((currentIndex / (totalVisible - 1)) * 100);
            }
            
            progress = Math.max(0, Math.min(100, progress));
            
            const currentProgress = parseInt(domUtils.$progressCurrent().text()) || 0;
            
            domUtils.animateNumber(currentProgress, progress, 500, (value) => {
                domUtils.$progressCurrent().text(Math.round(value) + '%');
            });
            
            domUtils.$progressBar().stop(true, true).animate({
                width: progress + '%'
            }, 500, 'easeOutQuad');
        },

        updateNavigationButtons: () => {
            const isFirst = questionManager.isFirstVisibleQuestion();
            const isLast = questionManager.isLastVisibleQuestion();

            if (isFirst && state.visibleQuestions.length === 1) {
                domUtils.$nextButton().show();
                domUtils.$submitButton().hide();
            } else {
                domUtils.$nextButton().toggle(!isLast);
                domUtils.$submitButton().toggle(isLast);
            }
        },

        updateNextButtonState: () => {
            const currentId = state.currentQuestionId;
            
            if (questionManager.shouldAutoEnableNext(currentId)) {
                uiManager.enableNextButton();
                return;
            }

            if (answerManager.hasAnswerForQuestion(currentId)) {
                uiManager.enableNextButton();
            } else {
                uiManager.disableNextButton();
            }
        },

        enableNextButton: () => {
            domUtils.$nextButton().removeAttr('disabled');
        },

        disableNextButton: () => {
            domUtils.$nextButton().attr('disabled', true);
        },

        updateUIState: () => {
            uiManager.updateProgressBar();
            uiManager.updateNavigationButtons();
            uiManager.updateNextButtonState();
            domUtils.scrollToQuiz();
        }
    };

    // ============================================
    // МЕНЕДЖЕР СЛАЙДЕРОВ
    // ============================================
    const sliderManager = {
        initPriceSlider: () => {
            $(".price_slide_js").slider({
                range: "min",
                value: state.currentPrice,
                min: 100000,
                max: 10000000,
                step: 1000,
                slide: (event, ui) => {
                    state.currentPrice = ui.value;
                    $("#price_field").val(formatUtils.formatPrice(state.currentPrice));
                    $("#price_field").data('numeric-value', state.currentPrice);
                    
                    sliderManager.recalculateDownPayment();
                    uiManager.updateNextButtonState();
                    
                    const questionId = $(event.target).closest('.quiz-question').data('q');
                    answerManager.saveAnswer(questionId, formatUtils.formatPrice(state.currentPrice));
                },
                create: function() {
                    state.currentPrice = $(this).slider("value");
                    $("#price_field").val(formatUtils.formatPrice(state.currentPrice));
                    $("#price_field").data('numeric-value', state.currentPrice);
                    $("#price_field").prop('readonly', true);
                    
                    setTimeout(() => {
                        sliderManager.recalculateDownPayment();
                    }, 50);
                }
            });
        },

        initPercentSlider: () => {
            $(".percent_slide_js").slider({
                range: "min",
                value: state.currentPercent,
                min: 1,
                max: 100,
                step: 1,
                slide: (event, ui) => {
                    state.currentPercent = ui.value;
                    $("#percent_current").text(formatUtils.formatPercent(state.currentPercent));
                    
                    sliderManager.recalculateDownPayment();
                    uiManager.updateNextButtonState();
                    
                    const questionId = $(event.target).closest('.quiz-question').data('q');
                    const answer = `${formatUtils.formatPercent(state.currentPercent)} (${formatUtils.formatPrice(state.currentDownPayment)})`;
                    answerManager.saveAnswer(questionId, answer);
                },
                create: function() {
                    state.currentPercent = $(this).slider("value");
                    $("#percent_current").text(formatUtils.formatPercent(state.currentPercent));
                    $("#percent_field").prop('readonly', true);
                    
                    setTimeout(() => {
                        sliderManager.recalculateDownPayment();
                    }, 50);
                }
            });
        },

        recalculateDownPayment: () => {
            try {
                const downPayment = (state.currentPrice * state.currentPercent) / 100;
                state.currentDownPayment = Math.round(downPayment);
                
                const formattedDownPayment = formatUtils.formatPrice(state.currentDownPayment);
                $("#percent_field").val(formattedDownPayment);
                $("#percent_field").data('numeric-value', state.currentDownPayment);
            } catch (error) {
                console.error('Ошибка перерасчета:', error);
            }
        }
    };

    // ============================================
    // МЕНЕДЖЕР ФОРМЫ
    // ============================================
    const formManager = {
        initSubmitForm: () => {
            const modalError = $('#error');
            const message = modalError.find('.form_message_js');
            
            modalError.on('hidden.bs.modal', function() {
                message.html('');
            });

            $(".quiz-submit").on('click', function(e) { 
                e.preventDefault();
                
                const allAnswers = answerManager.collectAllAnswers();
                
                let form = $(this).closest('.quiz-form');
                let row = form.find('.form__row');
                let fields = form.find('[required]');
                let url = form.attr('action');
                
                let empty = 0;
                fields.each(function(index, el) {
                    if ($(this).val() === '') {
                        $(this).closest('.form__row').addClass('invalid');
                        empty++;
                    } else {
                        $(this).closest('.form__row').removeClass('invalid');
                    }
                });

                setTimeout(function() {
                    row.removeClass('invalid');
                }, 2500);

                if (empty === 0) {
                    let formData = new FormData();
                    formData.append('notspam', 'Not spam');
                    formData.append('page', window.location.href);
                    formData.append('quiz_answers', JSON.stringify(allAnswers));
            
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: "html",

                        beforeSend: function() {
                            $(this).text('Sending...').prop('disabled', true);
                        },
                        success: function(response) {
                            window.location.href = "/thanks/";
                        },
                        error: function(response) {
                            $(this).text('Submit').prop('disabled', false);
                            modalError.modal('show');
                            message.html('<p>Sorry, there was an error submitting the form. Please try again.</p>');
                        }
                    });
                }
            });
        },

        initSelect2: () => {
            $('.select').select2({
                placeholder: function() {
                    return $(this).data('placeholder');
                },
                minimumResultsForSearch: Infinity,
            });
            
            $(document).on('select2:select', '.quiz-question .select', (e) => {
                const questionId = $(e.target).closest('.quiz-question').data('q');
                const answer = $(e.target).find('option:selected').text().trim();
                answerManager.saveAnswer(questionId, answer);
                uiManager.updateNextButtonState();
            });
        }
    };

    // ============================================
    // ОБРАБОТЧИКИ СОБЫТИЙ
    // ============================================
    const eventHandlers = {
        setupEventListeners: () => {
            const $form = $('.quiz-form');
            
            $form.on('change', 'input[type="radio"]', eventHandlers.handleRadioChange);
            $form.on('change', 'input[type="checkbox"]', eventHandlers.handleCheckboxChange);
            $form.on('input', 'textarea, input[type="text"], input[type="email"], input[type="tel"]', 
                eventHandlers.handleInputChange);
            $form.on('click', 'label', eventHandlers.handleLabelClick);
            
            domUtils.$nextButton().on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                navigationManager.nextQuestion();
            });
            
            domUtils.$prevButton().on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                navigationManager.prevQuestion();
            });
        },

        handleRadioChange: function(e) {
            const $input = $(e.currentTarget);
            const $label = $input.closest('label');
            const name = $input.attr('name');
            const selectedValue = $input.val();
            const questionId = $input.closest('.quiz-question').data('q');
            
            $('.quiz-question input[name="' + name + '"]')
                .parent('label')
                .removeClass('active');
            $label.addClass('active');
            
            answerManager.saveAnswer(questionId, selectedValue);
            
            if (branchManager.isBranchQuestion(questionId)) {
                branchManager.updateQuestionPath();
                
                setTimeout(() => {
                    uiManager.updateUIState();
                    
                    const currentIndex = state.visibleQuestions.indexOf(questionId);
                    if (currentIndex !== -1 && currentIndex < state.visibleQuestions.length - 1) {
                        const nextQuestionId = state.visibleQuestions[currentIndex + 1];
                        
                        setTimeout(() => {
                            state.currentQuestionId = nextQuestionId;
                            uiManager.switchQuestions(questionId, nextQuestionId, () => {
                                uiManager.updateUIState();
                            });
                        }, 100);
                    }
                }, 150);
            } else {
                uiManager.updateNextButtonState();
                setTimeout(() => navigationManager.nextQuestion(), CONFIG.TRANSITION_DELAY);
            }
        },

        handleCheckboxChange: function(e) {
            const questionId = $(e.target).closest('.quiz-question').data('q');
            const answer = answerManager.getAnswerFromQuestion(questionId);
            answerManager.saveAnswer(questionId, answer);
            uiManager.updateNextButtonState();
        },

        handleInputChange: function(e) {
            const questionId = $(e.target).closest('.quiz-question').data('q');
            const answer = $(e.target).val().trim();
            if (answer) {
                answerManager.saveAnswer(questionId, answer);
            }
            uiManager.updateNextButtonState();
        },

        handleLabelClick: function(e) {
            const $label = $(e.currentTarget);
            const $input = $label.find('input');
            
            if ($input.attr('type') === 'checkbox') {
                $label.toggleClass('active', $input.is(':checked'));
                uiManager.updateNextButtonState();
            }
        }
    };

    // ============================================
    // ИНИЦИАЛИЗАЦИЯ ПРИЛОЖЕНИЯ
    // ============================================
    const init = () => {
        // ВАЖНО: порядок имеет значение!
        // 1. Сначала сканируем вопросы (устанавливаем data-q)
        questionManager.scanQuestions();
        // console.log('=== DEBUG ===');
        // console.log('Total questions:', state.totalQuestions);
        
        // Проверяем, что data-q установлены
        // $('.quiz-question').each(function(index) {
        //     const qId = $(this).data('q');
        //     console.log(`Question ${index + 1}: data-q = ${qId}`);
        // });
        
        // 2. Инициализируем ветвление (теперь data-q есть)
        branchManager.init();
        
        // 3. Строим путь
        branchManager.updateQuestionPath();
        
        // console.log('Initial visible questions:', state.visibleQuestions);
        
        formManager.initSelect2();
        sliderManager.initPriceSlider();
        sliderManager.initPercentSlider();
        formManager.initSubmitForm();
        
        eventHandlers.setupEventListeners();
        
        domUtils.$nextButton().show();
        domUtils.$submitButton().hide();
        domUtils.$prevButton().hide();
        
        if (questionManager.shouldAutoEnableNext(1)) {
            uiManager.enableNextButton();
        }
        
        uiManager.updateUIState();
    };

    init();
});