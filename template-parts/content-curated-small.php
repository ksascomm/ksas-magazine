<?php
/**
 * Template part for displaying small curated posts
 *
 * @package KSAS_Magazine
 */

$curated_field = get_field_object( 'curated_order' );
$curated_order = ( $curated_field && isset( $curated_field['value'] ) ) ? $curated_field['value'] : 'default';
?>

<article <?php post_class( 'curated-post small order-' . esc_attr( $curated_order ) ); ?> aria-labelledby="post-<?php the_ID(); ?>">
	<div class="h-full p-4 border-t-4 card card-box border-primary">
		<div class="card-section">
			<header>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="relative mb-5 post-image">
					<a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true" class="block w-full h-full no-underline curated-post-link">
						<?php
						the_post_thumbnail(
							array( 327, 184 ),
							array(
								'class' => 'rounded-xs shadow-xs w-full h-full object-cover bg-white',
							)
						);
						?>
					</a>
				</div>
			<?php endif; ?>

				<h2 class="!text-xl !leading-tight tracking-tight font-bold" id="post-<?php the_ID(); ?>">
					<a href="<?php the_permalink(); ?>" class="curated-post-link">
						<?php the_title(); ?>
					</a>
				</h2>   
			</header>

			<div class="mt-3 text-sm leading-relaxed excerpt">
				<?php
				$tagline = get_field( 'ecpt_tagline' );
				if ( $tagline ) :
					echo esc_html( $tagline );
				else :
					// Using get_the_excerpt to allow for cleaner escaping.
					echo esc_html( wp_trim_words( get_the_excerpt(), 25 ) );
				endif;
				?>
			</div>
		</div>
	</div>
</article>