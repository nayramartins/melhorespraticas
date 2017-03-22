<?php
/**
 * Blog melhorespraticas functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 */

if (!function_exists('melhorespraticas_setup')):
	function melhorespraticas_setup() {
    // CSS register
    if (!is_admin()):
      function prefix_add_footer_styles() {
        wp_enqueue_style('style', get_stylesheet_uri());
      };
      add_action( 'get_footer', 'prefix_add_footer_styles' );
    endif;

    // Javascript register
    function my_scripts_loader() {

    if (is_single()):
      wp_enqueue_script( 'single-js', '/wp-content/themes/melhorespraticas/js/melhorespraticas-single.min.js', '','',true );
    else:
      wp_enqueue_script( 'main-js' );
    endif;
    }
    add_action('wp_enqueue_scripts', 'my_scripts_loader');

    // Main menu
    function register_main_menu() {
      register_nav_menu('main-menu',__('Main Menu'));
    }
    add_action('init', 'register_main_menu');

    // Category menu
    function register_category_menu() {
      register_nav_menu('category-menu',__('Category Menu'));
    }
    add_action('init', 'register_main_menu');

    // Feature image
    add_theme_support('post-thumbnails');

    // Make theme available for translation
    load_theme_textdomain('melhorespraticas', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Enable support for HTML5 markup
    add_theme_support( 'html5', array(
      'comment-list',
      'search-form',
      'comment-form',
      'gallery',
      'caption',
    ) );

    // Setup the WordPress Core custom background feature
    add_theme_support( 'custom-background', apply_filters( 'melhorespraticas_custom_background_args', array(
      'default-color' => 'ffffff',
      'default-image' => '',
    )));

		function main_nav() {
			echo '<nav id="main-menu"><ul class="sf-menu clearfix">';
			wp_list_pages('sort_column=menu_order&title_li=');
			echo '</ul></nav>';
		}
  }
endif;

add_action('after_setup_theme', 'melhorespraticas_setup');

// Add Post Image Sizes
add_image_size('melhorespraticas_post_thumb_small', 120, 120, true);
add_image_size('melhorespraticas_post_thumb', 384, 216, true);
add_image_size('melhorespraticas_post_thumb_medium', 768, 416, true);
add_image_size('melhorespraticas_post_thumb_big', 1020, 280, true);
add_image_size('melhorespraticas_full_width', 2000, 9999, true);


// Excerpt settings
function new_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit):
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  else:
    $excerpt = implode(" ",$excerpt);
  endif;
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

// Set query to pagination
function new_post_queries($query) {

  if (!is_admin() && $query->is_main_query()):

    if(is_home()):
      $query->set('posts_per_page', 4);
    endif;

    if(is_category()):
      $query->set('posts_per_page', 4);
    endif;

    if(is_author()):
      $query->set('posts_per_page', 4);
    endif;

  endif;
}
add_action( 'pre_get_posts', 'new_post_queries' );


// Format button to tiny editor

// 'styleselect' into the $buttons array
function new_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
add_filter( 'mce_buttons_2', 'new_mce_buttons_2' );

function new_mce_before_init_insert_formats( $init_array ) {

	$style_formats = array(
		// Each array child is a format with it's own settings
		array(
			'title' => 'Image left',
			'block' => 'div',
			'classes' => 'img-left',
			'wrapper' => true,

		),
		array(
			'title' => 'Image center',
			'block' => 'div',
			'classes' => 'img-center',
			'wrapper' => true,
		),
	);
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );

	return $init_array;

}

// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'new_mce_before_init_insert_formats' );

//SVG suport
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


//Insert table function to tiny editor

function add_the_table_button( $buttons ) {
   array_push( $buttons, 'separator', 'table' );
   return $buttons;
}
add_filter( 'mce_buttons', 'add_the_table_button' );

function add_the_table_plugin( $plugins ) {
    $plugins['table'] = content_url() . '/plugins/tinymceplugins/table/plugin.min.js';
    return $plugins;
}
add_filter( 'mce_external_plugins', 'add_the_table_plugin' );

//Resolve mixed content over SSL

function get_theme_mod_img($mod_name){
     return str_replace(array('http:', 'https:'), '', get_theme_mod($mod_name));
}


/**************** Customize html structure ****************/

function main_menu() {
	$menu_name = 'main-menu'; // specify custom menu slug
	if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
		$menu = wp_get_nav_menu_object($locations[$menu_name]);
		$menu_items = wp_get_nav_menu_items($menu->term_id);

		$menu_list = '<nav>' ."\n";
		$menu_list .= "\t\t\t\t". '<ul class="header_top-menu">' ."\n";
		foreach ((array) $menu_items as $key => $menu_item) {
			$title = $menu_item->title;
			$url = $menu_item->url;
			$menu_list .= "\t\t\t\t\t". '<li><a href="'. $url .'">'. $title .'</a></li>' ."\n";
		}
		$menu_list .= "\t\t\t\t". '</ul>' ."\n";
		$menu_list .= "\t\t\t". '</nav>' ."\n";
	} else {
		// $menu_list = '<!-- no list defined -->';
	}
	echo $menu_list;
}


/**************** Includes ****************/

// Customizer additions
require get_template_directory() . '/includes/customize.php';