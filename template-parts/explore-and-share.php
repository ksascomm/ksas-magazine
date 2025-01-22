<?php
/**
 * Template part for explore topics and social bar
 *
 * @package ASMagazine
 * @since ASMagazine 1.0.0
 */

?>

<div class="tags-share relative mb-4 p-4 border-grey border border-solid bg-white flex justify-between">
	<?php if ( get_the_tag_list() ) : ?>
	<div>
		<span class="!text-xl capitalize font-sans">Explore Related Topics:
			<?php echo get_the_tag_list( '<span class="tags">', ', ', '</span>' ); ?>
		</span>
	</div>
	<?php endif; ?>
	<div>
		<ul class="list-none !flex flex-wrap items-center justify-center" style="margin-block:0">
			<li class="font-sans !my-0 tracking-wide">Share This Story:</li>
			<li class="!my-0">
				<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>" target="_blank" aria-label="Share this on Facebook"><span class="fa-brands fa-facebook fa-2x"></span><span class="screen-reader-text">Facebook</span></a>
			</li>
			<li class="!my-0">
				<a href="https://twitter.com/intent/tweet?text=<?php echo urlencode( get_the_title() ); ?>&amp;url=<?php echo urlencode( get_permalink() ); ?>&amp;via=JHUArtsSciences" target="_blank" aria-label="Share this on Twitter"><span class="fa-brands fa-x-twitter fa-2x"></span><span class="screen-reader-text">Twitter</span></a>
			</li>
		</ul>
	</div>
</div>
