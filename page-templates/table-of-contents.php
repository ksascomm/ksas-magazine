<?php
/**
 * Template Name: Table of Contents
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Magazine
 */

get_header();
?>

<?php
		$volume = get_the_volume( $post );
		$parent = get_queried_object_id();
		$asmag_dean_toc_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'volume'         => $volume,
				'category__in'   => array( 72 ), // From the Dean
				'orderby'        => 'modified',
				'order'          => 'DESC',
				'posts_per_page' => 1,
			)
		);
		$asmag_news_toc_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'volume'         => $volume,
				'category__in'   => array( 1 ),
				'orderby'        => 'modified',
				'order'          => 'DESC',
				'posts_per_page' => 30,
			)
		);

		$asmag_faculty_toc_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'volume'         => $volume,
				'category__in'   => array( 345 ),
				'orderby'        => 'modified',
				'order'          => 'DESC',
				'posts_per_page' => 20,
			)
		);

		$asmag_studentresearch_toc_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'volume'         => $volume,
				'category__in'   => array( 351 ),
				'orderby'        => 'modified',
				'order'          => 'DESC',
				'posts_per_page' => 20,
			)
		);

		$asmag_classroom_toc_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'volume'         => $volume,
				'category__in'   => array( 348 ),
				'orderby'        => 'modified',
				'order'          => 'DESC',
				'posts_per_page' => 20,
			)
		);

		$asmag_community_toc_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'volume'         => $volume,
				'category__in'   => array( 349 ),
				'orderby'        => 'modified',
				'order'          => 'DESC',
				'posts_per_page' => 20,
			)
		);

		$asmag_oncampus_toc_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'volume'         => $volume,
				'category__in'   => array( 350 ),
				'orderby'        => 'modified',
				'order'          => 'DESC',
				'posts_per_page' => 20,
			)
		);

		$asmag_students_toc_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'volume'         => $volume,
				'category__in'   => array( 76 ),
				'orderby'        => 'modified',
				'order'          => 'DESC',
				'posts_per_page' => 20,
			)
		);

		$asmag_alumni_toc_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'volume'         => $volume,
				'category__in'   => array( 69 ),
				'orderby'        => 'modified',
				'order'          => 'DESC',
				'posts_per_page' => 20,
			)
		);

		$asmag_insights_toc_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'volume'         => $volume,
				'category__in'   => array( 73 ),
				'orderby'        => 'modified',
				'order'          => 'DESC',
				'posts_per_page' => 20,
			)
		);

		$asmag_research_toc_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'volume'         => $volume,
				'category__in'   => array( 75 ),
				'orderby'        => 'modified',
				'order'          => 'DESC',
				'posts_per_page' => 20,
			)
		);

		$asmag_webexclusive_toc_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'volume'         => $volume,
				'category__in'   => array( 78 ),
				'orderby'        => 'modified',
				'order'          => 'DESC',
				'posts_per_page' => 20,
			)
		);

		$asmag_webextras_toc_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'volume'         => $volume,
				'category__in'   => array( 79 ),
				'orderby'        => 'modified',
				'order'          => 'DESC',
				'posts_per_page' => 20,
			)
		);

		$asmag_features_toc_query = new WP_Query(
			array(
				'post_type'      => 'page',
				'volume'         => $volume,
				'post_parent'    => $parent,
				'orderby'        => 'menu_order',
				'order'          => 'ASC',
				'posts_per_page' => 20,
			)
		);
		?>

	<main id="site-content" class="site-main prose lg:prose-lg mx-auto">
	<?php
		if ( function_exists( 'bcn_display' ) ) :?>
		<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
			<?php bcn_display(); ?>
		</div>
		<?php endif; ?>
		<?php
		while ( have_posts() ) :
			the_post();
			endwhile; // End of the loop.
		?>
		<h1 class="!my-4">Issue: <?php the_title(); ?></h1>
		<?php if ( $asmag_features_toc_query->have_posts() ) : ?>	
				<div class="toc home features">
					<h2>Features</h2>
					<?php
					while ( $asmag_features_toc_query->have_posts() ) :
						$asmag_features_toc_query->the_post();
						?>
					<div class="grid grid-cols-1 lg:grid-cols-5 story gap-4 my-4">
						<div class="lg:col-span-2">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'related-posts' ); ?></a>
						</div>
						<div class="lg:col-span-3">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<?php if ( function_exists( 'get_field' ) && get_field( 'ecpt_tagline' ) ) : ?> 
								<p><?php the_field( 'ecpt_tagline' ); ?></p>
							<?php else : ?>
								<?php the_excerpt(); ?>
							<?php endif; ?>
						</div>
					</div>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
				</div>
				<hr>
			<?php endif; ?>
			<?php if ( $asmag_dean_toc_query->have_posts() ) : ?>	
				<div class="toc home news dean">
					<h2>From the Dean</h2>
					<?php
					while ( $asmag_dean_toc_query->have_posts() ) :
						$asmag_dean_toc_query->the_post();
						?>
					<div class="grid grid-cols-1 lg:grid-cols-5 story gap-4 my-4">
						<div class="lg:col-span-2">
							<?php the_post_thumbnail( 'related-posts' ); ?>
						</div>
						<div class="lg:col-span-3">
							<h3>
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h3>
							<?php the_excerpt(); ?>
						</div>
					</div>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
				</div>
				<hr>
			<?php endif; ?>
			<?php if ( $asmag_news_toc_query->have_posts() ) : ?>	
				<div class="toc home news">
					<h2>News</h2>
					<div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
					<?php
					while ( $asmag_news_toc_query->have_posts() ) :
						$asmag_news_toc_query->the_post();
						?>
						<?php get_template_part( 'template-parts/content', 'front-post-excerpt' ); ?>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
					</div>
				</div>
				<hr>
			<?php endif; ?>
			<?php if ( $asmag_research_toc_query->have_posts() ) : ?>	
				<div class="toc home research">
					<h2>Research</h2>
					<div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
					<?php
					while ( $asmag_research_toc_query->have_posts() ) :
						$asmag_research_toc_query->the_post();
						?>
						<?php get_template_part( 'template-parts/content', 'front-post-excerpt' ); ?>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
					</div>
				</div>
				<hr>
			<?php endif; ?>
			<?php if ( $asmag_faculty_toc_query->have_posts() ) : ?>	
				<div class="toc home faculty">
					<h2>Faculty</h2>
					<div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
					<?php
					while ( $asmag_faculty_toc_query->have_posts() ) :
						$asmag_faculty_toc_query->the_post();
						?>
						<?php get_template_part( 'template-parts/content', 'front-post-excerpt' ); ?>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
					</div>
				</div>
				<hr>
			<?php endif; ?>
			<?php if ( $asmag_studentresearch_toc_query->have_posts() ) : ?>	
				<div class="toc home studentresearch">
					<h2>Student Research</h2>
					<div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
					<?php
					while ( $asmag_studentresearch_toc_query->have_posts() ) :
						$asmag_studentresearch_toc_query->the_post();
						?>
						<?php get_template_part( 'template-parts/content', 'front-post-excerpt' ); ?>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
					</div>
				</div>
				<hr>
			<?php endif; ?>
			<?php if ( $asmag_classroom_toc_query->have_posts() ) : ?>	
				<div class="toc home classroom">
					<h2>Classroom</h2>
					<div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
					<?php
					while ( $asmag_classroom_toc_query->have_posts() ) :
						$asmag_classroom_toc_query->the_post();
						?>
						<?php get_template_part( 'template-parts/content', 'front-post-excerpt' ); ?>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
					</div>
				</div>
				<hr>
			<?php endif; ?>
			<?php if ( $asmag_community_toc_query->have_posts() ) : ?>	
				<div class="toc home community">
					<h2>Community</h2>
					<div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
					<?php
					while ( $asmag_community_toc_query->have_posts() ) :
						$asmag_community_toc_query->the_post();
						?>
						<?php get_template_part( 'template-parts/content', 'front-post-excerpt' ); ?>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
					</div>
				</div>
				<hr>
			<?php endif; ?>
			<?php if ( $asmag_alumni_toc_query->have_posts() ) : ?>	
				<div class="toc home alumni">
					<h2>Alumni</h2>
					<div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
					<?php
					while ( $asmag_alumni_toc_query->have_posts() ) :
						$asmag_alumni_toc_query->the_post();
						?>
						<?php get_template_part( 'template-parts/content', 'front-post-excerpt' ); ?>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
					</div>
				</div>
				<hr>
			<?php endif; ?>
			<?php if ( $asmag_oncampus_toc_query->have_posts() ) : ?>	
				<div class="toc home oncampus">
					<h2>On Campus</h2>
					<div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
					<?php
					while ( $asmag_oncampus_toc_query->have_posts() ) :
						$asmag_oncampus_toc_query->the_post();
						?>
						<?php get_template_part( 'template-parts/content', 'front-post-excerpt' ); ?>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
					</div>
				</div>
				<hr>
			<?php endif; ?>
			<?php if ( $asmag_students_toc_query->have_posts() ) : ?>
				<div class="toc home students">
					<h2>Student Digest</h2>
					<div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
					<?php
					while ( $asmag_students_toc_query->have_posts() ) :
						$asmag_students_toc_query->the_post();
						?>
						<?php get_template_part( 'template-parts/content', 'front-post-excerpt' ); ?>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
					</div>
				</div>
				<hr>
			<?php endif; ?>
			<?php if ( $asmag_insights_toc_query->have_posts() ) : ?>	
				<div class="toc home insights">
					<h2>Insights</h2> 
					<div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
					<?php
					while ( $asmag_insights_toc_query->have_posts() ) :
						$asmag_insights_toc_query->the_post();
						?>
						<?php get_template_part( 'template-parts/content', 'front-post-excerpt' ); ?>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
					</div>
				</div>
				<hr>
			<?php endif; ?>
			<?php if ( $asmag_webexclusive_toc_query->have_posts() ) : ?>	
				<div class="toc home webexclusives">
					<h2>Web Exclusives</h2>
					<div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
					<?php
					while ( $asmag_webexclusive_toc_query->have_posts() ) :
						$asmag_webexclusive_toc_query->the_post();
						?>
						<?php get_template_part( 'template-parts/content', 'front-post-excerpt' ); ?>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
					</div>
				</div>
				<hr>
			<?php endif; ?>
			<?php if ( $asmag_webextras_toc_query->have_posts() ) : ?>	
				<div class="toc home webextras">
					<h2>Web Extras</h2>
					<div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
					<?php
					while ( $asmag_webextras_toc_query->have_posts() ) :
						$asmag_webextras_toc_query->the_post();
						?>
						<?php get_template_part( 'template-parts/content', 'front-post-excerpt' ); ?>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
					</div>
				</div>
				<hr>
			<?php endif; ?>
	</main><!-- #main -->

<?php
get_footer();
