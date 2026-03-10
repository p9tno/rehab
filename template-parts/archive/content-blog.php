<!-- begin blog -->
<section class="blog section" id="blog">
    <div class="container_center">

        <h1 class="section__title">Lendevity Financing Option<br> Information</h1>

        <div class="blog__layout filter_top_js">

            <aside class="aside aside_desktop blog__aside">
                <div class="aside__item border">
                    <div class="aside__title">Categories</div>
                    <?php echo my_cat_list_filter(
                        $post_type = 'blog',
                        $taxonomy = 'blog-cat',
                        $posts_per_page = get_option('posts_per_page'),
                    ); ?>
                </div>
                <?php get_template_part( 'template-parts/parts/part', 'aside-items' ); ?>
            </aside>
 
            <div class="preloaderFilter__inner">
                <div class="preloaderFilter__wrap preloaderFilter-js">
                    <div class="preloaderFilter">
                        <span class="loader"></span>
                    </div>
                </div>
                <div class="blog__grid filter__content">
                    <?php
                        $args = array(
                            'post_type' => 'blog',
                            'posts_per_page' => get_option('posts_per_page'),
                            'orderby' => 'menu_order',
                            'order' => 'asc',
                        );
                        $query = new WP_Query($args);
                    ?>
    
                    <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                    <?php get_template_part( 'template-parts/previews/preview', 'blog' ); ?>
                    <?php endwhile; ?>
    
    
                    <?php else : ?>
                    <p>No found</p>
                    <?php endif; ?>
    
                    <?php wp_reset_postdata(); ?>
    
                    <?php the_paginate ($query); ?>
                </div>
            </div>

            <aside class="aside aside_mobile blog__aside">
                <?php get_template_part( 'template-parts/parts/part', 'aside-items' ); ?>
            </aside>

        </div>
    </div>
</section>
<!-- end blog -->
