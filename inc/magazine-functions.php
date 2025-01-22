<?php
/**
 * Specific functions for this theme
 *
 * @package KSAS_Magazine
 * @since KSAS_Magazine 1.0.0
 */

// Start Class
if ( ! class_exists( 'KSAS_Theme_Options' ) ) {

	class KSAS_Theme_Options {

		/**
		 * Start things up
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			// We only need to register the admin panel on the back-end
			if ( is_admin() ) {
				add_action( 'admin_menu', array( 'KSAS_Theme_Options', 'add_admin_menu' ) );
				add_action( 'admin_init', array( 'KSAS_Theme_Options', 'register_settings' ) );
			}

		}

		/**
		 * Returns all theme options
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_options() {
			return get_option( 'theme_options' );
		}

		/**
		 * Returns single theme option
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_option( $id ) {
			$options = self::get_theme_options();
			if ( isset( $options[ $id ] ) ) {
				return $options[ $id ];
			}
		}

		/**
		 * Add sub menu page
		 *
		 * @since 1.0.0
		 */
		public static function add_admin_menu() {
			add_menu_page(
				esc_html__( 'A&S Magazine Options', 'text-domain' ),
				esc_html__( 'A&S Magazine Options', 'text-domain' ),
				'manage_options',
				'theme-settings',
				array( 'KSAS_Theme_Options', 'create_admin_page' )
			);
		}

		/**
		 * Register a setting and its sanitization callback.
		 *
		 * We are only registering 1 setting so we can store all options in a single option as
		 * an array. You could, however, register a new setting for each option
		 *
		 * @since 1.0.0
		 */
		public static function register_settings() {
			register_setting( 'theme_options', 'theme_options', array( 'KSAS_Theme_Options', 'sanitize' ) );
		}

		/**
		 * Sanitization callback
		 *
		 * @since 1.0.0
		 */
		public static function sanitize( $options ) {

			// If we have options lets sanitize them
			if ( $options ) {

				// Input
				if ( ! empty( $options['input_example'] ) ) {
					$options['input_example'] = sanitize_text_field( $options['input_example'] );
				} else {
					unset( $options['input_example'] ); // Remove from options if empty
				}
			}

			// Return sanitized options
			return $options;

		}

		/**
		 * Settings page output
		 *
		 * @since 1.0.0
		 */
		public static function create_admin_page() { ?>

			<div class="wrap">

				<h1><?php esc_html_e( 'Theme Options', 'text-domain' ); ?></h1>

				<form method="post" action="options.php">

					<?php settings_fields( 'theme_options' ); ?>

					<table class="form-table KSAS-custom-admin-login-table">

						<?php // Text input example ?>
						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'Current Issue', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'input_example' ); ?>
								<input type="text" name="theme_options[input_example]" value="<?php echo esc_attr( $value ); ?>">
							</td>
						</tr>


					</table>

					<?php submit_button(); ?>

				</form>

			</div><!-- .wrap -->
			<?php
		}

	}
}
new KSAS_Theme_Options();

// Helper function to use in your theme to return a theme option value
function asmag_get_theme_option( $id = '' ) {
	return KSAS_Theme_Options::get_theme_option( $id );
}

/**
 * Specific functions for this theme
 *
 * @package ASMagazine
 * @since ASMagazine 1.0.0
 */

/**
 * Collect current theme option values.
 */
function asmag_get_global_options() {
	$asmag_option = array();
	$asmag_option = get_option( 'asmag_options' );
	return $asmag_option;
}
/**
 * Function to call theme options in theme files.
 */
$asmag_option = asmag_get_global_options();
function get_the_volume( $post ) {
	wp_reset_postdata();
	$post         = get_queried_object_id();
	$terms        = get_the_terms( $post, 'volume' );
	$asmag_option = asmag_get_global_options();
	if ( is_array( $terms ) ) {
		$term_slugs = array();
		foreach ( $terms as $term ) {
			if ( $term->slug != 'feature' ) {
				$term_slugs[] = $term->slug;
			}
			$volume = implode( '', $term_slugs ); }
	} else {
		$volume = $terms['volume']; }
	if ( isset( $_GET['volume'] ) ) {
		$volume = $_GET['volume'];
	}
	if ( $volume == null ) {
		$volume = $asmag_option['asmag_current_issue']; }
	return $volume;
}

/**
 * Get the Volume Name
 */
function get_the_volume_name( $post ) {
	$post         = get_queried_object_id();
	$terms        = get_the_terms( $post, 'volume' );
	$asmag_option = asmag_get_global_options();

	if ( is_array( $terms ) ) {
		$term_names = array();
		foreach ( $terms as $term ) {
			if ( $term->name != 'Feature' ) {
				$term_names[] = $term->name;
			}
		}
		$volume_name = implode( '', $term_names );
	} else {
		$volume_name = $terms; }

	if ( isset( $_GET['volume'] ) ) {
		$new_volume      = $_GET['volume'];
		$new_volume_data = get_term_by( 'slug', $new_volume, 'volume' );
		$volume_name     = $new_volume_data->name;
	}

	if ( $volume_name == null ) {
		$new_volume      = $asmag_option['asmag_current_issue'];
		$new_volume_data = get_term_by( 'slug', $new_volume, 'volume' );
		$volume_name     = $new_volume_data->name;
	}

	return $volume_name;
}

/**
 * Add tag and category support to pages.
 */
function tags_categories_support_all() {
	register_taxonomy_for_object_type( 'post_tag', 'page' );
	register_taxonomy_for_object_type( 'category', 'page' );
}

/**
 * Ensure all tags and categories are included in queries.
 */
function tags_categories_support_query( $wp_query ) {
	if ( $wp_query->get( 'tag' ) ) {
		$wp_query->set( 'post_type', 'any' );
	}
	if ( $wp_query->get( 'category_name' ) ) {
		$wp_query->set( 'post_type', 'any' );
	}
}

// tag and category hooks.
add_action( 'init', 'tags_categories_support_all' );
add_action( 'pre_get_posts', 'tags_categories_support_query' );

/**
 * Add PAGE post type to author.php loop.
 */
function wpbrigade_author_custom_post_types( $query ) {
	if ( is_author() && empty( $query->query_vars['suppress_filters'] ) ) {
		$query->set(
			'post_type',
			array(
				'post',
				'page',
			)
		);
		return $query;
	}
}
add_filter( 'pre_get_posts', 'wpbrigade_author_custom_post_types' );

/**
 * Entry meta information for posts
 *
 * @package ASMagazine
 * @since ASMagazine 1.0.0
 */

if ( ! function_exists( 'asmagazine_entry_meta' ) ) :
	function asmagazine_entry_meta() {
		$author = get_post_field( 'post_author', get_the_ID() );
		// KSASComm.
		if ( $author == '1' ) {
			echo '<p class="byline author">' . __( 'By Magazine Staff', 'asmagazine' ) . '</p>';
		} elseif ( $author == '2' ) {
			// KSASComm.
			echo '<p class="byline author">' . __( 'By Magazine Staff', 'asmagazine' ) . '</p>';

		} elseif ( $author == '5' ) {
			// Kathy.
			echo '<p class="byline author">' . __( 'By Magazine Staff', 'asmagazine' ) . '</p>';

		} elseif ( $author == '151' ) {
			// Morgan.
			echo '<p class="byline author">' . __( 'By Magazine Staff', 'asmagazine' ) . '</p>';

		} elseif ( $author == '378' ) {
			// Rebecca.
			echo '<p class="byline author">' . __( 'By Magazine Staff', 'asmagazine' ) . '</p>';

		} else {
			if ( is_plugin_active( 'publishpress-authors-pro/publishpress-authors-pro.php' ) ) {
				do_action( 'pp_multiple_authors_show_author_box', false, 'inline' );
			} else {
				echo '<p class="byline author">' . __( 'By', 'asmagazine' ) . ' <a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author" class="fn">' . get_the_author() . '</a></p>';
			}
		}
	}
endif;

/**
 * Custom thumbnail sizes
 */
add_image_size( 'related-posts', 600, 400 );
add_image_size( 'home-curated-small', 350, 350 );