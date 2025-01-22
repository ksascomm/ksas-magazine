<?php
/**
 * Template Name: Past Issues
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Magazine
 */

get_header();
?>

<main id="site-content" class="site-main prose lg:prose-lg mx-auto">

	<?php
	while ( have_posts() ) :
		the_post();
			get_template_part( 'template-parts/content', 'page' );
	endwhile; // End of the loop.
	?>
	<div class="past-issues">
		<div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/fall-2024/">
					<img class="w-full" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2024/11/ASmagazine-fall24.jpg" alt="Spring 2023 cover art"/>
					<div class="px-2 font-semi">Fall 2024<br />Volume 22, Number 1</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/spring-2024/">
					<img class="w-full" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2024/05/Spring-2024-Cover.jpg" alt="Spring 2023 cover art"/>
					<div class="px-2 font-semi">Spring 2024<br />Volume 21, Number 2</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/fall-2023/">
					<img class="w-full" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2023/10/fall-2023.jpg" alt="Spring 2023 cover art"/>
					<div class="px-2 font-semi">Fall 2023<br />Volume 21, Number 1</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/spring-2023/">
					<img class="w-full" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2023/05/sp23_cover-1-1.jpg" alt="Spring 2023 cover art"/>
					<div class="px-2 font-semi">Spring 2023<br />Volume 20, Number 2</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/fall-2022/">
					<img class="w-full" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2022/11/fall22-cover-portrait.jpg" alt="Fall 2022 cover art"/>
					<div class="px-2 font-semi">Fall 2022<br />Volume 20, Number 1</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/spring-2022/">
					<img class="w-full" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2022/05/spring-2022.jpg" alt="Spring 2022 cover art"/>
					<div class="px-2 font-semi">Spring 2022<br />Volume 19, Number 2</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/fall-2021/">
					<img class="w-full" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2021/11/F21_cover.jpg" alt="Fall 2021 cover art"/>
					<div class="px-2 font-semi">Fall 2021<br />Volume 19, Number 1</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/spring-2021/">
					<img class="w-full" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2021/05/Sp21_Cover.jpg" alt="Spring 2021 Cover"/>
					<div class="px-2 font-semi">Spring 2021<br />Volume 18, Number 2</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/fall-2020/">
					<img class="w-full" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2020/11/f20-as-mag-cover.jpg" alt="Fall 2020 Cover"/>
					<div class="px-2 font-semi">Fall 2020<br />Volume 18, Number 1</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/spring-2020/">
					<img class="w-full" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2020/05/sp20-asmag-cover.jpg" alt="Spring 2020 Cover"/>
					<div class="px-2 font-semi">Spring 2020<br />Volume 17, Number 2</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/fall-2019/">
					<img class="w-full" src="https://magazine.krieger.jhu.edu//wp-content/uploads/2019/11/f19-asmag-cover.jpg" alt="Fall 2019 Cover"/>
					<div class="px-2 font-semi">Fall 2019<br />Volume 17, Number 1</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/spring-2019-v16n2/">
					<img class="w-full" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2019/11/Sp19-ASMagCover-1.jpg" alt="Spring 2019 Cover"/>
					<div class="px-2 font-semi">Spring 2019<br />Volume 16, Number 2</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/fall-2018-v16n1/">
					<img class="w-full" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2019/05/f18-cover.jpg" alt="Fall 2018 Cover"/>
					<div class="px-2 font-semi">Fall 2018<br />Volume 16, Number 1</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/spring-2018-volume-15-number-2/">
					<img class="w-full" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2018/11/sp18-archive-thm.jpg" alt="Spring 2018 Cover"/>
					<div class="px-2 font-semi">Spring 2018<br />Volume 15, Number 2</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/v15n1/">
					<img class="w-full" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2018/05/F17-cover.jpg" alt="Fall 2017 Cover"/>
					<div class="px-2 font-semi">Fall 2017<br />Volume 15, Number 1</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/v14n2/">
					<img class="w-full" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2011/10/Sp17-cvr-thm.jpg" alt="Spring 2017 Cover"/>
					<div class="px-2 font-semi">Spring 2017<br />Volume 14, Number 2</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/fall-2016-volume-14-number-1/">
					<img class="w-full" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2011/10/fall-16-cover.png" alt="Fall 2016 Cover"/>
					<div class="px-2 font-semi">Fall 2016<br />Volume 14, Number 1</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/v13n2/">
					<img class="w-full" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2011/10/sp16.jpg" alt="Spring 2016 Cover"/>
					<div class="px-2 font-semi">Spring 2016<br />Volume 13, Number 2</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/v13n1/">
					<img class="w-full" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2011/10/as-mag-f15.jpg" alt="Fall 2015 Cover"/>
					<div class="px-2 font-semi">Fall 2015<br />Volume 13, Number 1</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/v12n2/">
					<img class="w-full" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2011/10/sp15-ASMag-cover.jpg" alt="Spring 2015 Cover"/>
					<div class="px-2 font-semi">Spring 2015<br />Volume 12, Number 2</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/v12n1/">
					<img class="w-full" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2011/10/f14-ASMag-cover.jpg" alt="Fall 2014 Cover"/>
					<div class="px-2 font-semi">Fall 2014<br />Volume 12, Number 1</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/v11n2/">
					<img class="w-full" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2011/10/sp14ASMag-cover.jpg"alt="Spring 2014 Cover"/>
					<div class="px-2 font-semi">Spring 2014<br />Volume 11, Number 2</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/v11n1/">
					<img class="w-full" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2011/10/Screen-Shot-2013-11-08-at-8.49.50-AM.png" alt="Fall 2013 Cover"/>
					<div class="px-2 font-semi">Fall 2013<br />Volume 11, Number 1</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/v10n2">
					<img class="w-full" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2011/10/Screen-Shot-2013-11-08-at-8.47.19-AM.png" alt="Spring 2013 Cover"/>
					<div class="px-2 font-semi">Spring 2013<br />Volume 10, Number 2</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/v10n1/">
					<img class="w-full" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2011/10/Screen-Shot-2013-11-08-at-8.46.46-AM.png" alt="Fall 2012 Cover"/>
					<div class="px-2 font-semi">Fall 2012<br />Volume 10, Number 1</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/v9n2/">
					<img class="w-full" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2011/10/Screen-Shot-2013-11-08-at-11.43.38-AM.png" alt="Spring 2012 Cover"/>
					<div class="px-2 font-semi">Spring 2012<br />Volume 9, Number 2</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/v9n1/">
					<img class="w-full" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2011/10/Screen-shot-2012-05-11-at-10.07.11-AM.png" alt="Fall 2011 Cover"/>
					<div class="px-2 font-semi">Fall 2011<br />Volume 9, Number 1</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://magazine.krieger.jhu.edu/v8n2/">
					<img class="w-full" src="https://magazine.krieger.jhu.edu/wp-content/uploads/2011/10/v8n2_cover.jpg" alt="Spring 2011 Cover"/>
					<div class="px-2 font-semi">Spring 2011<br />Volume 8, Number 2</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://krieger2.jhu.edu/magazine/f10/index.html">
					<img class="w-full" src="https://krieger2.jhu.edu/magazine/f10/img/c1-small.jpg" alt="Fall 2010 Cover"/>
					<div class="px-2 font-semi">Fall 2010<br />Volume 8, Number 1</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://krieger2.jhu.edu/magazine/sp10/index.html">
					<img class="w-full" src="https://krieger2.jhu.edu/magazine/sp10/img/c1-small.jpg" alt="Spring 2010 Cover"/>
					<div class="px-2 font-semi">Spring 2010<br />Volume 7, Number 2</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://krieger2.jhu.edu/magazine/f09/index.html">
					<img class="w-full" src="https://krieger2.jhu.edu/magazine/f09/img/cover.jpg" alt="Fall 2009 Cover"/>
					<div class="px-2 font-semi">Fall 2009<br />Volume 7, Number 1</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://krieger2.jhu.edu/magazine/sp09/index.html">
					<img class="w-full" src="https://krieger2.jhu.edu/magazine/sp09/img/cover.jpg" alt="Spring 2009 Cover"/>
					<div class="px-2 font-semi">Spring 2009<br />Volume 6, Number 2</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://krieger2.jhu.edu/magazine/f08/index.html">
					<img class="w-full" src="https://krieger2.jhu.edu/magazine/f08/images/cover-large.jpg" alt="Fall 2008 Cover"/>
					<div class="px-2 font-semi">Fall 2008<br />Volume 6, Number 1</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://krieger2.jhu.edu/magazine/sp08/index.html">
					<img class="w-full" src="https://krieger2.jhu.edu/magazine/sp08/images/cov-lg.jpg" alt="Spring 2008 Cover"/>
					<div class="px-2 font-semi">Spring 2008<br />Volume 5, Number 2</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://krieger2.jhu.edu/magazine/fw07/index.html">
					<img class="w-full" src="https://krieger2.jhu.edu/magazine/fw07/images/A&amp;S_cov1.jpg" alt="Fall/Winter 2007 Cover"/>
					<div class="px-2 font-semi">Fall/Winter 2007<br />Volume 5, Number 1</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://krieger2.jhu.edu/magazine/spsum07/index.html">
					<img class="w-full" src="https://krieger2.jhu.edu/magazine/spsum07/images/C1b.jpg" alt="Spring/Summer 2007 Cover"/>
					<div class="px-2 font-semi">Spring/Summer 2007<br />Volume 4, Number 2</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://krieger2.jhu.edu/magazine/fw06/index.html">
					<img class="w-full" src="https://krieger2.jhu.edu/magazine/fw06/images/cov_lg.jpg" alt="Fall/Winter 2006 Cover"/>
					<div class="px-2 font-semi">Fall/Winter 2006<br />Volume 1, Number 4</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://krieger2.jhu.edu/magazine/spsum06/index.html">
					<img class="w-full" src="https://krieger2.jhu.edu/magazine/spsum06/images/cov1.jpg" alt="Spring/Summer 2006 Cover"/>
					<div class="px-2 font-semi">Spring/Summer 2006</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://krieger2.jhu.edu/magazine/F05/index.htm">
					<img class="w-full" src="https://krieger2.jhu.edu/magazine/F05/images/F05_cov1.jpg" alt="Fall 2005 Cover"/>
					<div class="px-2 font-semi">Fall 2005</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://krieger2.jhu.edu/magazine/spsum05/index.htm">
					<img class="w-full" src="https://krieger2.jhu.edu/magazine/spsum05/images/cov1small.jpg" alt="Spring/Summer 2005 Cover"/>
					<div class="px-2 font-semi">Spring/Summer 2005</div>
				</a>
			</div>
			<div class="border-2 border-grey shadow-md">
				<a href="https://krieger2.jhu.edu/magazine/f04/index.html">
					<img class="w-full" src="https://krieger2.jhu.edu/magazine/f04/images/cover_fall04.png" alt="Fall 2004 Cover"/>
					<div class="px-2 font-semi">Fall 2004</div>
				</a>
			</div>
		</div>
	</div>
</main><!-- #main -->

<?php
get_footer();
