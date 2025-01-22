<?php
/**
 * Template part for related posts on single.php
 *
 * @package ASMagazine
 * @since ASMagazine 1.0.0
 */

?>
<?php
$categories = get_the_category();
$thiscat    = $categories[0]->cat_ID;
$catname    = $categories[0]->name;
$catslug    = $categories[0]->slug;

$tags = wp_get_post_tags( $post->ID );
if ( $tags ) :
	?>
		<?php
			// list 4 post titles related to categorys on current post

			$first_tag           = $tags[0]->term_id;
			$first_tag_name      = $tags[0]->name;
			$related_posts_query = new WP_Query(
				array(
					'category__in'   => array( $thiscat ),
					'post__not_in'   => array( $post->ID ),
					'orderby'        => 'date',
					'order'          => 'desc',
					'posts_per_page' => 4,
				)
			);
		?>
			<?php
			if ( $related_posts_query->have_posts() ) : ?>	
<div class="related-posts-container alignfull bg-grey-cool bg-opacity-50">
	<div class="container mx-auto">
	<h2 class="py-4 text-3xl">Related <?php echo $catname; ?> Stories</h3>
	<div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
				<?php while ( $related_posts_query->have_posts() ) :
					$related_posts_query->the_post();
					$issues = get_the_terms( $post->ID, 'volume' );
					if ( $issues && ! is_wp_error( $issues ) ) :
						$issue_names = array();
						foreach ( $issues as $issue ) {
							$issue_names[] = $issue->name;
						}
						$issue_name = join( ' ', $issue_names );
					endif;
					?>
			<div>
				<div class="font-semi text-base tracking-wider flex justify-end uppercase">
					<span><?php echo $issue->name; ?></span>
				</div>
				<?php if ( has_post_thumbnail( $post->ID ) ) : ?>
					<div class="h-60">
						<?php the_post_thumbnail( 'related-posts', array( 'class' => 'h-60 w-full object-cover object-top' ) ); ?>
					</div>
				<?php endif; ?>
				<h3 class="font-semi text-xl tracking-wide"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php
				$content         = get_the_excerpt();
				$trimmed_content = wp_trim_words( $content, 15, '...' );
				?>
				<p class="font-sans"><?php echo esc_html( $trimmed_content ); ?></p>
			</div>
		<?php endwhile;?>
	</div>
</div>
</div>
<?php endif;
			wp_reset_postdata();
			?>
<?php endif; ?>
