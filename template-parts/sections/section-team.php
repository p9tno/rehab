<?php if (get_field('team_boolean')) { ?>
    <!-- begin team -->
    <section class="team section" id="team">
        <div class="container_center">
            <?php if (get_field('team_label')) { ?>
                <div class="section__label"><?php the_field('team_label'); ?></div>
            <?php } ?>
    
            <?php if (get_field('team_title')) { ?>
                <h2 class="section__title"><?php the_field('team_title'); ?></h2>
            <?php } ?>
    
            <?php if (get_field('team_relations')) { ?>
                <div class="team__swiper">
                    <div class="swiper team_swiper_js">
                        <div class="swiper-wrapper">
                            <?php
                                $post_id = get_field('team_relations');
                                $args = array(
                                    'post_type' => 'employees',
                                    'posts_per_page' => -1,
                                    'post__in' => $post_id,
                                    'orderby'   => 'post__in',
                                );
                                $query = new WP_Query($args);
                            ?>
    
                            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                                <?php get_template_part( 'template-parts/previews/preview', 'team' ); ?>
                            <?php endwhile;?>
    
                            <?php else : ?>
                                not found
                            <?php endif; ?>
    
                            <?php wp_reset_postdata(); ?>
                        </div>
    
                        <div class="swiper-nav team__nav desktop">
                            <i class="swiper-arrow icon_arrow_left"></i>
                            <i class="swiper-arrow icon_arrow_right"></i>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination team_pagination_js mobile"></div>
            <?php } ?>
        </div>
    </section>
    <!-- end team -->
<?php } ?>