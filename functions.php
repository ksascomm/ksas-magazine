<?php
/**
 * KSAS_Magazine functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package KSAS_Magazine
 */

if ( ! defined( 'KSAS_MAGAZINE_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'KSAS_MAGAZINE_VERSION', '2.1.0' );
}

if ( ! function_exists( 'ksas_magazine_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ksas_magazine_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-nav' => esc_html__( 'The Main Menu', 'ksas-magazine-tailwind' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Set content-width.
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 1000;
		}

		/*
		* Adds `async` and `defer` support for scripts registered or enqueued
		* by the theme.
		*/
		$loader = new TwentyTwenty_Script_Loader();
		add_filter( 'script_loader_tag', array( $loader, 'filter_script_loader_tag' ), 10, 2 );
	}
endif;
add_action( 'after_setup_theme', 'ksas_magazine_setup' );

/**
 * Theme functions
 */
require get_template_directory() . '/inc/magazine-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Pagination
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Block Patterns
 */
require get_template_directory() . '/inc/block-patterns.php';

/**
 * Gutenberg Editor
 */
require get_template_directory() . '/inc/gutenberg.php';

/**
 * Various clean up functions
 */
require get_template_directory() . '/inc/cleanup.php';

/**
 * Handle SVG icons
 */
require get_template_directory() . '/inc/class-twentytwenty-svg-icons.php';
require get_template_directory() . '/inc/svg-icons.php';

/**
 * Custom script loader class
 */
require get_template_directory() . '/inc/class-twentytwenty-script-loader.php';

/**
 * Open Graph Meta Tags
 */
require get_template_directory() . '/inc/open-graph-icons.php';

/**
 * Load ACF compatibility file.
 */
if ( function_exists( 'acf_add_options_page' ) ) {
	require get_template_directory() . '/inc/acf-options.php';
}

/**
 * Include a skip to content link at the top of the page so that users can bypass the menu.
 */
function ksas_skip_link() {
	echo '<div role="navigation" aria-label="Skip to main content"><a class="skip-link screen-reader-text" href="#site-content">' . esc_html__( 'Skip to the content', 'ksas-magazine-tailwind' ) . '</a></div>';
}

add_action( 'wp_body_open', 'ksas_skip_link', 5 );

/**
 * Enqueue scripts and styles.
 */
function ksas_magazine_scripts() {
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'ksas-magazine-style', get_template_directory_uri() . '/dist/css/style.css', array(), filemtime( get_template_directory() . '/dist/css/style.css' ), false );
	wp_style_add_data( 'ksas-magazine-style', 'rtl', 'replace' );

	wp_enqueue_script( 'ksas-magazine-script', get_template_directory_uri() . '/dist/js/bundle.min.js', array( 'jquery' ), KSAS_MAGAZINE_VERSION, true );
	wp_script_add_data( 'ksas-magazine-script', 'defer', true );

	wp_enqueue_script( 'google-cse', 'https://cse.google.com/cse.js?cx=012258670098148303364:rjbbbscnowo', array(), KSAS_MAGAZINE_VERSION, false );

	wp_enqueue_script( 'font-awesome', 'https://kit.fontawesome.com/72c92fef89.js', array(), '6.7.2', false );
	wp_script_add_data( 'fontawesome', array( 'crossorigin' ), array( 'anonymous' ) );
}
add_action( 'wp_enqueue_scripts', 'ksas_magazine_scripts' );

/**
 * Enqueue Siteimprove Analytics script.
 */
function ksas_enqueue_siteimprove() {
	// Only enqueue if the ACF option is set.
	if ( get_field( 'siteimprove', 'option' ) ) {
		wp_enqueue_script(
			'siteimprove-analytics',
			'https://siteimproveanalytics.com/js/siteanalyze_11464.js',
			array(),
			null,
			array( 'strategy' => 'async' )
		);
	}
}
add_action( 'wp_enqueue_scripts', 'ksas_enqueue_siteimprove' );

/**
 * Add defer attribute to specific scripts.
 *
 * @param string $tag    The <script> tag for the enqueued script.
 * @param string $handle The script's registered handle.
 * @return string The modified <script> tag.
 */
function add_defer_attribute( $tag, $handle ) {
	// Add script handles to the array below.
	$scripts_to_defer = array( 'font-awesome' );

	foreach ( $scripts_to_defer as $defer_script ) {
		if ( $defer_script === $handle ) {
			return str_replace( ' src', ' defer="defer" src', $tag );
		}
	}
	return $tag;
}

add_filter( 'script_loader_tag', 'add_defer_attribute', 10, 2 );

/**
 * Add async attribute to specific scripts.
 *
 * @param string $tag    The <script> tag for the enqueued script.
 * @param string $handle The script's registered handle.
 * @return string The modified <script> tag.
 */
function add_async_attribute( $tag, $handle ) {
	// Add script handles to the array below.
	$scripts_to_async = array( 'google-tag-manager' );

	foreach ( $scripts_to_async as $async_script ) {
		if ( $async_script === $handle ) {
			return str_replace( ' src', ' async="async" src', $tag );
		}
	}
	return $tag;
}

add_filter( 'script_loader_tag', 'add_async_attribute', 10, 2 );
