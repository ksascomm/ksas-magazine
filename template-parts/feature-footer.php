<?php
/**
 * Template part for footers on features
 *
 * @package ASMagazine
 * @since ASMagazine 1.0.0
 */

?>
<?php
$volume      = get_the_volume( $post );
$volume_name = get_the_volume_name( $post );
?>
<?php
$features_footer_query = new WP_Query(
	array(
		'post_type'      => 'page',
		'tax_query'      => array(
			'relation' => 'AND',
			array(
				'taxonomy'         => 'volume',
				'terms'            => array( $volume, 'feature' ),
				'field'            => 'slug',
				'include_children' => false,
				'operator'         => 'AND',
			),
		),
		'order'          => 'ASC',
		'post__not_in'   => array( $post->ID ),
		'posts_per_page' => 5,
	)
);

if ( $features_footer_query->have_posts() ) :
	?>
<div class="related-features-container alignfull bg-grey-cool bg-opacity-50">
	<div class="container mx-auto px-4 lg:px-0">
	<h3 class="py-4">Other <?php echo $volume_name; ?> Features</h3>
	<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
		<?php
		while ( $features_footer_query->have_posts() ) :
			$features_footer_query->the_post();
			?>
		<div class="callout">
			<?php the_post_thumbnail( 'related-posts' ); ?>
			<h4 class="p-4 !my-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			<?php if ( function_exists( 'get_field' ) && get_field( 'ecpt_tagline' ) ) : ?>
				<p class="px-4 py-2 !my-0"><?php the_field( 'ecpt_tagline' ); ?></p>
			<?php else : ?>
				<p class="px-4 py-2 !my-0"><?php get_the_excerpt(); ?></p>
			<?php endif; ?>
		</div>
		<?php endwhile; ?>
	</div>
</div>
</div>
<?php endif; ?>
