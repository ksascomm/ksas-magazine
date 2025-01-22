<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Magazine
 */

get_header();
?>

	<main id="site-content" class="site-main prose lg:prose-lg mx-auto">

		<?php
		while ( have_posts() ) :
			the_post();
			$volume = get_the_volume( $post );
			if ( ! in_category( 'feature-story' ) || ! $volume = 'feature' ) :
				get_template_part( 'template-parts/content', 'page' );
			else :
				get_template_part( 'template-parts/content', 'feature-story' );
			endif;
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
