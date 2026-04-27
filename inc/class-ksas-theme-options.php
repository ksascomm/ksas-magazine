<?php
/**
 * Theme Options Class
 *
 * @package KSAS_Magazine
 */

if ( ! class_exists( 'KSAS_Theme_Options' ) ) {

	/**
	 * KSAS_Theme_Options Class
	 */
	class KSAS_Theme_Options {

		/**
		 * Start things up
		 */
		public function __construct() {
			// We only need to register the admin panel on the back-end.
			if ( is_admin() ) {
				add_action( 'admin_menu', array( 'KSAS_Theme_Options', 'add_admin_menu' ) );
				add_action( 'admin_init', array( 'KSAS_Theme_Options', 'register_settings' ) );
			}
		}

		/**
		 * Returns all theme options
		 */
		public static function get_theme_options() {
			return get_option( 'theme_options' );
		}

		/**
		 * Returns single theme option
		 *
		 * @param string $id Option ID.
		 */
		public static function get_theme_option( $id ) {
			$options = self::get_theme_options();
			if ( isset( $options[ $id ] ) ) {
				return $options[ $id ];
			}
			return false;
		}

		/**
		 * Add sub menu page
		 */
		public static function add_admin_menu() {
			add_menu_page(
				esc_html__( 'A&S Magazine Options', 'ksas-magazine' ),
				esc_html__( 'A&S Magazine Options', 'ksas-magazine' ),
				'manage_options',
				'theme-settings',
				array( 'KSAS_Theme_Options', 'create_admin_page' )
			);
		}

		/**
		 * Register a setting and its sanitization callback.
		 */
		public static function register_settings() {
			register_setting( 'theme_options', 'theme_options', array( 'KSAS_Theme_Options', 'sanitize' ) );
		}

		/**
		 * Sanitization callback
		 *
		 * @param array $options Options to sanitize.
		 */
		public static function sanitize( $options ) {
			if ( $options ) {
				if ( ! empty( $options['input_example'] ) ) {
					$options['input_example'] = sanitize_text_field( $options['input_example'] );
				} else {
					unset( $options['input_example'] );
				}
			}
			return $options;
		}

		/**
		 * Settings page output
		 */
		public static function create_admin_page() {
			?>
			<div class="wrap">
				<h1><?php echo esc_html__( 'Theme Options', 'ksas-magazine' ); ?></h1>
				<form method="post" action="options.php">
					<?php settings_fields( 'theme_options' ); ?>
					<table class="form-table KSAS-custom-admin-login-table">
						<tr valign="top">
							<th scope="row"><?php echo esc_html__( 'Current Issue', 'ksas-magazine' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'input_example' ); ?>
								<input type="text" name="theme_options[input_example]" value="<?php echo esc_attr( $value ); ?>">
							</td>
						</tr>
					</table>
					<?php submit_button(); ?>
				</form>
			</div>
			<?php
		}
	}
}