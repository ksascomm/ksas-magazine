<?php
/**
 * Template part for displaying page content in front-blog.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Magazine
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class( 'article-excerpt blog-excerpt prose sm:prose lg:prose-lg xl:prose-xl mx-auto mb-4' ); ?> aria-label="<?php the_title(); ?>">
	<?php if ( has_post_thumbnail( $post->ID ) ) : ?>
		<div class="h-60">
			<?php the_post_thumbnail( 'related-posts', array( 'class' => 'h-60 w-full object-cover object-top' ) ); ?>
		</div>
	<?php endif; ?>
	<header class="entry-header px-4 pt-4">
		<?php the_title( '<h3 class="entry-title !my-0"><a class="front-post" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
	</header><!-- .entry-header -->
	<div class="entry-content px-4 leading-normal text-lg">
	<?php if ( function_exists( 'get_field' ) && get_field( 'ecpt_tagline' ) ) : ?>
		<p><?php the_field( 'ecpt_tagline' ); ?></p>
	<?php else : ?>
		<?php
			$content         = get_the_excerpt();
			$trimmed_content = wp_trim_words( $content, 15, '...' );
			?>
		<p class="leading-snug"><?php echo esc_html( $trimmed_content ); ?></p>
	<?php endif; ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
