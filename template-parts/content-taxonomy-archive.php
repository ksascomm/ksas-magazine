<?php
/**
 * The default template for displaying posts on a category or tax Archive Page (issue name is below the permalink)
 *
 * Used for both single and index/archive/search.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Magazine
 */

?>
<?php
$issues = get_the_terms( $post->ID, 'volume' );
if ( $issues && ! is_wp_error( $issues ) ) :
	$issue_names = array();
	foreach ( $issues as $issue ) {
		if ( $issue->term_id != 114 ) { // exclude "Feature" from echo.
			$issue_names[] = $issue->name;
		}
	}
	$issue_name = join( ' ', $issue_names );
endif;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'border-2 border-grey shadow-md' ); ?>>
	<?php if ( has_post_thumbnail( $post->ID ) ) : ?>
		<div class="h-60">
			<?php the_post_thumbnail( 'related-posts', array( 'class' => 'h-60 w-full object-cover object-top' ) ); ?>
		</div>
	<?php endif; ?>
	<header class="px-4 entry-header !my-4">
		<?php the_title( '<h1 class="!text-2xl !leading-snug !my-0"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>
		<span class="text-lg font-bold tracking-wide uppercase font-heavy">
			<?php echo esc_html( $issue_name ); ?>
	</span>
	</header><!-- .entry-header -->

	<div class="px-4 entry-content">
	<?php
	$content         = get_the_excerpt();
	$trimmed_content = wp_trim_words( $content, 15, '...' );
	?>
		<p class="!my-4 leading-snug"><?php echo esc_html( $trimmed_content ); ?></p>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
