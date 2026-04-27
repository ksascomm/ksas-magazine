<?php
/**
 * Template part for explore topics and social bar
 *
 * @package ASMagazine
 * @since ASMagazine 1.0.0
 */

?>
<?php if ( get_the_tag_list() ) : ?>
<div class="relative flex justify-between p-4 mb-4 bg-white border border-solid tags-share border-grey">
	<div>
		<span class="!text-xl capitalize font-sans">Explore Related Topics:
			<?php echo get_the_tag_list( '<span class="tags">', ', ', '</span>' ); ?>
		</span>
	</div>
</div>
<?php endif; ?>
