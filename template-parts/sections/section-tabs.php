<?php if (get_field('tabs_boolean')) { ?>
    <!-- begin tabs-section -->
    <section class="tabs-section section" id="tabs-section">
        <div class="container_center">
            <?php if (get_field('tabs_title')) { ?>
                <h1 class="section__title"><?php the_field('tabs_title'); ?></h1>
            <?php } ?>
            <?php if (get_field('tabs_desc')) { ?>
                <div class="section__desc"><?php the_field('tabs_desc'); ?></div>
            <?php } ?>
            <div class="tabs-section__top">
                <?php if (get_field('tabs_img_id')) { ?>
                    <div class="tabs-section__img img"><?php echo wp_get_attachment_image(get_field('tabs_img_id'), 'full'); ?></div>
                <?php } ?>
                <div class="tabs-section__content">
                    <?php if (get_field('tabs_title_image')) { ?>
                        <div class="section__title"><?php the_field('tabs_title_image'); ?></div>
                    <?php } ?>
                    <?php if (get_field('tabs_desc_image')) { ?>
                        <div class="section__desc"><?php the_field('tabs_desc_image'); ?></div>
                    <?php } ?>
                </div>
            </div>

            <?php 
            $tabs = get_field('tabs_list');
            if( $tabs ) { ?>
                <div class="tabs-section__bottom">
                    <div class="tabs__wrapper">
        
                        <div class="tabs__center">
                            <div class="tabs user_select_none">
                                <?php foreach( $tabs as $tab ) { ?>
                                    <div class="tab"><?php echo $tab['tabs_tab_title']; ?></div>
                                <?php } ?>
                            </div>
                        </div>
        
                        <div class="tabs__content">
                            <?php foreach( $tabs as $tab ) { 
                                $class = "details";
                                $counter = $tab['tabs_details_counter_radio'];
                                if ($counter === "true") {
                                    $class .= " details_counter";
                                }
                            ?>
                                <!-- start tab__item -->
                                <div class="tab__item">
                                    <!-- begin details details_counter-->
                                    <div class="<?php echo $class; ?>">
                                        <?php 
                                        $items = $tab['tabs_details_items'];
                                        if( $items ) { ?>
                                            <div class="details__content">
                                                <?php foreach( $items as $item ) { ?>
                                                    <div class="details__item">
                                                        <div class="section__icon"><?php echo wp_get_attachment_image($item['tabs_details_img_id'], 'full'); ?></div>
                                                        <div class="section__number"><span></span></div>
                                                        <div class="section__subtitle"><?php echo $item['tabs_details_subtitle']; ?></div>
                                                        <div class="section__content"><?php echo $item['tabs_details_content']; ?></div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <!-- end details-->
                                </div>
                                <!-- end tab__item -->
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
    
        </div>
    </section>
    <!-- end tabs-section -->
<?php } ?>