<!-- begin quiz -->
<section class="quiz section user_select_none" id="quiz">
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

                        <!-- start quiz-question radio -->
                        <div class="quiz-question quiz-question__text active" data-q="">
                            <div class="quiz-question__title">Choose your loan type</div>
                            <div class="quiz-question__wrap">
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Buy a Home" />
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Buy a Home</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Refinance" />
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Refinance</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Cash Out" />
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Cash Out</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                            </div>
                        </div>
                        <!-- end quiz-question radio -->

                        <!-- start quiz-question radio -->
                        <div class="quiz-question quiz-question__text" data-q="">
                            <div class="quiz-question__title">What kind of property are you looking to purchase?</div>
                            <div class="quiz-question__wrap">
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                <label class="quiz-question__text-label">
                                    <input type="radio" name="q-1" value="Single-family home"/>
                                    <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                    <p>Single-family home</p>
                                </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                <label class="quiz-question__text-label">
                                    <input type="radio" name="q-1" value="Multi-family home"/>
                                    <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                    <p>Multi-family home</p>
                                </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                <label class="quiz-question__text-label">
                                    <input type="radio" name="q-1" value="Townhouse"/>
                                    <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                    <p>Townhouse</p>
                                </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                            </div>
                        </div>
                        <!-- end quiz-question radio -->

                        <!-- start BRANCH property_purpose (branch_primary / Primary; branch_secondary / Secondary; branch_investment / Investment property  ) -->
                        <!-- start quiz-question radio -->
                        <div 
                            class="quiz-question quiz-question__text" 
                            data-q=""
                            data-branch="true" 
                            data-branch-id="property_purpose"    
                        >
                            <div class="quiz-question__title">How will your property be used?</div>
                            <div class="quiz-question__wrap">
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label" data-next="branch_primary">
                                        <input type="radio" name="q-1" value="Primary"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Primary</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label" data-next="branch_secondary">
                                        <input type="radio" name="q-1" value="Secondary"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Secondary</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label" data-next="branch_investment">
                                        <input type="radio" name="q-1" value="Investment property"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Investment property</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                            </div>
                        </div>
                        <!-- end quiz-question radio -->

                        <!-- start quiz-question radio -->
                        <div 
                            class="quiz-question quiz-question__text" 
                            data-q=""
                            data-branch-parent="property_purpose"
                            data-branch-value="Primary"
                            data-branch-id="branch_primary"
                        >
                            <div class="quiz-question__title">How would you like to finance this purchase? </div>
                            <div class="quiz-question__wrap">

                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Conventional Loan"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Conventional Loan</p>
                                    </label>
                                    <div class="quiz-question-hint">
                                        <i class="icon_question"></i>
                                        <div class="quiz-question-hint__content">
                                            <span>Traditional home loans backed by Fannie Mae and Freddie Mac. Great for borrowers with strong credit and stable income.</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="FHA Loan"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>FHA Loan</p>
                                    </label>
                                    <div class="quiz-question-hint">
                                        <i class="icon_question"></i>
                                        <div class="quiz-question-hint__content">
                                            <span>Government-insured loans designed for buyers with lower credit scores and smaller down payments</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Both Conventional and FHA"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Both Conventional and FHA</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Investor"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Investor</p>
                                    </label>
                                    <div class="quiz-question-hint">
                                        <i class="icon_question"></i>
                                        <div class="quiz-question-hint__content">
                                            <span>Specialized loans designed for real estate investors looking to finance rental properties or fix-and-flip projects. Ideal for those with multiple properties or an established investment portfolio.</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Self-Employed Program (Bank Statement Loan)"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Self-Employed Program (Bank Statement Loan)</p>
                                    </label>
                                    <div class="quiz-question-hint">
                                        <i class="icon_question"></i>
                                        <div class="quiz-question-hint__content">
                                            <span>Qualify using 12–24 months of bank deposits instead of tax returns — perfect for self-employed borrowers.</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="VA"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>VA</p>
                                    </label>
                                    <div class="quiz-question-hint">
                                        <i class="icon_question"></i>
                                        <div class="quiz-question-hint__content">
                                            <span>Exclusive loans for veterans, active-duty military, and eligible spouses. No down payment and no mortgage insurance.</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- end quiz-question__text-block -->

                            </div>
                        </div>
                        <!-- end quiz-question radio -->

                        <!-- start quiz-question radio -->
                        <div 
                            class="quiz-question quiz-question__text" 
                            data-q=""
                            data-branch-parent="property_purpose"
                            data-branch-value="Secondary"
                            data-branch-id="branch_secondary"
                        >
                            <div class="quiz-question__title">How would you like to finance this purchase? </div>
                            <div class="quiz-question__wrap">

                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Conventional Loan"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Conventional Loan</p>
                                    </label>
                                    <div class="quiz-question-hint">
                                        <i class="icon_question"></i>
                                        <div class="quiz-question-hint__content">
                                            <span>Traditional home loans backed by Fannie Mae and Freddie Mac. Great for borrowers with strong credit and stable income.</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- end quiz-question__text-block -->

                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="FHA Loan"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>FHA Loan</p>
                                    </label>
                                    <div class="quiz-question-hint">
                                        <i class="icon_question"></i>
                                        <div class="quiz-question-hint__content">
                                            <span>Government-insured loans designed for buyers with lower credit scores and smaller down payments</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- end quiz-question__text-block -->

                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Both Conventional and FHA"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Both Conventional and FHA</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->

                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Investor"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Investor</p>
                                    </label>
                                    <div class="quiz-question-hint">
                                        <i class="icon_question"></i>
                                        <div class="quiz-question-hint__content">
                                            <span>Specialized loans designed for real estate investors looking to finance rental properties or fix-and-flip projects. Ideal for those with multiple properties or an established investment portfolio.</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- end quiz-question__text-block -->

                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Self-Employed Program (Bank Statement Loan)"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Self-Employed Program (Bank Statement Loan)</p>
                                    </label>
                                    <div class="quiz-question-hint">
                                        <i class="icon_question"></i>
                                        <div class="quiz-question-hint__content">
                                            <span>Qualify using 12–24 months of bank deposits instead of tax returns — perfect for self-employed borrowers.</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- end quiz-question__text-block -->

                            </div>
                        </div>
                        <!-- end quiz-question radio -->

                        <!-- start quiz-question radio -->
                        <div 
                            class="quiz-question quiz-question__text" 
                            data-q=""
                            data-branch-parent="property_purpose"
                            data-branch-value="Investment property"
                            data-branch-id="branch_investment"
                        >
                            <div class="quiz-question__title">How would you like to finance this purchase? </div>
                            <div class="quiz-question__wrap">

                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Conventional Loan"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Conventional Loan</p>
                                    </label>
                                    <div class="quiz-question-hint">
                                        <i class="icon_question"></i>
                                        <div class="quiz-question-hint__content">
                                            <span>Traditional home loans backed by Fannie Mae and Freddie Mac. Great for borrowers with strong credit and stable income.</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- end quiz-question__text-block -->

                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Investor"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Investor</p>
                                    </label>
                                    <div class="quiz-question-hint">
                                        <i class="icon_question"></i>
                                        <div class="quiz-question-hint__content">
                                            <span>Specialized loans designed for real estate investors looking to finance rental properties or fix-and-flip projects. Ideal for those with multiple properties or an established investment portfolio.</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- end quiz-question__text-block -->

                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Self-Employed"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Self-Employed</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->

                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Construction"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Construction</p>
                                    </label>
                                    <div class="quiz-question-hint">
                                        <i class="icon_question"></i>
                                        <div class="quiz-question-hint__content">
                                            <span>Short-term loans for property renovation or ground-up construction.</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- end quiz-question__text-block -->

                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Ground Up"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Ground Up</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->

                            </div>
                        </div>
                        <!-- end quiz-question radio -->
                        <!-- end BRANCH property_purpose (branch_primary / Primary; branch_secondary / Secondary; branch_investment / Investment property  ) -->


                        <!-- start quiz-question radio -->
                        <div class="quiz-question quiz-question__text" data-q="">
                            <div class="quiz-question__title">When do you plan to purchase?</div>
                            <div class="quiz-question__wrap">
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Now"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Now</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Soon"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Soon</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Within 30 days"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Within 30 days</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="In the next few months"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>In the next few months</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Not sure"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Not sure</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                            </div>
                        </div>
                        <!-- end quiz-question radio -->

                        <!-- start quiz-question select -->
                        <div class="quiz-question quiz-question__select" data-q="">
                            <div class="quiz-question__title">What state is the property located in?</div>
                            <div class="quiz-question__wrap">
                                <!-- start quiz-question__select-block -->
                                <div class="quiz-question__select-block">
                                    <select name='q-1' class="select" data-placeholder="Select">
                                        <option value=""></option>
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                        <option value="AZ">Arizona</option>
                                        <option value="CO">Colorado</option>
                                        <option value="ID">Idaho</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="UT">Utah</option>
                                        <option value="WY">Wyoming</option>
                                        <option value="AL">Alabama</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="IL">Illinois</option>
                                        <option value="IA">Iowa</option>
                                        <option value="KS">Kansas</option>
                                        <option value="KY">Kentucky</option>
                                        <option value="LA">Louisiana</option>
                                        <option value="MN">Minnesota</option>
                                        <option value="MS">Mississippi</option>
                                        <option value="MO">Missouri</option>
                                        <option value="OK">Oklahoma</option>
                                        <option value="SD">South Dakota</option>
                                        <option value="TX">Texas</option>
                                        <option value="TN">Tennessee</option>
                                        <option value="WI">Wisconsin</option>
                                        <option value="CT">Connecticut</option>
                                        <option value="DE">Delaware</option>
                                        <option value="FL">Florida</option>
                                        <option value="GA">Georgia</option>
                                        <option value="IN">Indiana</option>
                                        <option value="ME">Maine</option>
                                        <option value="MD">Maryland</option>
                                        <option value="MA">Massachusetts</option>
                                        <option value="MI">Michigan</option>
                                        <option value="NH">New Hampshire</option>
                                        <option value="NJ">New Jersey</option>
                                        <option value="NY">New York</option>
                                        <option value="NC">North Carolina</option>
                                        <option value="OH">Ohio</option>
                                        <option value="PA">Pennsylvania</option>
                                        <option value="RI">Rhode Island</option>
                                        <option value="SC">South Carolina</option>
                                        <option value="VT">Vermont</option>
                                        <option value="VA">Virginia</option>
                                        <option value="WV">West Virginia</option>
                                    </select>
                                </div>
                                <!-- end quiz-question__select-block -->
                            </div>
                        </div>
                        <!-- end quiz-question select -->

                        <!-- start quiz-question slider -->
                        <div class="quiz-question quiz-question__slider" data-q="" data-auto-enable="true">
                            <div class="quiz-question__title"><span>What is the estimated purchase price?</span></div>
                            <div class="quiz-question__desc">
                                <span>An estimate is perfectly fine. You’ll be able to adjust it later</span>
                            </div>
                            <div class="quiz-question__slider_input">
                                <input value="800000" readonly="readonly" id="price_field" type="text" max="" min="0" />
                                <span>Estimated purchase price</span>
                            </div>
                            <div class="quiz-question__slider_main">
                                <div class="quiz-question__slider_slide price_slide_js"></div>
                            </div>
                        </div>
                        <!-- end quiz-question slider -->

                        <!-- start quiz-question slider -->
                        <div class="quiz-question quiz-question__slider" data-q="" data-auto-enable="true">
                            <div class="quiz-question__title"><span>How much is your down payment?</span></div>
                            <div class="quiz-question__desc"> <span>An estimate is perfectly fine. You’ll be able to
                                    adjust it later</span></div>
                            <div class="quiz-question__slider_input percent">
                                <input value="160000" readonly="readonly" id="percent_field" type="text" max="" min="0" /><span>Down
                                    payment</span>
                                <p id="percent_current">20</p>
                            </div>
                            <div class="quiz-question__slider_main">
                                <div class="quiz-question__slider_slide percent_slide_js"></div>
                            </div>
                        </div>
                        <!-- end quiz-question slider -->

                        <!-- start quiz-question text -->
                        <div class="quiz-question quiz-question__form" data-q="">
                            <div class="quiz-question__title">Your credit score</div>
                            <div class="quiz-question__wrap">
                                <div class="quiz-question__form-block">
                                    <div class="form__grid">
                                        <div class="form__row">
                                            <input type="text" placeholder="Your credit score" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end quiz-question text -->

                        <!-- start quiz-question radio -->
                        <div class="quiz-question quiz-question__text" data-q="">
                            <div class="quiz-question__title">Are you currently employed?</div>
                            <div class="quiz-question__wrap">
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Employed"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Employed</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Self-employed"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Self-employed</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Retired"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Retired</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Not employed"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Not employed</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                            </div>
                        </div>
                        <!-- end quiz-question radio -->

                        <!-- start quiz-question radio -->
                        <div class="quiz-question quiz-question__text" data-q="">
                            <div class="quiz-question__title">What is your gross annual income?</div>
                            <div class="quiz-question__wrap">
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="Less than $20000"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>Less than $20000</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="$20,000-50,000"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>$20,000-50,000</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="$50,000-$100,000"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>$50,000-$100,000</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="$100,000-$200,000"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>$100,000-$200,000</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="$200,000+"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>$200,000+</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                            </div>
                        </div>
                        <!-- end quiz-question radio -->

                        <!-- start quiz-question radio -->
                        <div class="quiz-question quiz-question__text" data-q="">
                            <div class="quiz-question__title">Active or previous military service?</div>
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
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="No"/>
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
                            <div class="quiz-question__title">Any bankrupcy in the past three years?</div>
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
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="No"/>
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
                            <div class="quiz-question__title">Any foreclosure in the past three years?</div>
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
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="No"/>
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
                            <div class="quiz-question__title">Number of late mortgage payments in the last 12 months?</div>
                            <div class="quiz-question__wrap">
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="None"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>None</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="One late payment"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>One late payment</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                                <!-- start quiz-question__text-block -->
                                <div class="quiz-question__text-block">
                                    <label class="quiz-question__text-label">
                                        <input type="radio" name="q-1" value="More than one"/>
                                        <div class="quiz-question__check"><i class="icon_mark"></i></div>
                                        <p>More than one</p>
                                    </label>
                                </div>
                                <!-- end quiz-question__text-block -->
                            </div>
                        </div>
                        <!-- end quiz-question radio -->

                        <!-- start quiz-question contacts -->
                        <div class="quiz-question quiz-question__form" data-q="">
                            <div class="quiz-question__title">Almost there, we just need your contact info</div>
                            <div class="quiz-question__wrap">
                                <div class="quiz-question__form-block">
                                    <div class="form__grid">
                                        <div class="form__row">
                                            <input type="text" required="required" placeholder="First Name" />
                                        </div>
                                        <div class="form__row">
                                            <input type="text" required="required" placeholder="Last Name" />
                                        </div>
                                        <div class="form__row form__row_full">
                                            <input type="tel" required="required" placeholder="Phone Number" />
                                        </div>
                                        <div class="form__row">
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