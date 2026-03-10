<?php if (get_field('feedback_boolean')) { ?>
    <!-- begin feedback -->
    <section class="feedback section" id="feedback">
        <div class="container_center">
            <?php if (get_field('feedback_title')) { ?>
                <h2 class="section__title"><?php the_field('feedback_title'); ?></h2>
            <?php } ?>
            
            <?php 
            $list = get_field('feedback_list');
            if( $list ) { ?>
                <div class="feedback__list">
                    <?php foreach( $list as $item ) { ?>
                        <?php 
                            $link = $item['feedback_link'];
                            $title = $link['title'];
                            $url = $link['url'];
                            $target = $link['target'];
                        ?>
                        <a 
                            class="feedback__link" href="<?php echo $url; ?>"
                            target="_blank"
                        >
                            <div class="section__icon"><?php echo wp_get_attachment_image($item['feedback_img_id'], 'full'); ?></div>
                            <span><?php echo $title; ?></span>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </section>
    <!-- end feedback -->
<?php } ?>