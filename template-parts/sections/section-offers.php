<?php if (get_field('offers_boolean')) { ?>
    <!-- begin offers -->
    <section class="offers section" id="offers">
        <div class="container_center">
            <?php if (get_field('offers_title')) { ?>
                <h2 class="section__title"><?php the_field('offers_title'); ?></h2>
            <?php } ?>
            <?php 
            $list = get_field('offers_list');
            if( $list ) { ?>
                <div class="offers__content">
                    <?php foreach( $list as $item ) { ?>
                        <div class="offers__item">
                            <div class="offers__title"><?php echo $item['offers_list_title']; ?></div>
                            <div class="offers__subtitle"><?php echo $item['offers_list_subtitle']; ?></div>
                            <div class="section__content"><?php echo $item['offers_list_content']; ?></div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </section>
    <!-- end offers -->
<?php } ?>