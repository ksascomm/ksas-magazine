<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Magazine
 */

get_header();
?>

	<main id="site-content" class="site-main prose lg:prose-lg mx-auto">
		<?php
		if ( function_exists( 'bcn_display' ) ) :
			?>
		<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
			<?php bcn_display(); ?>
		</div>
	<?php endif; ?>
	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; // End have_posts() check. ?>
			</div>
			<?php
			if ( function_exists( 'ksas_magazine_pagination' ) ) :

				ksas_magazine_pagination();

			else :

				the_posts_navigation();

			endif;
			?>

	</main><!-- #main -->

<?php
get_footer();
