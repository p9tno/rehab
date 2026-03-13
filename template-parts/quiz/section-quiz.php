<!-- begin quiz -->
<section class="quiz section user_select_none" id="quiz">
    <a class="quiz-close" href="<?php echo esc_url(home_url("/")) ?>">
        <i class="icon_close"></i>
    </a>

    <div class="container_center">
        <form class="quiz-form form form_secondary" id="quiz" action="<?php echo get_template_directory_uri() . '/sendQuiz.php'; ?>">
            <input type="hidden" name="page" value="<?php echo home_url( $wp->request ) ?>" />
            <input type="hidden" name="notspam" value="" />

            <!-- start quiz-container -->
            <div class="quiz-container">
                <!-- start quiz-main -->
                <div class="quiz-main">
                    <div class="quiz-wrap">

                        <div class="quiz-line__wrap">
                            <div class="quiz-line">
                                <div class="quiz-line__bg" style="width: 5%;"></div>
                            </div>
                            <div class="quiz-line__current">10%</div>
                        </div>

                        <!-- start quiz-question text -->
                        <div class="quiz-question quiz-question__form active" data-q="">
                            <div class="quiz-question__title">What substances are you currently using?</div>
                            <div class="quiz-question__wrap">
                                <div class="quiz-question__form-block">
                                    <div class="form__grid">
                                        <div class="form__row form__row_full">
                                            <input type="text" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end quiz-question text -->
                        <!-- start quiz-question text -->
                        <div class="quiz-question quiz-question__form" data-q="">
                            <div class="quiz-question__title">How frequently do you use it? (Daily, weekly, binge patterns, etc.)</div>
                            <div class="quiz-question__wrap">
                                <div class="quiz-question__form-block">
                                    <div class="form__grid">
                                        <div class="form__row form__row_full">
                                            <input type="text" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end quiz-question text -->
                        <!-- start quiz-question text -->
                        <div class="quiz-question quiz-question__form" data-q="">
                            <div class="quiz-question__title">When was your last use?</div>
                            <div class="quiz-question__wrap">
                                <div class="quiz-question__form-block">
                                    <div class="form__grid">
                                        <div class="form__row form__row_full">
                                            <input type="text" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end quiz-question text -->
                        <!-- start quiz-question text -->
                        <div class="quiz-question quiz-question__form" data-q="">
                            <div class="quiz-question__title">Have you previously attempted to stop or reduce use?</div>
                            <div class="quiz-question__wrap">
                                <div class="quiz-question__form-block">
                                    <div class="form__grid">
                                        <div class="form__row form__row_full">
                                            <input type="text" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end quiz-question text -->
                        <!-- start quiz-question text -->
                        <div class="quiz-question quiz-question__form" data-q="">
                            <div class="quiz-question__title">Have you attended treatment before? If yes, when and where?</div>
                            <div class="quiz-question__wrap">
                                <div class="quiz-question__form-block">
                                    <div class="form__grid">
                                        <div class="form__row form__row_full">
                                            <input type="text" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end quiz-question text -->
                        <!-- start quiz-question radio -->
                        <div class="quiz-question quiz-question__text" data-q="">
                            <div class="quiz-question__title">Have you ever been diagnosed with a mental health condition?</div>
                            <div class="quiz-question__wrap">
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Yes" />
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Yes</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="No" />
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>No</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                            </div>
                        </div>
                        <!-- end quiz-question radio -->
                        <!-- start quiz-question radio -->
                        <div class="quiz-question quiz-question__text" data-q="">
                            <div class="quiz-question__title">Are you currently seeing a therapist or psychiatrist?</div>
                            <div class="quiz-question__wrap">
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Yes" />
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Yes</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="No" />
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>No</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                            </div>
                        </div>
                        <!-- end quiz-question radio -->
                        <!-- start quiz-question radio -->
                        <div class="quiz-question quiz-question__text" data-q="">
                            <div class="quiz-question__title">Have you ever been hospitalized for mental health reasons?</div>
                            <div class="quiz-question__wrap">
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Yes" />
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Yes</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="No" />
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>No</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                            </div>
                        </div>
                        <!-- end quiz-question radio -->
                        <!-- start quiz-question radio -->
                        <div class="quiz-question quiz-question__text" data-q="">
                            <div class="quiz-question__title">Do you experience symptoms of anxiety, depression, trauma, or mood swings?</div>
                            <div class="quiz-question__wrap">
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Yes" />
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Yes</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="No" />
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>No</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                            </div>
                        </div>
                        <!-- end quiz-question radio -->

                        <!-- start BRANCH property_payment (branch_no / No; ) -->
                        <!-- start quiz-question radio -->
                        <div 
                            class="quiz-question quiz-question__text" 
                            data-q=""
                            data-branch="true" 
                            data-branch-id="property_payment"    
                        >
                            <div class="quiz-question__title">Are you seeking private-pay options?</div>
                            <div class="quiz-question__wrap">
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Yes"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Yes</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label" data-next="payment_no">
                                        <input type="radio" name="q-1" value="No"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>No</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                            </div>
                        </div>
                        <!-- end quiz-question radio -->

                        <!-- start quiz-question text -->
                        <div 
                            class="quiz-question quiz-question__form" 
                            data-q=""
                            data-branch-parent="property_payment"
                            data-branch-value="No"
                            data-branch-id="payment_no"
                        >
                            <div class="quiz-question__title">Insurance</div>
                            <div class="quiz-question__wrap">
                                <div class="quiz-question__form-block">
                                    <div class="form__grid">
                                        <div class="form__row">
                                            <label>Insurance Provider (if applicable)</label>
                                            <input type="text" placeholder="Insurance Provider" />
                                        </div>
                                        <div class="form__row">
                                            <label>Policy Number</label>
                                            <input type="text" placeholder="Policy Number" />
                                        </div>
                                        <div class="form__row">
                                            <label>Primary Policy Holder</label>
                                            <input type="text" placeholder="Primary Policy Holder" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end quiz-question text -->
                        <!-- end BRANCH property_payment (branch_no / No; ) -->

                        <!-- start quiz-question contacts -->
                        <div class="quiz-question quiz-question__form" data-q="">
                            <div class="quiz-question__title">Almost there, we just need your contact info</div>
                            <div class="quiz-question__wrap">
                                <div class="quiz-question__form-block">
                                    <div class="form__grid">
                                        <div class="form__row form__row_full">
                                            <input type="text" required="required" placeholder="Full Name" />
                                        </div>
                                        <div class="form__row form__row_full">
                                            <input type="tel" required="required" placeholder="Phone Number" />
                                        </div>
                                        <div class="form__row form__row_full">
                                            <input type="email" required="required" placeholder="Email Address" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end quiz-question contacts -->

                    </div>

                    <div class="quiz-footer">
                        <button class="btn btn_transparent quiz-arrow__prev"><i class="icon_arrow_left"></i>Back</button>
                        <button class="btn quiz-arrow__next" disabled="">Next</button>
                        <button class="btn quiz-submit" type="submit">submit</button>
                    </div>
     
                </div>
                <!-- end quiz-main -->
            </div>
            <!-- end quiz-container -->
        </form>
    </div>
</section>
<!-- end quiz -->