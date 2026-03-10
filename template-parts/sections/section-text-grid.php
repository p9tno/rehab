<?php if (get_field('text_grid_boolean')) { ?>
    <!-- begin text-grid -->
    <section class="text-grid section" id="text-grid">
        <div class="container_center">
            <div class="text-grid__layout">
                <div class="text-grid__content">
                    <?php if (get_field('text_grid_title')) { ?>
                        <h2 class="section__title"><?php the_field('text_grid_title'); ?></h2>
                    <?php } ?>
                    <?php if (get_field('text_grid_desc')) { ?>
                        <div class="section__desc"><?php the_field('text_grid_desc'); ?></div>
                    <?php } ?>
                </div>
                <?php 
                $grid = get_field('text_grid_list');
                if( $grid ) { ?>
                    <div class="text-grid__grid">
                        <?php foreach( $grid as $item ) { ?>
                            <div class="text-grid__item">
                                <div class="text-grid__icon img"><?php echo wp_get_attachment_image($item['text_grid_img_id'], 'full'); ?></div>
                                <div class="text-grid__text">
                                    <div class="text-grid__title"><?php echo $item['text_grid_subtitle']; ?></div>
                                    <div class="section__content"><?php echo $item['text_grid_content']; ?></div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- end text-grid -->
<?php } ?>