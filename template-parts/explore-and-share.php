<?php
/**
 * Template part for explore topics and social bar
 *
 * @package ASMagazine
 * @since ASMagazine 1.0.0
 */

$tag_list = get_the_tag_list( '<span class="tags">', ', ', '</span>' );

if ( $tag_list ) : ?>
	<div class="relative flex justify-between p-4 mb-4 bg-white border border-solid tags-share border-grey">
		<div>
			<span class="!text-xl capitalize font-sans">
				<?php esc_html_e( 'Explore Related Topics:', 'asmagazine' ); ?>
				<?php echo wp_kses_post( $tag_list ); ?>
			</span>
		</div>
	</div>
<?php endif; ?>