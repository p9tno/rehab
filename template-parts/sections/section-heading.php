<?php if (get_field('heading_boolean')) { ?>
    <!-- begin heading -->
    <section class="heading section" id="heading">
        <div class="container_center">
            <?php if (get_field('heading_title')) { ?>
                <h2 class="section__title"><?php the_field('heading_title'); ?></h2>
            <?php } ?>
            <?php render_section_buttons('heading_first_btn','heading_second_btn'); ?>
        </div>
    </section>
    <!-- end heading -->
<?php } ?>