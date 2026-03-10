<?php if (get_field('details_boolean')) { 
    $section_class = "details section";
    $counter = get_field('details_counter_radio');
    if ($counter === "true") {
        $section_class .= " details_counter";
    }
?>
    <!-- begin details -->
    <section class="<?php echo $section_class; ?>" id="details">
        <div class="container_center">
            <?php if (get_field('details_label')) { ?>
                <div class="section__label"><?php the_field('details_label'); ?></div>
            <?php } ?>
            <?php if (get_field('details_title')) { ?>
                <h2 class="section__title"><?php the_field('details_title'); ?></h2>
            <?php } ?>
            <?php if (get_field('details_desc')) { ?>
                <div class="section__desc"><?php the_field('details_desc'); ?></div>
            <?php } ?>
            <?php 
            $items = get_field('details_items');
            if( $items ) { ?>
                <div class="details__content">
                    <?php foreach( $items as $item ) { ?>
                        <div class="details__item">
                            <div class="section__icon"><?php echo wp_get_attachment_image($item['details_img_id'], 'full'); ?></div>
                            <div class="section__number"><span></span></div>
                            <div class="section__subtitle"><?php echo $item['details_subtitle']; ?></div>
                            <div class="section__content"><?php echo $item['details_content']; ?></div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
    
            <?php render_section_buttons('details_first_btn','details_second_btn'); ?>
    
        </div>
    </section>
    <!-- end details -->
<?php } ?>
