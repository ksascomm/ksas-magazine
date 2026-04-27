<?php
/**
 * Custom Pagination for KSAS Magazine
 *
 * @package KSAS_Magazine
 * @since 1.0.0
 */

if ( ! function_exists( 'ksas_magazine_pagination' ) ) :
	/**
	 * Set up the pagination function.
	 *
	 * @param WP_Query|null $query Optional. Custom query object.
	 * @return void
	 */
	function ksas_magazine_pagination( $query = null ) {
		// Initialize the query object safely to avoid undefined variable warnings.
		$target_query = ( $query instanceof WP_Query ) ? $query : $GLOBALS['wp_query'];

		// Stop execution if we are on a single page or there's only 1 page.
		if ( is_singular() || $target_query->max_num_pages <= 1 ) {
			return;
		}

		// Use unique variable names to avoid overriding WordPress globals.
		$current_page = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
		$max          = intval( $target_query->max_num_pages );
		$links        = array();

		/** Add current page to the array */
		if ( $current_page >= 1 ) {
			$links[] = $current_page;
		}

		/** Add the pages around the current page to the array */
		if ( $current_page >= 3 ) {
			$links[] = $current_page - 1;
			$links[] = $current_page - 2;
		}

		if ( ( $current_page + 2 ) <= $max ) {
			$links[] = $current_page + 2;
			$links[] = $current_page + 1;
		}

		echo '<div class="navigation"><ul class="page-numbers">' . "\n";

		/** Previous Post Link */
		if ( get_previous_posts_link() ) {
			printf( '<li>%s</li>' . "\n", wp_kses_post( get_previous_posts_link() ) );
		}

		/** Link to first page, plus ellipses if necessary */
		if ( ! in_array( 1, $links, true ) ) {
			$class = ( 1 === $current_page ) ? ' class="active"' : '';

			printf(
				'<li%s><a href="%s">%s</a></li>' . "\n",
				wp_kses_post( $class ),
				esc_url( get_pagenum_link( 1 ) ),
				'1'
			);

			if ( ! in_array( 2, $links, true ) ) {
				echo '<li>…</li>';
			}
		}

		/** Link to current page, plus 2 pages in either direction */
		sort( $links );
		foreach ( (array) $links as $page_number ) {
			$class = ( $current_page === $page_number ) ? ' class="active"' : '';
			printf(
				'<li%s><a href="%s">%s</a></li>' . "\n",
				wp_kses_post( $class ),
				esc_url( get_pagenum_link( $page_number ) ),
				absint( $page_number )
			);
		}

		/** Link to last page, plus ellipses if necessary */
		if ( ! in_array( $max, $links, true ) ) {
			if ( ! in_array( $max - 1, $links, true ) ) {
				echo '<li>…</li>' . "\n";
			}

			$class = ( $current_page === $max ) ? ' class="active"' : '';
			printf(
				'<li%s><a href="%s">%s</a></li>' . "\n",
				wp_kses_post( $class ),
				esc_url( get_pagenum_link( $max ) ),
				absint( $max )
			);
		}

		/** Next Post Link */
		if ( get_next_posts_link() ) {
			printf( '<li>%s</li>' . "\n", wp_kses_post( get_next_posts_link() ) );
		}

		echo '</ul></div>' . "\n";
	}
endif;
