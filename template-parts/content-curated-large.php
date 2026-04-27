<?php
/**
 * Template part for displaying curated posts
 *
 * @package KSAS_Magazine
 */

$curated_field = get_field_object( 'curated_order' );
$curated_order = ( $curated_field ) ? $curated_field['value'] : 'default';
?>

<article <?php post_class( 'curated-post large order-' . esc_attr( $curated_order ) ); ?> aria-labelledby="post-<?php the_ID(); ?>">
	<div class="p-4 card">
		<div class="card-section">
			<header>
				<h2 class="!text-2xl !leading-normal tracking-tighter" id="post-<?php the_ID(); ?>">
					<a href="<?php the_permalink(); ?>" class="curated-post-link">
						<?php the_title(); ?>
					</a>
				</h2>
			</header>

			<div class="my-4 excerpt">
				<?php
				$tagline = get_field( 'ecpt_tagline' );
				if ( $tagline ) :
					echo esc_html( $tagline );
				else :
					the_excerpt();
				endif;
				?>
			</div>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="mt-4 post-image">
					<?php the_post_thumbnail( 'large', array( 'class' => 'rounded-sm shadow-sm w-full h-auto' ) ); ?>
				</div>  
			<?php endif; ?>
		</div>
	</div>
</article>