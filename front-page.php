<?php
/**
 * The template for displaying front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Magazine
 */

get_header();
?>

<?php
$currentissue = asmag_get_theme_option( 'input_example' );

$volume                                    = get_the_volume( $post );
$parent                                    = get_queried_object_id();
	$asmag_homepage_coverstory_query       = new WP_Query(
		array(
			'post_type'      => 'page',
			'volume'         => $currentissue,
			// 'post_parent' => $parent,
			// category must be 'Cover Story!'
			'category__in'   => array( 136 ),
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
			'posts_per_page' => 1,
		)
	);
	$asmag_homepage_highlighted_news_query = new WP_Query(
		array(
			'post_type'      => 'post',
			'volume'         => $currentissue,
			'category__in'   => array( 72 ), // From the Dean
			'orderby'        => 'modified',
			'order'          => 'DESC',
			'posts_per_page' => 1,
		)
	);
	$curated_content                       = ( array(
		'posts_per_page' => 6,
		'post_type'      => array( 'post', 'page' ),
		// 'volume' => $currentissue,
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
	) );

	$asmag_homepage_news_query = new WP_Query(
		array(
			'post_type'      => 'post',
			'volume'         => $currentissue,
			// 'category__in'   => array( 1, 72 ), //News + From the Dean
			'tag__not_in'    => array( 100, 141 ), // ?100? + Feature Story
			'orderby'        => 'modified',
			'order'          => 'ASC',
			'posts_per_page' => '100',
			'meta_query'     => array(
				array(
					'key'     => 'curated_content',
					'value'   => '1',
					'compare' => '!=',
				),
			),
		)
	);
	?>
	<main id="site-content" class="site-main front prose lg:prose-lg">

	<?php
	if ( $asmag_homepage_coverstory_query->have_posts() ) :
		while ( $asmag_homepage_coverstory_query->have_posts() ) :
			$asmag_homepage_coverstory_query->the_post();
			?>
<div class="alignfull featured-image-area front-featured-image-area relative mb-0" role="banner">
	<div class="flex-col lg:flex bg-white">
			<?php
			the_post_thumbnail(
				'full',
				array(
					'class' => 'h-56 mt-0 mb-0 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full',
					'title' => 'Feature image',
				)
			);
			?>
		<div class="content p-6 lg:p-12 lg:max-w-2xl w-full lg:absolute top-12 left-5 lg:bg-primary lg:bg-opacity-60">
			<h1 class="lg:text-white font-gothicmedium !text-[64px]">
				<span class="text-xl block uppercase tracking-wide">Cover Story:</span>
				<?php the_title(); ?>
			</h1>
				<div class="lg:mt-2 lg:text-white text-lg md:text-xl tracking-tight">
					<p class="leading-normal">
					<?php if ( function_exists( 'get_field' ) && get_field( 'ecpt_tagline' ) ) : ?> 
						<?php the_field( 'ecpt_tagline' ); ?>
					<?php else : ?>
						<?php the_excerpt(); ?>
					<?php endif; ?>
					<p><a href="<?php the_permalink(); ?>" class="inline-flex text-lg bg-blue !text-white px-3 py-2 border-none hover:bg-blue-light hover:!text-primary hover:!border-none">Read This Story</a></p>
					</p>
				</div>
		</div>
	</div>
</div>
			<?php
	endwhile;
endif;
	?>
		<div class="news-section px-2 bg-grey-lightest">
		<div class="w-full h-16 clear-both leading-none "></div>
		<div class="prose lg:prose-lg xl:prose-xl mx-auto my-4 px-4">
				<div class="flex justify-between">
					<div>
						<h2>Featured Articles</h2>
					</div>
					<?php
					if ( get_field( 'current_issue', 'option' ) ) :
						$current_issue_link = get_field( 'current_issue', 'option' );
						?>
						<div>
							<a class="button" href="<?php echo esc_url( $current_issue_link ); ?>">Explore This Issue&nbsp;<span class="fa-solid fa-circle-chevron-right" aria-hidden="true"></span></a>
						</div>
							<?php

				endif;
					?>
				</div>
			</div>
			<div class="curated-posts-section-wrapper mx-auto my-4">
				<div class="curated-posts grid grid-cols-1 lg:grid-cols-4 gap-4 lg:gap-0">
					<?php
					$curated_content_query = new WP_Query( $curated_content );
					// $count = 0;
					if ( $curated_content_query->have_posts() ) :
						?>
							<?php
							while ( $curated_content_query->have_posts() ) :
								$curated_content_query->the_post();
								// $count++;
								// if ($count == 1 || $count == 6) :
								$field = get_field_object( 'curated_order' );
								$value = $field['value'];
								if ( function_exists( 'get_field' ) && ( get_field( 'curated_order' ) == '1' || get_field( 'curated_order' ) == '6' ) ) :
									?>
								<div class="lg:col-span-2 article-teaser-<?php echo $value; ?>">
										<?php get_template_part( 'template-parts/content', 'curated-large' ); ?>
								</div>
								<?php else : ?>
								<div class="article-teaser-<?php echo $value; ?>">
									<?php get_template_part( 'template-parts/content', 'curated-small' ); ?>
								</div>
									<?php
								endif;
							endwhile;
							?>
				</div>
						<?php
						wp_reset_postdata();
				endif;
					?>
			</div>
			</div>
			<div class="news-section browse-issues px-2 sm:px-0 bg-blue">
				<div class="grid grid-cols-1 lg:grid-cols-2 gap-4 p-4 mx-auto">
					<div class="bg-white p-6">
						<h2>Browse Issues</h2>
						<p>Arts & Sciences magazine highlights the scholarly expertise and global influence of Krieger School faculty, students, and alumni as they create new knowledge, conduct innovative research, and prepare tomorrow’s leaders.</p>
						<p>Explore past issues of <em>Arts & Sciences Magazine</em>, going back to 2004.</p>
						<p>
							<a href="https://magazine.krieger.jhu.edu/issues/" class="button">Explore Our Past Issues</a>
						</p>
					</div>
					<div>
					<div class="hidden lg:grid grid-cols-2 md:grid-cols-3 gap-4">
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
