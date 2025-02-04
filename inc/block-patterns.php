<?php
/**
 * Block Patterns
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_pattern/
 * @link https://developer.wordpress.org/reference/functions/register_block_pattern_category/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.5
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'ksas-magazine',
		array( 'label' => esc_html__( 'KSAS Magazine', 'ksas-magazine' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	// Simple Hero Section
	register_block_pattern(
		'ksasmagazine/simple-hero',
		array(
			'title'         => esc_html__( 'Simple Hero', 'ksas-magazine' ),
			'categories'    => array( 'ksas-magazine' ),
			'viewportWidth' => 1400,
			'content'       => '
			<!-- wp:columns {"verticalAlignment":"center"} -->
			<div class="wp-block-columns are-vertically-aligned-center px-2"><!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"className":"mt-0"} -->
			<h2 class="mt-0">Study Living Systems from Unique Perspectives</h2>
			<!-- /wp:heading -->
			
			<!-- wp:paragraph -->
			<p>The&nbsp;Thomas C. Jenkins Department of Biophysics&nbsp;has a long tradition of excellence in research and teaching and of developing leaders in the scientific community.</p>
			<!-- /wp:paragraph -->
			
			<!-- wp:button {"backgroundColor":"heritage-blue","style":{"border":{"radius":2}}} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-heritage-blue-background-color has-background" style="border-radius:2px">Get Started</a></div>
			<!-- /wp:button --></div>
			<!-- /wp:column -->
			
			<!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center"><!-- wp:cover {"url":"http://sites.krieger.jhu.edu/wp-content/themes/ksas-magazine/resources/images/campus3.jpg","id":1869,"dimRatio":0,"minHeight":500,"style":{"color":{}}} -->
			<div class="wp-block-cover" style="min-height:500px"><img class="wp-block-cover__image-background wp-image-1869" alt="" src="http://sites.krieger.jhu.edu/wp-content/themes/ksas-magazine/resources/images/campus3.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"></div></div>
			<!-- /wp:cover --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->',
		)
	);
	// Staff Listing Vertical.
	register_block_pattern(
		'ksasmagazine/staff-listing',
		array(
			'title'         => esc_html__( 'Staff Listing Vertical', 'ksas-magazine' ),
			'categories'    => array( 'ksas-magazine' ),
			'viewportWidth' => 1400,
			'content'       => '
			<!-- wp:group {"className":"staff-listing"} --><div class="wp-block-group staff-listing"><div class="wp-block-group__inner-container"><!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column {"width":"33.33%"} -->
			<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:image {"sizeSlug":"medium","linkDestination":"none"} -->
			<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/resources/images/johns_hopkins.jpg" alt="' . esc_attr__( 'Abstract Rectangles', 'ksas-magazine' ) . '"/></figure>
			<!-- /wp:image --></div>
			<!-- /wp:column -->
			<!-- wp:column {"width":"66.66%"} -->
			<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:heading -->
			<h2>Johns Hopkins</h2>
			<!-- /wp:heading -->
			<!-- wp:heading {"level":3} -->
			<h3>Founder</h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p><a href="mailto:info@jhu.edu">info@jhu.edu</a></p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></div></div>
			<!-- /wp:group -->
			<!-- wp:group {"className":"staff-listing"} -->
			<div class="wp-block-group staff-listing"><div class="wp-block-group__inner-container"><!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column {"width":"33.33%"} -->
			<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:image {"sizeSlug":"medium","linkDestination":"none"} -->
			<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/resources/images/johns_hopkins.jpg" alt="' . esc_attr__( 'Abstract Rectangles', 'ksas-magazine' ) . '"/></figure>
			<!-- /wp:image --></div>
			<!-- /wp:column -->
			<!-- wp:column {"width":"66.66%"} -->
			<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:heading -->
			<h2>Johns Hopkins</h2>
			<!-- /wp:heading -->
			<!-- wp:heading {"level":3} -->
			<h3>Founder</h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p><a href="mailto:info@jhu.edu">info@jhu.edu</a></p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></div></div><!-- /wp:group -->',
		)
	);
	// Staff Listing Horizontal.
	register_block_pattern(
		'ksasmagazine/staff-listing-horizontal',
		array(
			'title'         => esc_html__( 'Staff Listing Horizontal', 'ksas-magazine' ),
			'categories'    => array( 'ksas-magazine' ),
			'viewportWidth' => 1400,
			'content'       => '<!-- wp:columns -->
			<div class="wp-block-columns staff-listing-horizontal"><!-- wp:column -->
			<div class="wp-block-column staff-listing-heading"><!-- wp:heading -->
			<h2>Our Leadership</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->

			<!-- wp:columns -->
			<div class="wp-block-columns staff-listing-horizontal"><!-- wp:column -->
			<div class="wp-block-column"><!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column -->
			<div class="wp-block-column staff-listing-single"><!-- wp:image {"id":54,"sizeSlug":"large","linkDestination":"none"} -->
			<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/resources/images/johns_hopkins.jpg" alt="' . esc_attr__( 'Abstract Rectangles', 'ksas-magazine' ) . '"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":4} -->
			<h4>Johns Hopkins</h4>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Founder</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column staff-listing-single"><!-- wp:image {"id":54,"sizeSlug":"large","linkDestination":"none"} -->
			<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/resources/images/johns_hopkins.jpg" alt="' . esc_attr__( 'Abstract Rectangles', 'ksas-magazine' ) . '"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":4} -->
			<h4>Johns Hopkins</h4>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Founder</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column"><!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column -->
			<div class="wp-block-column staff-listing-single"><!-- wp:image {"id":54,"sizeSlug":"large","linkDestination":"none"} -->
			<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/resources/images/johns_hopkins.jpg" alt="' . esc_attr__( 'Abstract Rectangles', 'ksas-magazine' ) . '"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":4} -->
			<h4>Johns Hopkins</h4>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Founder</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column staff-listing-single"><!-- wp:image {"id":54,"sizeSlug":"large","linkDestination":"none"} -->
			<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/resources/images/johns_hopkins.jpg" alt="' . esc_attr__( 'Abstract Rectangles', 'ksas-magazine' ) . '"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":4} -->
			<h4>Johns Hopkins</h4>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Founder</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->',
		)
	);

	// Featured Content.
	register_block_pattern(
		'ksasmagazine/featured-content',
		array(
			'title'         => esc_html__( 'Featured Content', 'ksas-magazine' ),
			'categories'    => array( 'ksas-magazine' ),
			'viewportWidth' => 1400,
			'content'       => implode(
				'',
				array(
					'<!-- wp:columns {"align":"wide"} -->',
					'<div class="wp-block-columns alignwide"><!-- wp:column -->',
					'<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full"} -->',
					'<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/resources/images/campus1.jpg" alt="' . esc_attr__( 'Abstract Rectangles', 'ksas-magazine' ) . '"/></figure>',
					'<!-- /wp:image -->',
					'<!-- wp:heading -->',
					'<h2>' . esc_html__( 'Works and Days', 'ksas-magazine' ) . '</h2>',
					'<!-- /wp:heading -->',
					'<!-- wp:paragraph {"fontSize":"larger"} -->',
					'<p>' . esc_html__( 'August 1 — December 1', 'ksas-magazine' ) . '</p>',
					'<!-- /wp:paragraph -->',
					'<!-- wp:button {"align":"left","className":"is-style-fill"} -->',
					'<div class="wp-block-button alignleft is-style-fill"><a class="wp-block-button__link" href="#">' . esc_html__( 'Read More', 'ksas-magazine' ) . '</a></div>',
					'<!-- /wp:button --></div>',
					'<!-- /wp:column -->',
					'<!-- wp:column -->',
					'<div class="wp-block-column"><!-- wp:image {sizeSlug":"full"} -->',
					'<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/resources/images/campus2.jpg" alt="' . esc_attr__( 'Abstract Rectangles', 'ksas-magazine' ) . '"/></figure>',
					'<!-- /wp:image -->',
					'<!-- wp:heading -->',
					'<h2>' . esc_html__( 'The Life I Deserve', 'ksas-magazine' ) . '</h2>',
					'<!-- /wp:heading -->',
					'<!-- wp:paragraph {"fontSize":"larger"} -->',
					'<p>' . esc_html__( 'August 1 — December 1', 'ksas-magazine' ) . '</p>',
					'<!-- /wp:paragraph -->',
					'<!-- wp:button {"align":"left","className":"is-style-fill"} -->',
					'<div class="wp-block-button alignleft is-style-fill"><a class="wp-block-button__link" href="#">' . esc_html__( 'Read More', 'ksas-magazine' ) . '</a></div>',
					'<!-- /wp:button --></div>',
					'<!-- /wp:column --></div>',
					'<!-- /wp:columns -->',
				)
			),
		)
	);

	// Introduction.
	register_block_pattern(
		'ksasmagazine/introduction',
		array(
			'title'         => esc_html__( 'Introduction', 'ksas-magazine' ),
			'categories'    => array( 'ksas-magazine' ),
			'viewportWidth' => 1400,
			'content'       => implode(
				'',
				array(
					'<!-- wp:heading {"align":"center"} -->',
					'<h2 class="has-text-align-center">' . esc_html__( 'The Premier Destination for Modern Art in Sweden', 'ksas-magazine' ) . '</h2>',
					'<!-- /wp:heading -->',
					'<!-- wp:paragraph {"dropCap":true} -->',
					'<p class="has-drop-cap">' . esc_html__( 'With seven floors of striking architecture, UMoMA shows exhibitions of international contemporary art, sometimes along with art historical retrospectives. Existential, political, and philosophical issues are intrinsic to our program. As visitor, you are invited to guided tours artist talks, lectures, film screenings, and other events with free admission.', 'ksas-magazine' ) . '</p>',
					'<!-- /wp:paragraph -->',
				)
			),
		)
	);

	// Three Column Feature.
	register_block_pattern(
		'ksasmagazine/three-column-feature',
		array(
			'title'         => esc_html__( 'Thee Column Feature', 'ksas-magazine' ),
			'categories'    => array( 'ksas-magazine' ),
			'viewportWidth' => 1400,
			'content'       => '<!-- wp:columns -->
			<div class="wp-block-columns three-column-feature"><!-- wp:column {"width":"66.66%"} -->
			<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:heading -->
			<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</h2>
			<!-- /wp:heading --></div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"33.33%"} -->
			<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:paragraph -->
			<p class="has-text-align-right"><a href="#">Explore More</a></p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->

			<!-- wp:columns -->
			<div class="wp-block-columns three-column-feature"><!-- wp:column -->
			<div class="wp-block-column mb-4 px-6 py-8 overflow-hidden bg-white rounded-md shadow-md"><!-- wp:heading -->
			<h2>Explore</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing Ac aliquam ac volutpat, viverra magna risus aliquam massa.</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column mb-4 px-6 py-8 overflow-hidden bg-white rounded-md shadow-md"><!-- wp:heading -->
			<h2>Learn</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing Ac aliquam ac volutpat, viverra magna risus aliquam massa.</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column mb-4 px-6 py-8 overflow-hidden bg-white rounded-md shadow-md"><!-- wp:heading -->
			<h2>Discover</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing Ac aliquam ac volutpat, viverra magna risus aliquam massa.</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->',
		)
	);

	// Four Column Feature.
	register_block_pattern(
		'ksas-magazine/four-column-feature',
		array(
			'title'         => esc_html__( 'Four Column Features', 'ksas-magazine' ),
			'categories'    => array( 'ksas-magazine' ),
			'viewportWidth' => 1400,
			'content'       => '
			<!-- wp:group {"align":"wide","className":"four-column-feature"} -->
			<div class="wp-block-group alignwide four-column-feature"><div class="wp-block-group__inner-container"><!-- wp:columns {"className":""} -->
			<div class="wp-block-columns"><!-- wp:column {"width":"41%","className":"border-r-4 border-primary"} -->
			<div class="wp-block-column border-r-4 border-primary" style="flex-basis:41%"><!-- wp:heading {"className":""} -->
			<h2 class="">Transport is defined as a movement</h2>
			<!-- /wp:heading --></div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"59%","className":""} -->
			<div class="wp-block-column" style="flex-basis:59%"><!-- wp:paragraph {"className":""} -->
			<p class="">Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex commodo consequat aute irure.</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->

			<!-- wp:columns {"className":""} -->
			<div class="wp-block-columns"><!-- wp:column {"className":""} -->
			<div class="wp-block-column"><!-- wp:group {"className":"overflow-hidden bg-white rounded-md shadow-md"} -->
			<div class="wp-block-group overflow-hidden bg-white rounded-md shadow-md"><div class="wp-block-group__inner-container"><!-- wp:cover {"url":"https://demo.gutenberghub.com/templates/wp-content/uploads/sites/10/2020/10/lefvrkgupja-scaled.jpg","id":22929,"dimRatio":0,"minHeight":250,"className":""} -->
			<div class="wp-block-cover" style="min-height:250px"><img class="wp-block-cover__image-background wp-image-22929" alt="" src="https://demo.gutenberghub.com/templates/wp-content/uploads/sites/10/2020/10/lefvrkgupja-scaled.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","className":"","fontSize":"large"} -->
			<p class="has-text-align-center has-large-font-size"></p>
			<!-- /wp:paragraph --></div></div>
			<!-- /wp:cover -->

			<!-- wp:heading {"level":4,"className":""} -->
			<h4 class="">Train Freight</h4>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":""} -->
			<p class="">Lorem ipsum dolor sit amet consec tetur adipis cing elit sed do execeur sante monars eiusmod tempor incididunt ut labore et dolore magna.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"className":""} -->
			<div class="wp-block-buttons"><!-- wp:button {"borderRadius":0,"className":""} -->
			<div class="wp-block-button"><a class="wp-block-button__link no-border-radius">Read More</a></div>
			<!-- /wp:button --></div>
			<!-- /wp:buttons --></div></div>
			<!-- /wp:group --></div>
			<!-- /wp:column -->

			<!-- wp:column {"className":""} -->
			<div class="wp-block-column"><!-- wp:group {"className":"overflow-hidden bg-white rounded-md shadow-md"} -->
			<div class="wp-block-group overflow-hidden bg-white rounded-md shadow-md"><div class="wp-block-group__inner-container"><!-- wp:cover {"url":"https://demo.gutenberghub.com/templates/wp-content/uploads/sites/10/2020/10/9e1kncontpm-scaled.jpg","id":22928,"dimRatio":0,"minHeight":250,"className":""} -->
			<div class="wp-block-cover" style="min-height:250px"><img class="wp-block-cover__image-background wp-image-22928" alt="" src="https://demo.gutenberghub.com/templates/wp-content/uploads/sites/10/2020/10/9e1kncontpm-scaled.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","className":"","fontSize":"large"} -->
			<p class="has-text-align-center has-large-font-size"></p>
			<!-- /wp:paragraph --></div></div>
			<!-- /wp:cover -->

			<!-- wp:heading {"level":4,"className":""} -->
			<h4 class="">Plane Freight</h4>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":""} -->
			<p class="">Lorem ipsum dolor sit amet consec tetur adipis cing elit sed do execeur sante monars eiusmod tempor incididunt ut labore et dolore magna.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"className":""} -->
			<div class="wp-block-buttons"><!-- wp:button {"borderRadius":0,"className":""} -->
			<div class="wp-block-button"><a class="wp-block-button__link no-border-radius">Read More</a></div>
			<!-- /wp:button --></div>
			<!-- /wp:buttons --></div></div>
			<!-- /wp:group --></div>
			<!-- /wp:column -->

			<!-- wp:column {"className":""} -->
			<div class="wp-block-column"><!-- wp:group {"className":"overflow-hidden bg-white rounded-md shadow-md"} -->
			<div class="wp-block-group overflow-hidden bg-white rounded-md shadow-md"><div class="wp-block-group__inner-container"><!-- wp:cover {"url":"https://demo.gutenberghub.com/templates/wp-content/uploads/sites/10/2020/10/ucuoscdcao4-scaled.jpg","id":22930,"dimRatio":0,"minHeight":250,"className":""} -->
			<div class="wp-block-cover" style="min-height:250px"><img class="wp-block-cover__image-background wp-image-22930" alt="" src="https://demo.gutenberghub.com/templates/wp-content/uploads/sites/10/2020/10/ucuoscdcao4-scaled.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","className":"","fontSize":"large"} -->
			<p class="has-text-align-center has-large-font-size"></p>
			<!-- /wp:paragraph --></div></div>
			<!-- /wp:cover -->

			<!-- wp:heading {"level":4,"className":""} -->
			<h4 class="">Truck Freight</h4>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":""} -->
			<p class="">Lorem ipsum dolor sit amet consec tetur adipis cing elit sed do execeur sante monars eiusmod tempor incididunt ut labore et dolore magna.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"className":""} -->
			<div class="wp-block-buttons"><!-- wp:button {"borderRadius":0,"className":""} -->
			<div class="wp-block-button"><a class="wp-block-button__link no-border-radius">Read More</a></div>
			<!-- /wp:button --></div>
			<!-- /wp:buttons --></div></div>
			<!-- /wp:group --></div>
			<!-- /wp:column -->

			<!-- wp:column {"className":""} -->
			<div class="wp-block-column"><!-- wp:group {"className":"overflow-hidden bg-white rounded-md shadow-md"} -->
			<div class="wp-block-group overflow-hidden bg-white rounded-md shadow-md"><div class="wp-block-group__inner-container"><!-- wp:cover {"url":"https://demo.gutenberghub.com/templates/wp-content/uploads/sites/10/2020/10/g85oiagzosm-scaled.jpg","id":22927,"dimRatio":0,"minHeight":250,"className":""} -->
			<div class="wp-block-cover" style="min-height:250px"><img class="wp-block-cover__image-background wp-image-22927" alt="" src="https://demo.gutenberghub.com/templates/wp-content/uploads/sites/10/2020/10/g85oiagzosm-scaled.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","className":"","fontSize":"large"} -->
			<p class="has-text-align-center has-large-font-size"></p>
			<!-- /wp:paragraph --></div></div>
			<!-- /wp:cover -->

			<!-- wp:heading {"level":4,"className":""} -->
			<h4 class="">Shipping Freight</h4>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":""} -->
			<p class="">Lorem ipsum dolor sit amet consec tetur adipis cing elit sed do execeur sante monars eiusmod tempor incididunt ut labore et dolore magna.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"className":""} -->
			<div class="wp-block-buttons"><!-- wp:button {"borderRadius":0,"className":""} -->
			<div class="wp-block-button"><a class="wp-block-button__link no-border-radius">Read More</a></div>
			<!-- /wp:button --></div>
			<!-- /wp:buttons --></div></div>
			<!-- /wp:group --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></div></div>
			<!-- /wp:group -->',
		)
	);

	// Single Call to Action.
	register_block_pattern(
		'ksasmagazine/call-to-action',
		array(
			'title'         => esc_html__( 'Call to Action', 'ksas-magazine' ),
			'categories'    => array( 'ksas-magazine' ),
			'viewportWidth' => 1400,
			'content'       => implode(
				'',
				array(
					'<!-- wp:group {"align":"wide","style":{"color":{"background":"#bfccd9"}}} -->',
					'<div class="wp-block-group alignwide has-background" style="background-color:#bfccd9"><div class="wp-block-group__inner-container"><!-- wp:group -->',
					'<div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:heading {"align":"center"} -->',
					'<h2 class="has-text-align-center">' . esc_html__( 'Support the Museum and Get Exclusive Offers', 'ksas-magazine' ) . '</h2>',
					'<!-- /wp:heading -->',
					'<!-- wp:paragraph {"align":"center"} -->',
					'<p class="has-text-align-center">' . esc_html__( 'Members get access to exclusive exhibits and sales. Our memberships cost $99.99 and are billed annually.', 'ksas-magazine' ) . '</p>',
					'<!-- /wp:paragraph -->',
					'<!-- wp:button {"align":"center","className":"is-style-fill"} -->',
					'<div class="wp-block-button aligncenter is-style-fill"><a class="wp-block-button__link" href="#">' . esc_html__( 'Become a Member', 'ksas-magazine' ) . '</a></div>',
					'<!-- /wp:button --></div></div>',
					'<!-- /wp:group --></div></div>',
					'<!-- /wp:group -->',
				)
			),
		)
	);

	// Double Call to Action.
	register_block_pattern(
		'ksasmagazine/double-call-to-action',
		array(
			'title'         => esc_html__( 'Double Call to Action', 'ksas-magazine' ),
			'categories'    => array( 'ksas-magazine' ),
			'viewportWidth' => 1400,
			'content'       => implode(
				'',
				array(
					'<!-- wp:columns {"align":"wide"} -->',
					'<div class="wp-block-columns alignwide calls-to-action"><!-- wp:column -->',
					'<div class="wp-block-column"><!-- wp:group {"style":{"color":{"background":"#fefefe"}}} -->',
					'<div class="wp-block-group has-background left-call-to-action has-white-background-color" style="background-color:#fefefe"><div class="wp-block-group__inner-container"><!-- wp:heading {"align":"center"} -->',
					'<h2 class="has-text-align-center">' . esc_html__( 'The Museum', 'ksas-magazine' ) . '</h2>',
					'<!-- /wp:heading -->',
					'<!-- wp:paragraph {"align":"center"} -->',
					'<p class="has-text-align-center">' . esc_html__( 'Award-winning exhibitions featuring internationally-renowned artists.', 'ksas-magazine' ) . '</p>',
					'<!-- /wp:paragraph -->',
					'<!-- wp:buttons {"align":"center"} -->',
					'<div class="wp-block-buttons aligncenter"><!-- wp:button {"className":"is-style-fill"} -->',
					'<div class="wp-block-button is-style-fill"><a class="wp-block-button__link">' . esc_html__( 'Read More', 'ksas-magazine' ) . '</a></div>',
					'<!-- /wp:button --></div>',
					'<!-- /wp:buttons --></div></div>',
					'<!-- /wp:group --></div>',
					'<!-- /wp:column -->',
					'<!-- wp:column -->',
					'<div class="wp-block-column"><!-- wp:group {"style":{"color":{"background":"#fefefe"}}} -->',
					'<div class="wp-block-group has-background right-call-to-action has-white-background-color" style="background-color:#fefefe"><div class="wp-block-group__inner-container"><!-- wp:heading {"align":"center"} -->',
					'<h2 class="has-text-align-center">' . esc_html__( 'The Store', 'ksas-magazine' ) . '</h2>',
					'<!-- /wp:heading -->',
					'<!-- wp:paragraph {"align":"center"} -->',
					'<p class="has-text-align-center">' . esc_html__( 'An awe-inspiring collection of books, prints, and gifts from our exhibitions.', 'ksas-magazine' ) . '</p>',
					'<!-- /wp:paragraph -->',
					'<!-- wp:buttons {"align":"center"} -->',
					'<div class="wp-block-buttons aligncenter"><!-- wp:button {"className":"is-style-fill"} -->',
					'<div class="wp-block-button is-style-fill"><a class="wp-block-button__link">' . esc_html__( 'Shop Now', 'ksas-magazine' ) . '</a></div>',
					'<!-- /wp:button --></div>',
					'<!-- /wp:buttons --></div></div>',
					'<!-- /wp:group --></div>',
					'<!-- /wp:column --></div>',
					'<!-- /wp:columns -->',
				)
			),
		)
	);

	// Horizontal Call to Action
	register_block_pattern(
		'ksasmagazine/horizontal-cta',
		array(
			'title'         => esc_html__( 'Horizontal Call to Action', 'ksas-magazine' ),
			'categories'    => array( 'ksas-magazine' ),
			'viewportWidth' => 1400,
			'content'       => '
			<!-- wp:group {"align":"full","style":{"color":{"background":"#f8f8f8"}}} -->
			<div class="wp-block-group alignfull has-background" style="background-color:#f8f8f8"><!-- wp:columns {"align":"wide","className":"pl-12"} -->
			<div class="wp-block-columns alignwide pl-12"><!-- wp:column -->
			<div class="wp-block-column"><!-- wp:heading {"className":"mt-0"} -->
			<h2 class="mt-0">We are locally crafted food &amp; wine serving since 1980.</h2>
			<!-- /wp:heading -->
			
			<!-- wp:paragraph -->
			<p>Lorem ipsum odor amet, consectetuer adipiscing elit. Turpis finibus vulputate molestie, proin fermentum velit. Dictumst ac imperdiet quis eros a est massa varius. </p>
			<!-- /wp:paragraph -->
			
			<!-- wp:button {"backgroundColor":"heritage-blue","style":{"border":{"radius":"2px"}}} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-heritage-blue-background-color has-background" style="border-radius:2px">More About Us</a></div>
			<!-- /wp:button --></div>
			<!-- /wp:column -->
			
			<!-- wp:column -->
			<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
			<figure class="wp-block-image size-large"><img src="https://source.unsplash.com/HlNcigvUi4Q/900x900" alt="Food Image"/></figure>
			<!-- /wp:image --></div>
			<!-- /wp:column -->
			
			<!-- wp:column -->
			<div class="wp-block-column"><!-- wp:spacer {"className":"editorskit-no-mobile"} -->
			<div style="height:100px" aria-hidden="true" class="wp-block-spacer editorskit-no-mobile"></div>
			<!-- /wp:spacer -->
			
			<!-- wp:image {"sizeSlug":"large"} -->
			<figure class="wp-block-image size-large"><img src="http://source.unsplash.com/PUDQGDlM_V8/900x900" alt="Food Image"/></figure>
			<!-- /wp:image --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></div>
			<!-- /wp:group -->
			',
		)
	);
}
