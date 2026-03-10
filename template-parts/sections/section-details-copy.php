<?php if (get_field('details-copy_boolean')) { 
    $section_class = "details section";
    $counter = get_field('details-copy_counter_radio');
    if ($counter === "true") {
        $section_class .= " details_counter";
    }
?>
    <!-- begin details-copy -->
    <section class="<?php echo $section_class; ?>" id="details-copy">
        <div class="container_center">
            <?php if (get_field('details-copy_label')) { ?>
                <div class="section__label"><?php the_field('details-copy_label'); ?></div>
            <?php } ?>
            <?php if (get_field('details-copy_title')) { ?>
                <h2 class="section__title"><?php the_field('details-copy_title'); ?></h2>
            <?php } ?>
            <?php if (get_field('details-copy_desc')) { ?>
                <div class="section__desc"><?php the_field('details-copy_desc'); ?></div>
            <?php } ?>
            <?php 
            $items = get_field('details-copy_items');
            if( $items ) { ?>
                <div class="details__content">
                    <?php foreach( $items as $item ) { ?>
                        <div class="details__item">
                            <div class="section__icon"><?php echo wp_get_attachment_image($item['details-copy_img_id'], 'full'); ?></div>
                            <div class="section__number"><span></span></div>
                            <div class="section__subtitle"><?php echo $item['details-copy_subtitle']; ?></div>
                            <div class="section__content"><?php echo $item['details-copy_content']; ?></div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
    
            <?php render_section_buttons('details-copy_first_btn','details-copy_second_btn'); ?>
    
        </div>
    </section>
    <!-- end details-copy -->
<?php } ?>
