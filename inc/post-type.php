<?php
function custom_register_post_type() {

    // START testimonials
    register_post_type('testimonials', array(
		'labels'             => array(
			'name'               => 'Testimonials', 
			'singular_name'      => 'Testimonials', 
			'add_new'            => 'Add a testimonials',
			'add_new_item'       => 'Add a new testimonials',
			'edit_item'          => 'Edit testimonials',
			'new_item'           => 'New testimonials',
			'view_item'          => 'View testimonials',
			'menu_name'          => 'Testimonials'
		  ),
		'public'     => false,
		'supports'   => array('title'),
        'menu_icon'  => 'dashicons-megaphone',
        'menu_position' => 10,
        'show_ui' => true, 
		'rewrite'    => [
			'with_front' => false
		],
		'show_in_rest'  => true,
	));
    // END testimonials

    // START employees
    register_post_type('employees', array(
		'labels'             => array(
			'name'               => 'Employees', 
			'singular_name'      => 'Employees', 
			'add_new'            => 'Add a employee',
			'add_new_item'       => 'Add a new employee',
			'edit_item'          => 'Edit employee',
			'new_item'           => 'New employee',
			'view_item'          => 'View employee',
			'menu_name'          => 'Employees'
		  ),
		'public'     => false,
		'supports'   => array('title'),
        'menu_icon'  => 'dashicons-groups',
        'menu_position' => 11,
        'show_ui' => true, 
		'rewrite'    => [
			'with_front' => false
		],
		'show_in_rest'  => true,
	));
    // END employees



	// START blog
	$labels = array(
	'name'              => ( 'Blog category' ),
	'singular_name'     => ( 'Category' ),
	'search_items'      => ( 'Search by category' ),
	'all_items'         => ( 'All categories' ),
	'edit_item'         => ( 'Edit category' ),
	'update_item'       => ( 'Update category' ),
	'add_new_item'      => ( 'Add a new category' ),
	'new_item_name'     => ( 'Name of the new category' ),
	'menu_name'         => ( 'Categories' ),
	);

	$args = array(
		//вложеность термов(например вложность для стран и городов) иерархический
		'hierarchical'	=> false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		// 'rewrite'           => array( 'slug' => 'blog-cat' ),
		'rewrite'           => true,
		'show_in_rest'      => true,
		
	);

	if (!taxonomy_exists( 'blog-cat' )) {
		register_taxonomy('blog-cat', array('blog'), $args);
	}
	unset($args);
	unset($labels);
	// очищаем $args

	$labels = array(
		'name'               => 'Our Blog', 
		'singular_name'      => 'Articles', 
		'add_new'            => 'Add',
		'add_new_item'       => 'Add a new article',
		'edit_item'          => 'Edit article',
		'new_item'           => 'New article',
		'view_item'          => 'View article',
		'menu_name'          => 'Articles',    
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'blog' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 12,
		'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail' ), //'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'
		'menu_icon'			 => 'dashicons-admin-site-alt3',
		'show_in_rest'       => true,
	);

	register_post_type( 'blog', $args );
	unset($args);
	unset($labels);
	// END blog

}
 
add_action( 'init', 'custom_register_post_type' );