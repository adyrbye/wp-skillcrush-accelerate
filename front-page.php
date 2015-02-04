
<?php
/**
* The template for the homepage
*
* @package WordPress
* @subpackage Skillcrush_Starter
* @since Skillcrush Starter 1.0
*/

//Hide menu, sidebar and footer via CSS
//'View my blog' needs to be added under the_content(); link it to whatever page for now.
//At an educated guess, the background image is added via CSS latching onto section.landing-page landing-bg

get_header(); ?>
<div id="main-content" class="main-content">

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		
			<?php
				// Start the Loop.
				while (have_posts()): the_post(); ?>
				
	<!-- LANDING PAGE -->
	<section class="landing-page landing-bg">
		<div class="container">
			<div class="author-intro">

					<?php the_content(); ?>

				<div class="social-btns">
					<a href="http://twitter.com/ajdyrbye" class="soc-icon tw"><!-- <img src="http://localhost:8888/wordpress/wp-content/themes/skillcrushstarter/img/twitter-32.png" /> --!></a>
					<a href="https://plus.google.com/+AJDyrbye/" class="soc-icon gp"><!--<img src="http://localhost:8888/wordpress/wp-content/themes/skillcrushstarter/img/googleplus-32.png" /> --!></a>
					<a href="http://ca.linkedin.com/in/ajdyrbye/" class="soc-icon ln"><!--<img src="http://localhost:8888/wordpress/wp-content/themes/skillcrushstarter/img/linkedin-32.png" /> --!></a>
				</div>
				<a href="http://dyrbye.ca/blog/" class="btn">View My Blog</a>
			</div>
		</div>
	</section>
	<!-- END landing page -->
	
				<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>