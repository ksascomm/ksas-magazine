<?php
/**
 * Template Name: Table of Contents
 *
 * @package KSAS_Magazine
 */

get_header();

$volume = get_the_volume( $post );
$parent = get_queried_object_id();

/**
 * 1. THE FEATURES QUERY (Pages)
 * Features are handled differently as they are parent/child pages.
 */
$features_query = new WP_Query(
	array(
		'post_type'      => 'page',
		'volume'         => $volume,
		'post_parent'    => $parent,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
		'posts_per_page' => 20,
	)
);

/**
 * 2. THE MASTER QUERY (Posts)
 * Get all posts for this volume in one go.
 */
$all_posts_query = new WP_Query(
	array(
		'post_type'      => 'post',
		'volume'         => $volume,
		'posts_per_page' => -1, // Get all posts for the volume.
		'orderby'        => 'date',
		'order'          => 'DESC',
	)
);

// Group posts by category name for easier looping.
$categorized_posts = array();
if ( $all_posts_query->have_posts() ) {
	while ( $all_posts_query->have_posts() ) {
		$all_posts_query->the_post();
		$categories = get_the_category();
		if ( ! empty( $categories ) ) {
			// Using the first category found as the primary group.
			$cat_name                         = $categories[0]->name;
			$categorized_posts[ $cat_name ][] = clone $post;
		}
	}
	wp_reset_postdata();
}

// Define the order you want categories to appear.
$category_order = array(
	'From the Dean',
	'News',
	'Research',
	'Faculty',
	'Student Research',
	'Classroom',
	'Community',
	'Alumni',
	'On Campus',
	'Student Digest',
	'Insights',
	'Web Exclusives',
	'Web Extras',
);

// Pluck out the "From the Dean" category posts to feature separately.
$dean_category_name = 'From the Dean';
$dean_posts         = isset( $categorized_posts[ $dean_category_name ] ) ? $categorized_posts[ $dean_category_name ] : array();

// Remove from the main order list so it doesn't loop twice in the grid below.
$key = array_search( $dean_category_name, $category_order, true );

if ( false !== $key ) {
	unset( $category_order[ $key ] );
}

?>

<main id="site-content" class="mx-auto prose site-main lg:prose-lg">
	<?php if ( function_exists( 'bcn_display' ) ) : ?>
		<div class="my-4 breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
			<?php bcn_display(); ?>
		</div>
	<?php endif; ?>

	<h1 class="!my-4">Issue: <?php echo esc_html( get_the_title() ); ?></h1>

	<?php if ( $features_query->have_posts() ) : ?>
		<section class="toc-section features">
			<h2>Features</h2>
			<?php
			while ( $features_query->have_posts() ) :
				$features_query->the_post();
				?>
				<div class="grid grid-cols-1 gap-4 my-8 lg:grid-cols-5 story">
					<div class="lg:col-span-2">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'related-posts', array( 'class' => 'rounded shadow' ) ); ?></a>
					</div>
					<div class="lg:col-span-3">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<?php if ( function_exists( 'get_field' ) && get_field( 'ecpt_tagline' ) ) : ?> 
							<p><?php echo esc_html( get_field( 'ecpt_tagline' ) ); ?></p>
						<?php else : ?>
							<div class="excerpt"><?php the_excerpt(); ?></div>
						<?php endif; ?>
					</div>
				</div>
				<?php
			endwhile;
			wp_reset_postdata();
			?>
		</section>
		<hr class="my-12">
	<?php endif; ?>

	<?php if ( ! empty( $dean_posts ) ) : ?>
	<section class="toc-section dean-feature">
		<h2>From the Dean</h2>
		<?php
		foreach ( $dean_posts as $dean_post ) :
			global $post;
			$post = $dean_post; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
			setup_postdata( $post );
			?>
			<div class="grid grid-cols-1 gap-4 my-8 lg:grid-cols-5 story">
				<div class="lg:col-span-2">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'related-posts', array( 'class' => 'rounded shadow' ) ); ?>
					</a>
				</div>
				<div class="lg:col-span-3">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<div class="excerpt"><?php the_excerpt(); ?></div>
				</div>
			</div>
			<?php
		endforeach;
		wp_reset_postdata();
		?>
	</section>
	<hr class="my-12">
	<?php endif; ?>
	
	<?php
	foreach ( $category_order as $target_cat ) :
		if ( isset( $categorized_posts[ $target_cat ] ) ) :
			?>
			<section class="toc home toc-section <?php echo esc_attr( sanitize_title( $target_cat ) ); ?>">
				<h2><?php echo esc_html( $target_cat ); ?></h2>
				<div class="grid grid-cols-2 gap-8 lg:grid-cols-3">
					<?php
					foreach ( $categorized_posts[ $target_cat ] as $cat_post ) :
						global $post;
						$post = $cat_post; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
						setup_postdata( $post );
						get_template_part( 'template-parts/content', 'front-post-excerpt' );
					endforeach;
					wp_reset_postdata();
					?>
				</div>
			</section>
			<hr class="my-12">
			<?php
		endif;
	endforeach;
	?>
</main>

<?php get_footer(); ?>