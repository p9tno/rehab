<?php
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.3' );
}

function lendevity_scripts() {
	wp_enqueue_style( 'lendevity-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style('lendevity-aos', get_template_directory_uri() . '/assets/css/aos.css', array(), _S_VERSION, 'all');
	wp_enqueue_style('lendevity-jquery-ui', get_template_directory_uri() . '/assets/css/jquery-ui.css', array(), _S_VERSION, 'all');
	wp_enqueue_style('lendevity-select', get_template_directory_uri() . '/assets/css/select.css', array(), _S_VERSION, 'all');
	wp_enqueue_style('lendevity-swiper-bundle', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), _S_VERSION, 'all');
	wp_enqueue_style('lendevity-main-style', get_template_directory_uri() . '/assets/css/style.css', array(), _S_VERSION, 'all');

	wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.js', array(), false, true);
    wp_enqueue_script( 'jquery' );

	if (is_archive()) {
		wp_enqueue_script( 'lendevity-filter', get_template_directory_uri() . '/assets/js/filter.js', array(), _S_VERSION, true );
	}

	if (is_single()) {}

	wp_enqueue_script( 'lendevity-aos', get_template_directory_uri() . '/assets/js/aos.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'lendevity-menu', get_template_directory_uri() . '/assets/js/menu.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'lendevity-modal', get_template_directory_uri() . '/assets/js/modal.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'lendevity-select2', get_template_directory_uri() . '/assets/js/select2.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'lendevity-swiper-bundle', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), _S_VERSION, true );
	
	if ( is_page_template(['template-quiz.php']) ) {
		wp_enqueue_script( 'lendevity-jquery-event-move', get_template_directory_uri() . '/assets/js/jquery-event-move.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'lendevity-jquery-ui', get_template_directory_uri() . '/assets/js/jquery-ui.min.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'lendevity-jquery-ui-touch-punch', get_template_directory_uri() . '/assets/js/jquery-ui-touch-punch.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'lendevity-quiz', get_template_directory_uri() . '/assets/js/quiz.js', array(), _S_VERSION, true );
	}

	if ( is_page_template(['template-mortgage-calculator.php']) ) {
		wp_enqueue_script( 'mortgage-calculator', get_template_directory_uri() . '/assets/js/mortgage-calculator.js', array(), _S_VERSION, true );
	}

	wp_enqueue_script( 'lendevity-function', get_template_directory_uri() . '/assets/js/function.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'lendevity_scripts' );

function admin_styles_scripts() {
	wp_enqueue_style("lendevity-admin-css", get_template_directory_uri() . '/assets/css/wp-admin.css');
}

add_action('admin_enqueue_scripts', 'admin_styles_scripts');


function lendevity_setup() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	register_nav_menus(
		array(
			'header' => esc_html__( 'header', 'lendevity' ),
			'footer' => esc_html__( 'footer', 'lendevity' ),
			'soc' => esc_html__( 'soc', 'lendevity' ),
			'footer-bottom' => esc_html__( 'footer-bottom', 'lendevity' ),
		)
	);
}
add_action( 'after_setup_theme', 'lendevity_setup' );

function lendevity_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lendevity_content_width', 640 );
}
add_action( 'after_setup_theme', 'lendevity_content_width', 0 );

//Разрешаем загрузку WebP
function webp_upload_mimes( $existing_mimes ) {
    // add webp to the list of mime types
    $existing_mimes['webp'] = 'image/webp';

    // return the array back to the function with our added mime type
    return $existing_mimes;
}
add_filter( 'mime_types', 'webp_upload_mimes' );

## отключаем создание миниатюр файлов для указанных размеров
add_filter( 'intermediate_image_sizes', 'delete_intermediate_image_sizes' );  
function delete_intermediate_image_sizes( $sizes ){
    // размеры которые нужно удалить
    return array_diff( $sizes, [
        // 'thumbnail',
        'medium',
        // 'medium_large',
        // 'large',
        '1536x1536',
        '2048x2048',
    ] );
}

//скрываем пункты меню в админ панели
add_action('admin_menu', 'remove_menus');
function remove_menus() {
    //remove_menu_page('index.php');                # Консоль 
    remove_menu_page('edit.php');                 # Записи 
    remove_menu_page('edit-comments.php');        # Комментарии 
    //remove_menu_page('edit.php?post_type=page');  # Страницы 
    //remove_menu_page('upload.php');               # Медиафайлы 
    //remove_menu_page('themes.php');               # Внешний вид 
    //remove_menu_page('plugins.php');              # Плагины 
    // remove_menu_page('users.php');                # Пользователи 
    // remove_menu_page('tools.php');                # Инструменты 
    //remove_menu_page('options-general.php');      # Параметры 
    remove_menu_page('edit.php?post_type=acf-field-group'); # ACF smart-custom-fields
}

// Отключаем принудительную проверку новых версий WP, плагинов и темы в админке,
require get_template_directory() . '/inc/disable-verification.php';
require get_template_directory() . '/inc/utilities.php';
require get_template_directory() . '/inc/acf-options.php';
require get_template_directory() . '/inc/breadcrumb.php';
require get_template_directory() . '/inc/post-type.php';
require get_template_directory() . '/inc/filter.php';
