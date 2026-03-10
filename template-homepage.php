<?php
/**
 * Template name: Home Page Template
 */
?>

<?php get_header(); ?>

<?php
    get_template_part( 'template-parts/sections/section', 'head' );
    get_template_part( 'template-parts/sections/section', 'hscroll' );
    get_template_part( 'template-parts/sections/section', 'advantages' );
    get_template_part( 'template-parts/sections/section', 'media' );
    get_template_part( 'template-parts/sections/section', 'twins' );
    get_template_part( 'template-parts/sections/section', 'steps' );
    get_template_part( 'template-parts/sections/section', 'fullvideo' );
    get_template_part( 'template-parts/sections/section', 'testimonials' );
    get_template_part( 'template-parts/sections/section', 'logos' );
    get_template_part( 'template-parts/sections/section', 'blog-slider' );
?>

<?php get_footer(); ?>