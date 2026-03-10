<?php
/**
 * Template name: Template partners page
 */
?>

<?php get_header(); ?>

<?php

get_template_part( 'template-parts/sections/section', 'tabs' ); 
get_template_part( 'template-parts/sections/section', 'steps' ); 
get_template_part( 'template-parts/sections/section', 'img-grid' ); 
get_template_part( 'template-parts/sections/section', 'testimonials' );
get_template_part( 'template-parts/sections/section', 'text-grid' );
get_template_part( 'template-parts/sections/section', 'accent' );
get_template_part( 'template-parts/sections/section', 'offers' );
get_template_part( 'template-parts/sections/section', 'steps-copy' ); 
get_template_part( 'template-parts/sections/section', 'feedback' );

?>

<?php get_footer(); ?>