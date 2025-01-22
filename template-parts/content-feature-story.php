<?php
/**
 * Template part for displaying conditional feature story content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Magazine
 */

?>
<?php if ( function_exists( 'get_field' ) && get_field( 'ecpt_asmag_css' ) ) : ?> 
	<style><?php the_field( 'ecpt_asmag_css' ); ?></style>
<?php endif; ?>

<?php
$volume_name = get_the_volume_name( $post );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
if ( has_post_thumbnail() ) :
	?>
	<div class="alignfull featured-image-area front-featured-image-area relative mb-0" role="banner">
		<div class="flex-col lg:flex bg-white lg:h-[425px]">
			<?php
				the_post_thumbnail(
					'full',
					array(
						'class' => 'h-56 mt-0 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full',
						'title' => 'Feature image',
					)
				);
			?>
			<div class="content p-4 pt-8 md:p-12 pb-12 lg:max-w-2xl w-full lg:absolute top-12 left-5 lg:bg-primary lg:bg-opacity-60">
				<h1 class="lg:text-white">
					<?php the_title(); ?>
				</h1>
				<?php if ( function_exists( 'get_field' ) && get_field( 'ecpt_tagline' ) ) : ?> 
					<div class="lg:mt-2 lg:text-white text-lg md:text-xl tracking-tight">
						<p class="leading-normal"><?php the_field( 'ecpt_tagline' ); ?></p>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php else : ?>
	<!-- Put conditional here to print page title when no featured image -->
	<div class="alignfull !mt-0" role="banner">
		<div class="flex bg-white lg:bg-grey-cool lg:bg-opacity-50 front-featured-image-area h-20 lg:h-40">
			<div class="flex lg:items-center px-6 xl:ml-32">
				<h1 class="entry-title">
					<?php the_title(); ?>
				</h1>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<div class="wayfinding md:mb-8 ml-4 xl:ml-0">
		<?php
		if ( function_exists( 'bcn_display' ) ) :
			?>
			<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
				<?php bcn_display(); ?>
			</div>
		<?php endif; ?>
	</div>

	<div class="entry-content">
		<div class="entry-meta">
		<?php asmagazine_entry_meta(); ?>
		<?php if ( function_exists( 'get_field' ) && get_field( 'ecpt_other_credits' ) ) : ?> 
			<p class="byline credits"><?php the_field( 'ecpt_other_credits' ); ?></p>
		<?php endif; ?>
			<p class="byline issue">Issue: <a href="<?php echo get_permalink( $post->post_parent ); ?>"><?php echo $volume_name; ?></a></p>
		</div>
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ksas-magazine' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="sr-only">%s</span>', 'ksas-magazine' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php get_template_part( 'template-parts/explore-and-share' ); ?>
<?php get_template_part( 'template-parts/feature', 'footer' ); ?>
