<?php
/**
 * Revista Melhores Praticas functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 */

 if (!function_exists('rmp_setup')):
	function rmp_setup() {
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
      wp_enqueue_script( 'single-js', '/wp-content/themes/melhorespraticas/js/melhoraspraticas.min.js', '','',true );
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
    load_theme_textdomain('rmp', get_template_directory() . '/languages');

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

    function main_nav() {
        echo '<nav id="main-menu"><ul class="sf-menu clearfix">';
        wp_list_pages('sort_column=menu_order&title_li=');
        echo '</ul></nav>';
    }
  }
endif;