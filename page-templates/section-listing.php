<?php
/**
 * Template Name: Section Listing
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
				get_template_part( 'template-parts/content', 'page' );
			endwhile; // End of the loop.
		?>
		<h2>Sections</h2>
			<div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
				<?php
					$sections   = array(
						'orderby'      => 'name',
						'hierarchical' => 1,
						'taxonomy'     => 'category',
						'exclude'      => array( 71, 74, 77 ), // editors note, letters to the editor, uncategorized
						'hide_empty'   => 1,
						'parent'       => 0,
					);
					$categories = get_categories( $sections );
					?>
				<?php foreach ( $categories as $category ) : ?>
						<div class="category section-card">
							<h3 class="capitalize !text-2xl">
								<a href="<?php echo get_category_link( $category->cat_ID ); ?>">
									<?php echo $category->name; ?>
								</a>
							</h3>
						</div>
				<?php endforeach; ?>
			</div>
			<hr>
		<h2>Topics</h2>
			<div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
				<?php
					$tags = get_tags();
				foreach ( $tags as $tag ) :
					$tag_link = get_tag_link( $tag->term_id );

					?>
					<div class="tag section-card">
						<h3 class="capitalize !text-2xl">
							<a href="<?php echo $tag_link; ?>"><?php echo $tag->name; ?></a>
						</h3>
					</div>
				<?php endforeach; ?>
			</div>
	</main><!-- #main -->

			<?php
			get_footer();
