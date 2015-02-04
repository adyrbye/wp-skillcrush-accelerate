<?php
/**
 * The template for displaying the Portfolio page
 *
 * @package WordPress
 * @subpackage Skillcrush_Starter
 * @since Skillcrush Starter 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
				
			<?php
				// Start the Loop.
				while (have_posts()): the_post(); 
				
				$project_name = get_field('project_name');					
				$client = get_field('client');	
				$site_link = get_field('site_link');
				$image_1 = get_field('image_1');
				
				$size = "full"; ?>
				
				
			<div id="portfolio">

				
			<?php the_post_thumbnail(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
			
			</div><!-- #portfolio -->
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>