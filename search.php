<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package KSAS_Magazine
 */

get_header();
?>

	<main id="site-content" class="site-main prose lg:prose-lg mx-auto">

			<header class="page-header prose px-12 py-6">
				<h1 class="entry-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'ksas-magazine' ), '<span>"' . get_search_query() . '"</span>' );
					?>
				</h1>
			</header><!-- .page-header -->
			<div class="not-prose">
			<gcse:search></gcse:search>
			</div>
	</main><!-- #main -->

<?php
get_footer();
