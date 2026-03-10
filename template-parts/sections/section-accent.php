<?php if (get_field('accent_boolean')) { ?>
    <!-- begin accent -->
    <section class="accent section" id="accent">
        <div class="container_center">
            <div class="accent__top">
                <?php if (get_field('accent_title')) { ?>
                    <h2 class="section__title mobile"><?php the_field('accent_title'); ?></h2>
                <?php } ?>
                <?php if (get_field('accent_img_id')) { ?>
                    <div class="accent__img img"><?php echo wp_get_attachment_image(get_field('accent_img_id'), 'full'); ?></div>
                <?php } ?>
                <div class="accent__content">
                    <?php if (get_field('accent_title')) { ?>
                        <h2 class="section__title desktop"><?php the_field('accent_title'); ?></h2>
                    <?php } ?>
                    <?php if (get_field('accent_desc')) { ?>
                        <div class="section__desc"><?php the_field('accent_desc'); ?></div>
                    <?php } ?>

                    <?php 
                    $row = get_field('accent_row');
                    if( $row ) { ?>
                        <div class="accent__row">
                            <?php foreach( $row as $col ) { ?>
                                <div class="accent__col">
                                    <div class="accent__subtitle"><?php echo $col['accent_col_title']; ?></div>
                                    <div class="section__content"><?php echo $col['accent_col_content']; ?></div>
                                    <?php 
                                    $logos = $col['accent_logos'];
                                    if( $logos ) { ?>
                                        <div class="accent__logos">
                                            <?php foreach( $logos as $id ) { ?>
                                                <div class="accent__logos_item"><?php echo wp_get_attachment_image($id['accent_logo_img_id'], 'full'); ?></div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>

                </div>
            </div>

            <?php 
            $grid = get_field('accent_grid');
            if( $grid ) { ?>
                <div class="accent__list">
                    <?php foreach( $grid as $item ) { ?>
                        <div class="accent__item">
                            <span><?php echo $item['accent_item_title']; ?></span>
                            <p><?php echo $item['accent_item_desc']; ?></p>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
    
        </div>
    </section>
    <!-- end accent -->
<?php } ?>