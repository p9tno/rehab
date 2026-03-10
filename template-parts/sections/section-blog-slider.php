<?php if (get_field('blog_slider_boolean') && get_field('blog_slider_relations')) { ?>
  <!-- begin blog -->
  <section class="blog section" id="blog">
      <div class="blog__swiper">
        <div class="container_center">
          <?php if (get_field('blog_slider_title')) { ?>
            <div class="section__title"><?php the_field('blog_slider_title'); ?></div>
          <?php } ?>
          <div class="swiper blog_swiper_js">

            <div class="swiper-wrapper">
              <?php
                $post_id = get_field('blog_slider_relations');
                $args = array(
                    'post_type' => 'blog',
                    'posts_per_page' => -1,
                    'post__in' => $post_id,
                    'orderby'   => 'post__in',
                );
                $query = new WP_Query($args);
              ?>

              <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                <div class="swiper-slide">
                  <?php get_template_part( 'template-parts/previews/preview', 'blog' ); ?>
                </div>
              <?php endwhile;?>

              <?php else : ?>
                  not found
              <?php endif; ?>

              <?php wp_reset_postdata(); ?>
            </div>

            <div class="swiper-pagination blog_pagination_js mobile"></div>
            <div class="swiper-nav blog__nav desktop">
              <i class="swiper-arrow icon_arrow_left"></i>
              <i class="swiper-arrow icon_arrow_right"></i>
            </div>
          </div>
          <div class="section__btns">
            <a class="btn" href="<?php echo get_post_type_archive_link( "blog" ); ?>">Learn More</a>
          </div>
        </div>
      </div>
  </section>
  <!-- end blog -->
<?php } ?>