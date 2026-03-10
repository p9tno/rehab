<?php if (get_field('twins_boolean')) { ?>
    <!-- begin twins -->
    <section class="twins section" id="twins">
        <div class="container_center">
            <?php if (get_field('twins_label')) { ?>
                <div class="section__label"><?php the_field('twins_label'); ?></div>
            <?php } ?>
            <?php if (get_field('twins_title')) { ?>
                <h2 class="section__title"><?php the_field('twins_title'); ?></h2>
            <?php } ?>
    
            <?php 
            $items = get_field('twins_items');
            if( $items ) { ?>
                <div class="twins__layaut">
                    
                    <div class="waterEffect"></div>

                    <div class="twins__wrap">
                        <?php foreach( $items as $item ) { ?>
                            <div class="twins__item">
                                <?php if($item['twins_item_title']) { ?>
                                    <div class="twins__title"><?php echo $item['twins_item_title']; ?></div>
                                <?php } ?>
    
                                <div class="twins__main">
                                    <?php if($item['twins_item_desc']) { ?>
                                        <div class="twins__desc"><?php echo $item['twins_item_desc']; ?></div>
                                    <?php } ?>
    
                                    <?php 
                                    $rows = $item['twins_list'];
                                    if( $rows ) { ?>
                                        <div class="twins__content">
                                            <ul>
                                                <?php foreach( $rows as $row ) { ?>
                                                    <li>
                                                        <strong><?php echo $row['twins_text_bold']; ?></strong>
                                                        <span><?php echo $row['twins_text']; ?></span>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    <?php } ?>
                                </div>
    
                                <?php if ($item['twins_item_btn']) { ?>
                                    <?php 
                                        $link = $item['twins_item_btn'];
                                        $title = $link['title'];
                                        $url = $link['url'];
                                        $target = $link['target'];
                                    ?>
                                    <div class="twins__btn">
                                        <a class="btn" href="<?php echo $url; ?>" <?php if ($target) { echo 'target="_blank"'; } ?>><?php echo $title; ?></a>
                                    </div>
                                <?php } ?>
            
                            </div>
                        <?php } ?>
        
        
                    </div>
                </div>
            <?php } ?>
    
        </div>
    </section>
    <!-- end twins -->
<?php } ?>