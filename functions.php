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

    // Navigation menu
    function register_navigation_menu() {
      register_nav_menu('navigation-menu',__('Nav Menu'));
    }
    add_action('init', 'register_navigation_menu');

    // Institucional menu
    function register_institucional_menu() {
      register_nav_menu('institucional-menu',__('Menu Institucional'));
    }
    add_action('init', 'register_institucional_menu');

    // Conteudo menu
    function register_conteudo_menu() {
      register_nav_menu('conteudo-menu',__('Menu Conteudo'));
    }
    add_action('init', 'register_conteudo_menu');


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


add_action( 'after_setup_theme', 'woocommerce_support' );
  function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

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


//SVG suport
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


//Resolve mixed content over SSL

function get_theme_mod_img($mod_name){
     return str_replace(array('http:', 'https:'), '', get_theme_mod($mod_name));
}

/**************** Customize html structure ****************/

function main_menu() {
	$menu_name = 'main-menu';
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
	}
	echo $menu_list;
}

function navigation_menu() {
	$menu_name = 'navigation-menu';
	if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
		$menu = wp_get_nav_menu_object($locations[$menu_name]);
		$menu_items = wp_get_nav_menu_items($menu->term_id);

		$menu_list = '<nav>' ."\n";
		$menu_list .= "\t\t\t\t". '<ul class="header_content-box box-2">' ."\n";
		foreach ((array) $menu_items as $key => $menu_item) {
			$title = $menu_item->title;
			$url = $menu_item->url;
			$menu_list .= "\t\t\t\t\t". '<li><a href="'. $url .'">'. $title .'</a></li>' ."\n";
		}
		$menu_list .= "\t\t\t\t". '</ul>' ."\n";
		$menu_list .= "\t\t\t". '</nav>' ."\n";
	} else {
	}
	echo $menu_list;
}

function institucional_menu() {
	$menu_name = 'institucional-menu';
	if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
		$menu = wp_get_nav_menu_object($locations[$menu_name]);
		$menu_items = wp_get_nav_menu_items($menu->term_id);

		$menu_list = '<nav>' ."\n";
		$menu_list .= "\t\t\t\t". '<ul class="footer_sitemap--left in">' ."\n";
		foreach ((array) $menu_items as $key => $menu_item) {
			$title = $menu_item->title;
			$url = $menu_item->url;
			$menu_list .= "\t\t\t\t\t". '<li><a href="'. $url .'" class="color-grey subtitle">'. $title .'</a></li>' ."\n";
		}
		$menu_list .= "\t\t\t\t". '</ul>' ."\n";
		$menu_list .= "\t\t\t". '</nav>' ."\n";
	} else {
	}
	echo $menu_list;
}

function conteudo_menu() {
	$menu_name = 'conteudo-menu';
	if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
		$menu = wp_get_nav_menu_object($locations[$menu_name]);
		$menu_items = wp_get_nav_menu_items($menu->term_id);

		$menu_list = '<nav>' ."\n";
		$menu_list .= "\t\t\t\t". '<ul class="footer_sitemap--right in">' ."\n";
		foreach ((array) $menu_items as $key => $menu_item) {
			$title = $menu_item->title;
			$url = $menu_item->url;
			$menu_list .= "\t\t\t\t\t". '<li><a href="'. $url .'" class="color-grey subtitle">'. $title .'</a></li>' ."\n";
		}
		$menu_list .= "\t\t\t\t". '</ul>' ."\n";
		$menu_list .= "\t\t\t". '</nav>' ."\n";
	} else {
	}
	echo $menu_list;
}


/**************** Includes ****************/

// Customizer additions
require get_template_directory() . '/includes/customize.php';


// CUSTOM TAXONOMYS

add_action('init', 'type_post_entrevistas');

    function type_post_entrevistas() {
        $labels = array(
            'name' => _x('Entrevistas', 'post type general name'),
            'singular_name' => _x('Entrevista', 'post type singular name'),
            'add_new' => _x('Adicionar Novo', 'Novo item'),
            'add_new_item' => __('Novo Item'),
            'edit_item' => __('Editar Item'),
            'new_item' => __('Novo Item'),
            'view_item' => __('Ver Item'),
            'search_items' => __('Procurar Itens'),
            'not_found' =>  __('Nenhum registro encontrado'),
            'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
            'parent_item_colon' => '',
            'menu_name' => 'Entrevistas'
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'public_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('title','editor','thumbnail','comments', 'excerpt', 'custom-fields', 'revisions', 'trackbacks')
          );

register_post_type( 'entrevistas' , $args );
flush_rewrite_rules();
}

add_action('init', 'type_post_anuncios');

    function type_post_anuncios() {
        $labels = array(
            'name' => _x('Anuncios', 'post type general name'),
            'singular_name' => _x('Anuncio', 'post type singular name'),
            'add_new' => _x('Adicionar Novo', 'Novo item'),
            'add_new_item' => __('Novo Item'),
            'edit_item' => __('Editar Item'),
            'new_item' => __('Novo Item'),
            'view_item' => __('Ver Item'),
            'search_items' => __('Procurar Itens'),
            'not_found' =>  __('Nenhum registro encontrado'),
            'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
            'parent_item_colon' => '',
            'menu_name' => 'Anuncios'
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'public_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('title','editor','thumbnail', 'revisions' )
          );

register_post_type( 'anuncios' , $args );
flush_rewrite_rules();
}

add_action('init', 'type_post_noticias');

    function type_post_noticias() {
        $labels = array(
            'name' => _x('Notícias', 'post type general name'),
            'singular_name' => _x('Notícia', 'post type singular name'),
            'add_new' => _x('Adicionar Novo', 'Novo item'),
            'add_new_item' => __('Novo Item'),
            'edit_item' => __('Editar Item'),
            'new_item' => __('Novo Item'),
            'view_item' => __('Ver Item'),
            'search_items' => __('Procurar Itens'),
            'not_found' =>  __('Nenhum registro encontrado'),
            'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
            'parent_item_colon' => '',
            'menu_name' => 'Notícias'
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'public_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('title','editor','thumbnail', 'revisions', 'comments' )
          );

register_post_type( 'radar' , $args );
flush_rewrite_rules();
}

add_action('init', 'type_post_videos');

    function type_post_videos() {
        $labels = array(
            'name' => _x('Vídeos', 'post type general name'),
            'singular_name' => _x('Vídeo', 'post type singular name'),
            'add_new' => _x('Adicionar Novo', 'Novo item'),
            'add_new_item' => __('Novo Item'),
            'edit_item' => __('Editar Item'),
            'new_item' => __('Novo Item'),
            'view_item' => __('Ver Item'),
            'search_items' => __('Procurar Itens'),
            'not_found' =>  __('Nenhum registro encontrado'),
            'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
            'parent_item_colon' => '',
            'menu_name' => 'Vídeos'
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'public_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('title','editor','thumbnail', 'revisions', 'comments' )
          );

register_post_type( 'videos' , $args );
flush_rewrite_rules();
}

add_action('init', 'type_post_agenda');

    function type_post_agenda() {
        $labels = array(
            'name' => _x('Agenda', 'post type general name'),
            'singular_name' => _x('Agenda', 'post type singular name'),
            'add_new' => _x('Adicionar Novo', 'Novo item'),
            'add_new_item' => __('Novo Item'),
            'edit_item' => __('Editar Item'),
            'new_item' => __('Novo Item'),
            'view_item' => __('Ver Item'),
            'search_items' => __('Procurar Itens'),
            'not_found' =>  __('Nenhum registro encontrado'),
            'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
            'parent_item_colon' => '',
            'menu_name' => 'Agenda'
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'public_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('title')
          );

register_post_type( 'agenda' , $args );
flush_rewrite_rules();
}


// CUSTOM TAXONOMY

add_action( 'init', 'create_edicoes_hierarchical_taxonomy', 0 );

function create_edicoes_hierarchical_taxonomy() {

  $labels = array(
    'name' => _x( 'Edições', 'taxonomy general name' ),
    'singular_name' => _x( 'Edição', 'taxonomy singular name' ),
    'search_items' =>  __( 'Procurar Edição' ),
    'all_items' => __( 'Todas as Edições' ),
    'edit_item' => __( 'Editar Edição' ),
    'update_item' => __( 'Update Topic' ),
    'add_new_item' => __( 'Adicionar nova edição' ),
    'new_item_name' => __( 'Título Edição' ),
    'menu_name' => __( 'Edições' ),
  );

  register_taxonomy('edicoes',array('post'), array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array(
      'slug' => 'edicoes',
      'with_front' => false ),
  ));
}


add_action( 'init', 'create_tag_taxonomies', 0 );

//create two taxonomies, genres and tags for the post type "tag"
function create_tag_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Tags' ),
    'popular_items' => __( 'Popular Tags' ),
    'all_items' => __( 'All Tags' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Tag' ),
    'update_item' => __( 'Update Tag' ),
    'add_new_item' => __( 'Add New Tag' ),
    'new_item_name' => __( 'New Tag Name' ),
    'separate_items_with_commas' => __( 'Separate tags with commas' ),
    'add_or_remove_items' => __( 'Add or remove tags' ),
    'choose_from_most_used' => __( 'Choose from the most used tags' ),
    'menu_name' => __( 'Tags' ),
  );

  register_taxonomy('tag-radar','radar',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'tag-radar' ),
  ));

  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Tags' ),
    'popular_items' => __( 'Popular Tags' ),
    'all_items' => __( 'All Tags' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Tag' ),
    'update_item' => __( 'Update Tag' ),
    'add_new_item' => __( 'Add New Tag' ),
    'new_item_name' => __( 'New Tag Name' ),
    'separate_items_with_commas' => __( 'Separate tags with commas' ),
    'add_or_remove_items' => __( 'Add or remove tags' ),
    'choose_from_most_used' => __( 'Choose from the most used tags' ),
    'menu_name' => __( 'Tags' ),
  );

  register_taxonomy('tag-entrevista','entrevistas',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'tag-entrevista' ),
  ));

  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Tags' ),
    'popular_items' => __( 'Popular Tags' ),
    'all_items' => __( 'All Tags' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Tag' ),
    'update_item' => __( 'Update Tag' ),
    'add_new_item' => __( 'Add New Tag' ),
    'new_item_name' => __( 'New Tag Name' ),
    'separate_items_with_commas' => __( 'Separate tags with commas' ),
    'add_or_remove_items' => __( 'Add or remove tags' ),
    'choose_from_most_used' => __( 'Choose from the most used tags' ),
    'menu_name' => __( 'Tags' ),
  );

  register_taxonomy('tag-video','videos',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'tag-entrevista' ),
  ));
}


function custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

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
			'title' => 'Autor',
			'block' => 'span',
			'classes' => 'citacao-autor',
			'wrapper' => true,

		),
		array(
			'title' => 'Info Autor',
			'block' => 'span',
			'classes' => 'citacao-info-autor',
			'wrapper' => true,
		),
		array(
			'title' => 'Entrevistado',
			'block' => 'span',
			'classes' => 'entrevistado',
			'wrapper' => true,
		),
		array(
			'title' => 'Display images',
			'block' => 'div',
			'classes' => 'post-images',
			'wrapper' => true,
		),
		array(
			'title' => 'Bloco images',
			'block' => 'div',
			'classes' => 'post-images-item',
			'wrapper' => true,
		),
		array(
			'title' => 'Item lista',
			'block' => 'span',
			'classes' => 'list-item',
			'wrapper' => true,
		),
		array(
			'title' => 'Bloco Destaque',
			'block' => 'div',
			'classes' => 'red-block',
			'wrapper' => true,
		),
	);
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );

	return $init_array;

}

// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'new_mce_before_init_insert_formats' );



// Connect the WordPress post editor to your custom stylesheet
function my_theme_add_editor_styles() {
  add_editor_style( 'style-wpadmin.css' );
}

add_action( 'admin_init', 'my_theme_add_editor_styles' );


//Insert ads after second paragraph of single post content.

add_filter( 'the_content', 'prefix_insert_post_ads' );

function  getAnuncio(){
    $post = get_post( 205 );
    setup_postdata($post);
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
    if($image):
      return '<section class="merchandising_1 container"><a href="' . get_field('link') . '"><img src="' .  $image[0] . '" width="60" height="60" alt="" class="image" /></a></section>';
    else:
      return '<section class="merchandising_1 container"><a href="' . get_site_url() . '/anuncie"><p class="subtitle">' . get_the_content() . '</p></a></section>';
    endif;
    wp_reset_postdata();
}

function prefix_insert_post_ads( $content ) {
   $ad_code = getAnuncio();
   global $post;

	if ( is_single() && ! is_admin()):
    if ($post->post_type == 'post'):
		  return prefix_insert_after_paragraph( $ad_code, 1, $content );
    endif;
    if ($post->post_type == 'radar'):
		  return prefix_insert_after_paragraph_radar( $ad_code, 1, $content );
    endif;
	endif;

	return $content;
}

// Parent Function that makes the magic happen

function prefix_insert_after_paragraph( $insertion, $paragraph_id, $content ) {
	$closing_p = '</p>';
	$paragraphs = explode( $closing_p, $content );
	foreach ($paragraphs as $index => $paragraph) {

		if ( trim( $paragraph ) ) {
			$paragraphs[$index] .= $closing_p;
		}

		if ( $paragraph_id == $index / 4 ) {
			$paragraphs[$index] .= $insertion;
		}
	}

	return implode( '', $paragraphs );
}
function prefix_insert_after_paragraph_radar( $insertion, $paragraph_id, $content ) {
	$closing_p = '</p>';
	$paragraphs = explode( $closing_p, $content );
	foreach ($paragraphs as $index => $paragraph) {

		if ( trim( $paragraph ) ) {
			$paragraphs[$index] .= $closing_p;
		}

		if ( $paragraph_id == $index / 8 ) {
			$paragraphs[$index] .= $insertion;
		}
	}

	return implode( '', $paragraphs );
}

// =================== BREADCRUMB =================================================================

function wp_custom_breadcrumbs() {

  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '&raquo;'; // delimiter between crumbs
  $home = 'Home'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb

  global $post;
  $homeLink = get_bloginfo('url');

  if (is_home() || is_front_page()) {

    if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';

  } else {

    echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . 'categoria "' . single_cat_title('', false) . '"' . $after;

    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;

    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;

    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;

    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;

    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }

    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }

    echo '</div>';

  }
} // end wp_custom_breadcrumbs()

function filter_ptags_on_blockquotes($content) {
    $content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
    return preg_replace('/<p>\s*(<span .*>*.<\/span>)\s*<\/p>/iU', '\1', $content);
}

add_filter('the_content', 'filter_ptags_on_blockquotes');


// ENABLE API KEY TO GOOGLE MAPS

function my_acf_init() {

	acf_update_setting('google_api_key', 'AIzaSyBD_q4OSfvJTaB8uiqiffCpL0sGnT2de74');
}

add_action('acf/init', 'my_acf_init');

add_filter( 'woocommerce_add_cart_item_data', 'woo_custom_add_to_cart' );

function woo_custom_add_to_cart( $cart_item_data ) {

    global $woocommerce;
    $woocommerce->cart->empty_cart();

    // Do nothing with the data and return
    return $cart_item_data;
}

// add_action('woocommerce_add_to_cart', 'custome_add_to_cart');
// function custome_add_to_cart() {
//     global $woocommerce;
//     echo 'AAAAAA';
// }
