<?php $field = get_field_object( 'curated_order' );
$value       = $field['value']; ?>

<article class="curated-post large order-<?php echo $value; ?>" aria-labelledby="post-<?php the_ID(); ?>">
	<div class="card p-4">
		<div class="card-section">
			<header>
				<h1 class="!text-2xl !leading-normal">
					<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" class="curated-post-link"><?php the_title(); ?></a>
				</h1>
			</header>
			<div class="excerpt">
				<?php if ( function_exists( 'get_field' ) && get_field( 'ecpt_tagline' ) ) : ?>
				<p><?php the_field( 'ecpt_tagline' ); ?></p>
				<?php else : ?>
					<?php the_excerpt(); ?>
				<?php endif; ?>
			</div>
			<div class="post-image">
				<?php the_post_thumbnail( array( 650, 650 ) ); ?>
			</div>	
		</div>
	</div>
</article>
