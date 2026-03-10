<?php if (get_field('compare_boolean')) { ?>
    <!-- begin compare -->
    <section class="compare section" id="compare">
        <div class="container_center">
            <div class="compare__layout">
    
                <div class="compare__content">
                    <?php if (get_field('compare_label')) { ?>
                        <div class="section__label"><?php the_field('compare_label'); ?></div>
                    <?php } ?>
                    <?php if (get_field('compare_title')) { ?>
                        <h2 class="section__title"><?php the_field('compare_title'); ?></h2>
                    <?php } ?>

                    <?php 
                    $rows = get_field('compare_table');
                    if( $rows ) { ?>
                        <div class="table">
                            <div class="table__head">
                                <div class="table__row">
                                    <div class="table__col"><span>Criteria</span></div>
                                    <div class="table__col"><span>LENDEVITY</span></div>
                                    <div class="table__col"><span>Direct Lender</span></div>
                                </div>
                            </div>
                            <div class="table__body">
                                <?php foreach( $rows as $col ) { ?>
                                    <div class="table__row">
                                        <div class="table__col">
                                            <div class="table__img">
                                                <?php echo wp_get_attachment_image($col['table_img_id_d'], 'full', false, ['class' => 'desktop']); ?>
                                                <?php echo wp_get_attachment_image($col['table_img_id_m'], 'full', false, ['class' => 'mobile']); ?>
                                            </div>
                                            <p><strong><?php echo $col['table_criteria']; ?></strong></p>
                                        </div>
            
                                        <div class="table__col">
                                            <span class="mobile">LENDEVITY</span>
                                            <?php echo $col['table_lendevity']; ?>
                                        </div>
            
                                        <div class="table__col">
                                            <span class="mobile">Direct Lender</span>
                                            <?php echo $col['table_direct_lender']; ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
    
    
                    <?php render_section_buttons('compare_first_btn','compare_second_btn'); ?>
                </div>
    
                <?php if (get_field('compare_img_id')) { ?>
                    <div class="compare__img img desktop"><?php echo wp_get_attachment_image(get_field('compare_img_id'), 'full'); ?></div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- end compare -->
<?php } ?>