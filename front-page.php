<?php
/**
 * The template for displaying front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Magazine
 */

get_header();

// 1. Setup Issue Data.
$currentissue       = asmag_get_theme_option( 'input_example' );
$currentissue_clean = ucwords( str_replace( '-', ' ', $currentissue ) );

// 2. Cover Story Query.
$asmag_homepage_coverstory_query = new WP_Query(
	array(
		'post_type'      => 'page',
		'volume'         => $currentissue,
		'category__in'   => array( 136 ), // Cover Story!
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
		'posts_per_page' => 1,
	)
);


// 3. Curated Content Query Configuration.
$curated_content_args = array(
	'posts_per_page' => 6,
	'post_type'      => array( 'post', 'page' ),
	'meta_query'     => array(
		array(
			'key'     => 'curated_content',
			'value'   => '1',
			'compare' => '=',
		),
	),
	'meta_key'       => 'curated_order',
	'orderby'        => 'meta_value',
	'order'          => 'ASC',
);
?>
	<main id="site-content" class="prose site-main front lg:prose-lg">

	<?php
	if ( $asmag_homepage_coverstory_query->have_posts() ) :
		while ( $asmag_homepage_coverstory_query->have_posts() ) :
			$asmag_homepage_coverstory_query->the_post();
			?>
<div class="relative mb-0 alignfull featured-image-area front-featured-image-area" role="banner">
	<div class="flex-col bg-white lg:flex">
			<?php
			the_post_thumbnail(
				'full',
				array(
					'class' => 'h-56 mt-0 mb-0 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full',
					'title' => 'Feature image',
				)
			);
			?>
		<div class="w-full p-6 content lg:p-12 lg:max-w-2xl lg:absolute top-12 left-5 lg:bg-primary lg:bg-opacity-60">
			<h1 class="lg:text-white !text-[3.5rem] tracking-tight">
				<span class="block text-xl uppercase">
					<?php echo esc_html( $currentissue_clean ); ?> Cover Story:</span>
				<?php the_title(); ?>
			</h1>
				<div class="text-lg tracking-tight lg:mt-2 lg:text-white md:text-xl">
				<?php if ( function_exists( 'get_field' ) && get_field( 'ecpt_tagline' ) ) : ?> 
					<p class="leading-normal"><?php echo esc_html( get_field( 'ecpt_tagline' ) ); ?></p>
				<?php else : ?>
					<div class="leading-normal"><?php the_excerpt(); ?></div>
				<?php endif; ?>
				<p>
					<a href="<?php echo esc_url( get_permalink() ); ?>" class="inline-flex text-lg bg-blue !text-white px-3 py-2 border-none hover:bg-blue-light hover:!text-primary">
						Read This Story
					</a>
				</p>
			</div>
		</div>
	</div>
</div>
			<?php
	endwhile;
		wp_reset_postdata();
endif;
	?>
		<div class="px-2 news-section bg-grey-lightest">
		<div class="clear-both w-full h-16 leading-none "></div>
		<div class="px-4 mx-auto my-4 prose lg:prose-lg xl:prose-xl">
				<div class="flex justify-between">
					<div>
						<h2>Featured Articles</h2>
					</div>
				<?php
				if ( function_exists( 'get_field' ) && get_field( 'current_issue', 'option' ) ) :
					$current_issue_link = get_field( 'current_issue', 'option' );
					?>
					<div>
						<a class="button" href="<?php echo esc_url( $current_issue_link ); ?>">
							Explore <?php echo esc_html( $currentissue_clean ); ?> Issue&nbsp;<span class="fa-solid fa-circle-chevron-right" aria-hidden="true"></span>
						</a>
					</div>
				<?php endif; ?>
				</div>
			</div>
			<div class="pb-12 mx-auto mt-4 curated-posts-section-wrapper">
				<div class="grid grid-cols-1 gap-4 curated-posts lg:grid-cols-4 lg:gap-0">
					<?php
					$curated_content_query = new WP_Query( $curated_content_args );
					if ( $curated_content_query->have_posts() ) :
						while ( $curated_content_query->have_posts() ) :
							$curated_content_query->the_post();
							$curated_order = get_field( 'curated_order' );

							// If order is 1 or 6, use the large template part across 2 columns.
							if ( '1' === $curated_order || '6' === $curated_order ) :
								?>
							<div class="lg:col-span-2 article-teaser-<?php echo esc_attr( $curated_order ); ?>">
								<?php get_template_part( 'template-parts/content', 'curated-large' ); ?>
							</div>
							<?php else : ?>
							<div class="article-teaser-<?php echo esc_attr( $curated_order ); ?>">
								<?php get_template_part( 'template-parts/content', 'curated-small' ); ?>
							</div>
								<?php
							endif;
						endwhile;
						wp_reset_postdata();
				endif;
					?>
				</div>
			</div>
			</div>
			<div class="px-2 news-section browse-issues sm:px-0 bg-blue">
				<div class="grid grid-cols-1 gap-4 p-4 mx-auto lg:grid-cols-2">
					<div class="p-6 bg-white">
						<h2>Browse Issues</h2>
						<p>Arts & Sciences magazine highlights the scholarly expertise and global influence of Krieger School faculty, students, and alumni as they create new knowledge, conduct innovative research, and prepare tomorrow’s leaders.</p>
						<p>Explore past issues of <em>Arts & Sciences Magazine</em>, going back to 2004.</p>
						<p>
							<a href="https://magazine.krieger.jhu.edu/issues/" class="button">Explore Our Past Issues</a>
						</p>
					</div>
					<div>
					<div class="hidden grid-cols-2 gap-4 lg:grid md:grid-cols-3">
					<div>
						<img class="h-auto max-w-full rounded-lg" src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2021/11/F21_cover.jpg" alt="test">
					</div>
					<div>
						<img class="h-auto max-w-full rounded-lg" src="https://krieger2.jhu.edu/magazine/spsum07/images/C1b.jpg" alt="test">
					</div>
					<div>
						<img class="h-auto max-w-full rounded-lg" src="https://magazine.krieger.jhu.edu//wp-content/uploads/2022/11/fall22-cover-portrait.jpg" alt="test">
					</div>
					<div>
						<img class="h-auto max-w-full rounded-lg" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2018/11/sp18-archive-thm.jpg" alt="test">
					</div>
					<div>
						<img class="h-auto max-w-full rounded-lg" src="https://krieger2.jhu.edu/magazine/sp10/img/c1-small.jpg" alt="test">
					</div>
					<div>
						<img class="h-auto max-w-full rounded-lg" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2019/05/f18-cover.jpg" alt="test">
					</div>
				</div>
					</div>
				</div>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
