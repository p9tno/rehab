<?php
/**
 * Template name: Template service page
 */
?>

<?php get_header(); ?>

<?php
get_template_part( 'template-parts/sections/section', 'head' );

if( have_rows('template_servicepage_sort') ):
    $counter = 0;
    while ( have_rows('template_servicepage_sort') ) : the_row();
        $counter++;
        $layout = get_row_layout();
        // get_pr($layout);
        // echo '<strong>Row #' . $counter . ':</strong> ' . $layout . '<br>';
    
        $template_path = get_template_directory() . '/template-parts/sections/section-' . $layout . '.php';
        
        if( file_exists($template_path) ) {
            get_template_part( 'template-parts/sections/section', $layout );
        } else {
            echo 'ACF Layout template not found: ' . $layout . '<br>';
        }
    endwhile;
endif;

?>

<?php get_footer(); ?>