<?php
// Filter 
function my_filter () {
  $query_data = $_GET;
  // get_pr($query_data);

  $post_type = ($query_data['postType']) ? explode(',',$query_data['postType']) : false;
  $cat = ($query_data['cat']) ? explode(',',$query_data['cat']) : false;
  $taxonomy = ($query_data['taxonomy']) ? explode(',',$query_data['taxonomy']) : false;
  $posts_per_page = ($query_data['postsPerPage']) ? explode(',',$query_data['postsPerPage']) : false;
  $paged = (isset($query_data['paged']) ) ? intval($query_data['paged']) : 1;
  $orderby = $query_data['order'];


  $tax_query_cat = ($cat) ? array( array(
      'taxonomy' => $taxonomy[0],
      'field' => 'id',
      'terms' => $cat
  ) ) : false;

  if ($cat[0] === 'all') {
    $args = array(
      'post_type' => $post_type[0],
      'paged' => $paged,
      'posts_per_page' => $posts_per_page[0],

      'orderby' => 'menu_order',
      'order' => $orderby,
    );
  } else {
    $args = array(
      'post_type' => $post_type[0],
      'paged' => $paged,
      'posts_per_page' => $posts_per_page[0],

      'orderby' => 'menu_order',
      'order' => $orderby,
  
      'tax_query' => array(
        'relation' => 'AND',
        $tax_query_cat,
      ),        
    );
  }

  // get_pr($args);

  $loop = new WP_Query( $args );

  if($loop->have_posts()) {
    while($loop->have_posts()) : $loop->the_post();
      if ($post_type[0] === 'blog') { get_template_part( 'template-parts/previews/preview', 'blog' ); }
      // elseif ($post_type[0] === 'blog') { get_template_part( 'template-parts/previews/preview', 'blog' ); }
      else { echo 'select the desired template'; }
    endwhile;
    ?>  
    <!-- пустой элемент нс случай если нет пагинации -->
    <!-- <div class="advice__item full"></div>  -->
    <?php

  } else {
    echo 'not found';
  }

  wp_reset_postdata(); ?>

 

  <?php if($loop->max_num_pages > 1 ){ ?>
    <nav class="pagination">
      <?php
        $big = 999999999;
        echo paginate_links( array(
          'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, $paged ),
          'prev_text' => '<i class="icon_arrow_left"></i>',
          'next_text' => '<i class="icon_arrow_right"></i>',
          'total' => $loop->max_num_pages,
          'end_size' => 1,
          'mid_size' => 1
        ) );
      ?>
    </nav>
  <?php } ?>
    
<?php die();
}

add_action('wp_ajax_my_filter', 'my_filter');
add_action('wp_ajax_nopriv_my_filter', 'my_filter');
// END Filter
