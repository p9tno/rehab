<?php
$section_class = "head section";
$list = get_field('head_list');
if ($list && !is_page_template(['template-homepage.php'])) {
    $section_class .= " head__row";
}
?>

<!-- begin head-->
<section class="<?php echo $section_class; ?>" id="head">
    <div class="waterEffect"></div>
    <div class="container_center">
        <div class="head__wrap">

            <div class="head__content">
                <?php if (get_field('head_label')) { ?>
                    <div class="section__label"><?php the_field('head_label'); ?></div>
                <?php } ?>
                <?php if (get_field('head_title')) { ?>
                    <h1 class="section__title"><?php the_field('head_title'); ?></h1>
                <?php } ?>
                <?php if (get_field('head_desc')) { ?>
                    <div class="section__desc"><?php the_field('head_desc'); ?></div>
                <?php } ?>
                <?php if (get_field('head_btn')) { ?>
                    <div class="section__btns">
                        <?php render_acf_link('head_btn', 'btn_tertiary') ?>
                    </div>
                <?php } ?>
            </div>

            <?php if( $list ) { ?>
                <div class="head__list">
                    <?php $i = 200; foreach( $list as $item ) { ?>
                        <div class="head__item" data-aos="zoom-in" data-aos-delay="<?php echo $i; ?>">
                            <span><?php echo $item['head_list_title']; ?></span>
                            <p><?php echo $item['head_list_text']; ?></p>
                        </div>
                    <?php $i += 200; } ?>
                </div>
            <?php } ?>

        </div>
    </div>

    <?php if (get_field('head_scroll_text')) { ?>
        <div class="head__scroll">
            <p><?php the_field('head_scroll_text'); ?></p>
            <span class="scroll_next_section_js">
                <i class="icon_arrow_bottom"></i>
            </span>
        </div>
    <?php } ?>


</section>
<!-- end head-->