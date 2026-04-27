<?php
/**
 * Search form
 *
 * @package KSAS_Magazine
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$twentytwenty_unique_id = twentytwenty_unique_id( 'search-form-' );

$twentytwenty_aria_label = ! empty( $args['label'] ) ? 'aria-label="' . esc_attr( $args['label'] ) . '"' : '';
?>
<form role="search" <?php echo $twentytwenty_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> method="GET" class="search-form" action="<?php echo esc_url( home_url( '/search' ) ); ?>">
	<label for="search-box">
		<span class="sr-only"><?php _e( 'Search for:', 'ksas-magazine-tailwind' ); // phpcs:ignore: WordPress.Security.EscapeOutput.UnsafePrintingFunction -- core trusts translations ?></span>
		<input type="text" id="mobile-search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search this site &hellip;', 'placeholder', 'ksas-magazine-tailwind' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<input type="submit" class="p-2 text-white border-2 search-submit bg-blue hover:bg-blue-light hover:text-primary" value="<?php echo esc_attr_x( 'Search', 'submit button', 'ksas-magazine-tailwind' ); ?>" />
</form>
