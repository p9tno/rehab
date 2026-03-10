<?php
/**
 * Template name: Template about page
 */
?>

<?php get_header(); ?>

<?php
get_template_part( 'template-parts/sections/section', 'headAbout' );
get_template_part( 'template-parts/sections/section', 'media' );
get_template_part( 'template-parts/sections/section', 'team' );
get_template_part( 'template-parts/sections/section', 'steps' );
get_template_part( 'template-parts/sections/section', 'testimonials' );
get_template_part( 'template-parts/sections/section', 'logos' );
get_template_part( 'template-parts/sections/section', 'compare' );
get_template_part( 'template-parts/sections/section', 'media-swiper' );
?>

<?php get_footer(); ?>