<?php
/**
 * Specific functions for this theme
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package KSAS_Magazine
 * @since KSAS_Magazine 1.0.0
 */

/**
 * Procedural functions for this theme
 */

require_once get_template_directory() . '/inc/class-ksas-theme-options.php';
new KSAS_Theme_Options();

/**
 * Helper function for theme options.
 *
 * @param string $id The ID of the specific theme option to retrieve.
 * @return mixed The value of the theme option, or false if not found.
 */
function asmag_get_theme_option( $id = '' ) {
	return KSAS_Theme_Options::get_theme_option( $id );
}

/**
 * Collect current theme option values.
 */
function asmag_get_global_options() {
	return get_option( 'asmag_options' );
}

/**
 * Get the Volume Slug (Sanitized).
 *
 * @param WP_Post|null $post_obj Optional. The post object to check. Defaults to null.
 * @return string The volume slug or the current issue from theme options.
 */
function get_the_volume( $post_obj = null ) {
	// Use ID from passed object or current queried object.
	$target_id    = $post_obj ? $post_obj->ID : get_queried_object_id();
	$terms        = get_the_terms( $target_id, 'volume' );
	$asmag_option = asmag_get_global_options();
	$volume       = '';

	if ( is_array( $terms ) ) {
		$term_slugs = array();
		foreach ( $terms as $term ) {
			if ( 'feature' !== $term->slug ) {
				$term_slugs[] = $term->slug;
			}
		}
		$volume = implode( '', $term_slugs );
	}

	// Sanitize and Unslash the GET variable.
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended.
	if ( isset( $_GET['volume'] ) ) {
		$volume = sanitize_text_field( wp_unslash( $_GET['volume'] ) );
	}

	if ( empty( $volume ) && isset( $asmag_option['asmag_current_issue'] ) ) {
		$volume = $asmag_option['asmag_current_issue'];
	}

	return $volume;
}

/**
 * Get the Volume Name (Sanitized)
 *
 * @param WP_Post|null $post_obj Optional. The post object to check. Defaults to null.
 * @return string The volume slug or the current issue from theme options.
 */
function get_the_volume_name( $post_obj = null ) {
	$target_id    = $post_obj ? $post_obj->ID : get_queried_object_id();
	$terms        = get_the_terms( $target_id, 'volume' );
	$asmag_option = asmag_get_global_options();
	$volume_name  = '';

	if ( is_array( $terms ) ) {
		$term_names = array();
		foreach ( $terms as $term ) {
			if ( 'Feature' !== $term->name ) {
				$term_names[] = $term->name;
			}
		}
		$volume_name = implode( '', $term_names );
	}

	if ( isset( $_GET['volume'] ) ) {
		$new_volume      = sanitize_text_field( wp_unslash( $_GET['volume'] ) );
		$new_volume_data = get_term_by( 'slug', $new_volume, 'volume' );
		if ( $new_volume_data ) {
			$volume_name = $new_volume_data->name;
		}
	}

	if ( empty( $volume_name ) && isset( $asmag_option['asmag_current_issue'] ) ) {
		$new_volume      = $asmag_option['asmag_current_issue'];
		$new_volume_data = get_term_by( 'slug', $new_volume, 'volume' );
		if ( $new_volume_data ) {
			$volume_name = $new_volume_data->name;
		}
	}

	return $volume_name;
}

/**
 * Taxonomy and Author Loop Supports
 */
add_action(
	'init',
	function () {
		register_taxonomy_for_object_type( 'post_tag', 'page' );
		register_taxonomy_for_object_type( 'category', 'page' );
	}
);

add_action(
	'pre_get_posts',
	function ( $query ) {
		if ( ! is_admin() && $query->is_main_query() ) {
			if ( $query->is_tag() || $query->is_category() ) {
				$query->set( 'post_type', array( 'post', 'page' ) );
			}
			if ( is_author() && empty( $query->query_vars['suppress_filters'] ) ) {
				$query->set( 'post_type', array( 'post', 'page' ) );
			}
		}
	}
);

if ( ! function_exists( 'asmagazine_entry_meta' ) ) :
	/**
	 * Display entry meta information for posts.
	 *
	 * Prints the author byline, checking for specific staff IDs or
	 * the PublishPress Authors plugin.
	 *
	 * @return void
	 */
	function asmagazine_entry_meta() {
		$author_id        = get_post_field( 'post_author', get_the_ID() );
		$staff_author_ids = array( 1, 2, 5, 151, 378 );

		if ( in_array( (int) $author_id, $staff_author_ids, true ) ) {
			echo '<p class="byline author">' . esc_html__( 'By Magazine Staff', 'ksas-magazine' ) . '</p>';
		} elseif ( is_plugin_active( 'publishpress-authors-pro/publishpress-authors-pro.php' ) ) {
			do_action( 'pp_multiple_authors_show_author_box', false, 'inline' );
		} else {
			echo '<p class="byline author">';
			printf(
				/* translators: %s: Author name */
				esc_html__( 'By %s', 'ksas-magazine' ),
				'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author" class="fn">' . esc_html( get_the_author() ) . '</a>'
			);
			echo '</p>';
		}
	}
endif;

/**
 * Custom thumbnail sizes & Page support
 */
add_image_size( 'related-posts', 600, 400, true );
add_image_size( 'home-curated-small', 350, 350, true );
add_post_type_support( 'page', 'excerpt' );
