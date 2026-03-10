<?php if (get_field('testimonials_boolean')) { ?>
  <!-- begin testimonials -->
  <section class="testimonials section" id="testimonials">
  
    <div class="container_center">
      <?php if (get_field('testimonials_label')) { ?>
        <div class="section__label"><?php the_field('testimonials_label'); ?></div>
      <?php } ?>
      <?php if (get_field('testimonials_title')) { ?>
        <h2 class="section__title"><?php the_field('testimonials_title'); ?></h2>
      <?php } ?>
      <?php if (get_field('testimonials_desc')) { ?>
        <div class="section__desc"><?php the_field('testimonials_desc'); ?></div>
      <?php } ?>  
    </div>

    <div class="testimonials__swiper">
      <div class="container_center">
        <?php if (get_field('testimonials_relations')) { ?>
          <div class="swiper testimonials_swiper_js">
  
            <div class="swiper-wrapper">
              <?php
                  $post_id = get_field('testimonials_relations');
                  // get_pr($post_id);
                  $args = array(
                      'post_type' => 'testimonials',
                      'posts_per_page' => -1,
                      'post__in' => $post_id,
                      'orderby'   => 'post__in',
                  );
                  $query = new WP_Query($args);
              ?>

              <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                  <?php get_template_part( 'template-parts/previews/preview', 'testimonials' ); ?>
              <?php endwhile;?>

              <?php else : ?>
                  not found
              <?php endif; ?>

              <?php wp_reset_postdata(); ?>

            </div>

            <div class="swiper-pagination testimonials_pagination_js mobile"></div>
            <div class="swiper-nav testimonials__nav desktop">
              <i class="swiper-arrow icon_arrow_left"></i>
              <i class="swiper-arrow icon_arrow_right"></i>
            </div>
  
          </div>
        <?php } ?>

        <?php render_section_buttons('testimonials_first_btn','testimonials_second_btn'); ?>

      </div>
    </div>
  
  </section>
  <!-- end testimonials -->
<?php } ?>