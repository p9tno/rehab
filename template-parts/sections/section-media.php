<?php if (get_field('media_boolean')) { ?>
    <!-- begin media -->
    <section class="media section" id="media">
        <div class="container_center">
            <div class="media__layout">
                <?php if (get_field('media_img_id')) { ?>
                    <div class="media__thumbnail">
                        <div class="media__img img">
                            <?php echo wp_get_attachment_image(get_field('media_img_id'), 'full'); ?>
                        </div>
                        <?php if (get_field('media_text_bold') || get_field('media_text')) { ?>
                            <div class="media__label">
                                <?php if (get_field('media_text_bold')) { ?>
                                    <p><strong><?php the_field('media_text_bold'); ?></strong></p>
                                <?php } ?>
                                <?php if (get_field('media_text')) { ?>
                                    <p><?php the_field('media_text'); ?></p>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
    
                <div class="media__content">
                    <?php if (get_field('media_label')) { ?>
                        <div class="section__label"><?php the_field('media_label'); ?></div>
                    <?php } ?>
                    <?php if (get_field('media_title')) { ?>
                        <h2 class="section__title"><?php the_field('media_title'); ?></h2>
                    <?php } ?>
                    <?php if (get_field('media_desc')) { ?>
                        <div class="section__content"><?php the_field('media_desc'); ?></div>
                    <?php } ?>
                    <?php render_section_buttons('media_first_btn','media_second_btn'); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- end media -->
<?php } ?>