<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Magazine
 */

?>
<?php
$categories  = get_the_category();
$thiscat     = $categories[0]->cat_ID;
$catname     = $categories[0]->name;
$catslug     = $categories[0]->slug;
$volume_name = get_the_volume_name( $post );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title !font-gothicmedium">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title !font-gothicmedium"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; ?>

		<div class="entry-meta">
			<p class="byline issue"><?php echo $volume_name; ?></p>
			<?php if ( ! has_category( 'dean' ) ) : ?>
				<?php asmagazine_entry_meta(); ?>
			<?php endif; ?>
		</div>

	</header><!-- .entry-header -->
	<?php
	if ( function_exists( 'get_field' ) && get_field( 'show_featured_image' ) == 1 ) {
		ksas_magazine_post_thumbnail();
	} else {
		// do nothing
	}
	?>
	<div class="entry-content">
	<?php
	if ( is_singular() ) :
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="sr-only"> "%s"</span>', 'ksas-magazine' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
		else :
			the_excerpt();
		endif;
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
