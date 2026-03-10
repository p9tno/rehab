<?php if (get_field('img_grid_boolean')) { ?>
    <!-- begin img-grid -->
    <section class="img-grid section" id="img-grid">
        <div class="container_center">
            <div class="img-grid__layout">

                <?php if (get_field('img_grid_title')) { ?>
                    <h2 class="section__title mobile"><?php the_field('img_grid_title'); ?></h2>
                <?php } ?>
                <?php if (get_field('img_grid_img_id')) { ?>
                    <div class="img-grid__img img"><?php echo wp_get_attachment_image(get_field('img_grid_img_id'), 'full'); ?></div>
                <?php } ?>
    
                <div class="img-grid__content">
                    <?php if (get_field('img_grid_title')) { ?>
                        <h2 class="section__title desktop"><?php the_field('img_grid_title'); ?></h2>
                    <?php } ?>

                    <?php 
                    $grid = get_field('img_grid_list');
                    if( $grid ) { ?>
                        <div class="img-grid__grid">
                            <?php foreach( $grid as $item ) { ?>
                                <div class="img-grid__item">
                                    <div class="img-grid__title"><?php echo $item['img_grid_list_title']; ?></div>
                                    <div class="section__content"><?php echo $item['img_grid_list_desc']; ?></div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <?php render_section_buttons('img_grid_first_btn','img_grid_second_btn'); ?>
                </div>

            </div>
        </div>
    </section>
    <!-- end img-grid -->
<?php } ?>