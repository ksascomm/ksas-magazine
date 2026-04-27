<?php
/**
 * The template for displaying tag archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
		<?php if ( have_posts() ) : ?>
			<header class="py-6 prose page-header">
				<h1 class="!mb-0 capitalize">Topic: <?php single_term_title(); ?> </h1>
			</header><!-- .page-header -->
			<div class="grid grid-cols-1 gap-4 p-4 mx-auto md:grid-cols-2 lg:grid-cols-3 entry-content">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'taxonomy-archive' );

			endwhile;
			?>
			</div>
			<?php
			if ( function_exists( 'ksas_magazine_pagination' ) ) :

				ksas_magazine_pagination();

			else :

				the_posts_navigation();

			endif;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
