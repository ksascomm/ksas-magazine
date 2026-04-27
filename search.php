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

	<main id="site-content" class="mx-auto prose site-main lg:prose-lg">

			<header class="px-12 py-6 prose page-header">
				<h1 class="entry-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'ksas-magazine-tailwind' ), '<span>"' . get_search_query() . '"</span>' );
					?>
				</h1>
			</header><!-- .page-header -->
			<div class="not-prose">
				<gcse:search></gcse:search>
			</div>
	</main><!-- #main -->

<?php
get_footer();
