<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package KSAS_Magazine
 */

get_header();
?>

	<main id="site-content" class="mx-auto prose site-main lg:prose-lg">
		<?php
		if ( function_exists( 'bcn_display' ) ) :
			?>
		<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
			<?php bcn_display(); ?>
		</div>
		<?php endif; ?>
		<section class="p-6 prose error-404 not-found">
			<header class="page-header">
				<h1 class="entry-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'ksas-magazine-tailwind' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable', 'ksas-magazine-tailwind' ); ?></p>

				<p><?php esc_html_e( 'Please try the following:', 'ksas-magazine-tailwind' ); ?></p>
								<ul>
					<li><?php esc_html_e( 'Check your spelling', 'ksas-magazine-tailwind' ); ?></li>
					<li>
						<?php
						/* translators: %s: home page url */
						$home_text = sprintf( __( 'Return to the <a href="%s">home page</a>', 'ksas-magazine-tailwind' ), esc_url( home_url( '/' ) ) );

						echo wp_kses( $home_text, array( 'a' => array( 'href' => array() ) ) );
						?>
					</li>
					<li>
						<?php
						/* translators: %s: The back link HTML */
						$ksas_back_link = sprintf( __( 'Click the %s button', 'ksas-magazine-tailwind' ), '<a href="javascript:history.back()">Back</a>' );

						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						echo $ksas_back_link;
						?>
					</li>
					<li><?php esc_html_e( 'Use the search box in the menu', 'ksas-magazine-tailwind' ); ?></li>
				</ul>
				</ul>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
