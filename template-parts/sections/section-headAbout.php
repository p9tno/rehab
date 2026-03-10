<!-- begin head-->
<section class="head section" id="head">
    <div class="waterEffect"></div>

    <div class="container_center">
        <div class="head__wrap">

            <div class="head__content">
                <?php if (get_field('headAbout_label')) { ?>
                    <div class="section__label"><?php the_field('headAbout_label'); ?></div>
                <?php } ?>
                <?php if (get_field('headAbout_title')) { ?>
                    <h1 class="section__title"><?php the_field('headAbout_title'); ?></h1>
                <?php } ?>
                <?php if (get_field('headAbout_desc')) { ?>
                    <div class="section__desc"><?php the_field('headAbout_desc'); ?></div>
                <?php } ?>
                <?php if (get_field('headAbout_btn')) { ?>
                    <div class="section__btns">
                        <?php render_acf_link('headAbout_btn', 'btn_tertiary') ?>
                    </div>
                <?php } ?>
            </div>

            <div class="head__story">
                <div class="quotesEffect">
                    <svg width="284" height="284" viewBox="0 0 284 284" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="quote quote-left" d="M78.8889 0L89.1444 16.7528C70.2111 29.5169 53.3815 44.4083 38.6556 61.427C24.4556 78.4457 17.3556 99.4532 17.3556 124.449C17.3556 134.022 18.6704 143.064 21.3 151.573C23.9296 160.082 27.6111 163.273 32.3444 161.146C33.3963 160.614 33.9222 159.816 33.9222 158.753C33.9222 157.157 33.3963 155.296 32.3444 153.169C31.2926 150.509 30.7667 147.318 30.7667 143.596C30.7667 136.15 34.4481 129.502 41.8111 123.652C49.7 117.27 58.3778 114.079 67.8444 114.079C81.5185 114.079 92.563 118.599 100.978 127.64C109.919 136.15 114.389 147.318 114.389 161.146C114.389 176.569 109.656 189.067 100.189 198.64C90.7222 208.214 78.363 213 63.1111 213C44.1778 213 28.9259 205.288 17.3556 189.865C5.78519 173.91 0 152.637 0 126.045C0 93.603 7.36296 68.3408 22.0889 50.2584C37.3407 31.6442 56.2741 14.8914 78.8889 0Z" fill="#7197B0"/>
                        <path class="quote quote-right" d="M248.5 0L258.756 16.7528C239.822 29.5169 222.993 44.4083 208.267 61.427C194.067 78.4457 186.967 99.4532 186.967 124.449C186.967 134.022 188.281 143.064 190.911 151.573C193.541 160.082 197.222 163.273 201.956 161.146C203.007 160.614 203.533 159.816 203.533 158.753C203.533 157.157 203.007 155.296 201.956 153.169C200.904 150.509 200.378 147.318 200.378 143.596C200.378 136.15 204.059 129.502 211.422 123.652C219.311 117.27 227.989 114.079 237.456 114.079C251.13 114.079 262.174 118.599 270.589 127.64C279.53 136.15 284 147.318 284 161.146C284 176.569 279.267 189.067 269.8 198.64C260.333 208.214 247.974 213 232.722 213C213.789 213 198.537 205.288 186.967 189.865C175.396 173.91 169.611 152.637 169.611 126.045C169.611 93.603 176.974 68.3408 191.7 50.2584C206.952 31.6442 225.885 14.8914 248.5 0Z" fill="#7197B0"/>
                    </svg>
                </div>

                <div class="head__story_content">
                    <?php if (get_field('story_top')) { ?>
                        <div class="head__story_top"><?php the_field('story_top'); ?></div>
                    <?php } ?>
                    <?php if (get_field('story_main')) { ?>
                        <div class="head__story_main"><?php the_field('story_main'); ?></div>
                    <?php } ?>
         
                    <div class="head__story_bottom">
                        <?php if (get_field('story_img_id')) { ?>
                            <div class="head__story_img img">
                                <?php echo wp_get_attachment_image(get_field('story_img_id'), 'full'); ?>
                            </div>
                        <?php } ?>
                        <?php if (get_field('story_text_bold') || get_field('story_text')) { ?>
                            <div class="head__story_text">
                                <?php if (get_field('story_text_bold')) { ?>
                                    <b><?php the_field('story_text_bold'); ?></b>
                                <?php } ?>
                                <?php if (get_field('story_text')) { ?>
                                    <span><?php the_field('story_text'); ?></span>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- end head-->