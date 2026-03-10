<?php if (get_field('mediaSwiper_boolean')) { ?>
    <!-- begin media-->
    <section class="media media_swiper section" id="mediaSwiper">
        <div class="container_center">
            <div class="media__layout">
                <?php 
                $swiper = get_field('mediaSwiper_slider');
                if( $swiper ) { ?>
                    <div class="swiper media_swiper_js">
                        <div class="swiper-wrapper">
                            <?php foreach( $swiper as $slide ) { ?>
                                <div class="swiper-slide">
                                    <div class="media__thumbnail">
                                        <div class="media__img img">
                                            <?php echo wp_get_attachment_image($slide['mediaSwiper_img_id'], 'full'); ?>
                                        </div>
                                        <?php if ($slide['mediaSwiper_text_bold'] || $slide['caption']) { ?>
                                            <div class="media__label">
                                                <p><strong><?php echo $slide['mediaSwiper_text_bold']; ?></strong></p>
                                                <p><?php echo $slide['mediaSwiper_text']; ?></p>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="swiper-nav media__nav desktop">
                            <i class="swiper-arrow icon_arrow_left"></i>
                            <i class="swiper-arrow icon_arrow_right"></i>
                        </div>
                    </div>
                    <div class="swiper-pagination media_pagination_js mobile"></div>
                <?php } ?>
    
                <div class="media__content">
                    <?php if (get_field('mediaSwiper_label')) { ?>
                        <div class="section__label"><?php the_field('mediaSwiper_label'); ?></div>
                    <?php } ?>
                    <?php if (get_field('mediaSwiper_title')) { ?>
                        <h2 class="section__title"><?php the_field('mediaSwiper_title'); ?></h2>
                    <?php } ?>
                    <?php if (get_field('mediaSwiper_desc')) { ?>
                        <div class="section__content"><?php the_field('mediaSwiper_desc'); ?></div>
                    <?php } ?>
                    <?php render_section_buttons('mediaSwiper_first_btn','mediaSwiper_second_btn'); ?>
                </div>
    
            </div>
        </div>
    </section>
    <!-- end media-->
<?php } ?>