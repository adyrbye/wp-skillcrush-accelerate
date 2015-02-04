<?php
/**
 * The template for displaying individual projects
 *
 * @package WordPress
 * @subpackage Skillcrush_Starter
 * @since Skillcrush Starter 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<div id="portfolio">
				<?php while ( have_posts() ) : the_post(); 
					$project_name = get_field('project_name');					
					$client = get_field('client');	
					$site_link = get_field('site_link');
					$image_1 = get_field('image_1');
				
					$size = "full";
				?>
			
				<article class="projects">
					<aside class="project-images">
						<?php 
						/* The more flexible solution, using the WordPress image attachment method, which relies on image IDs and permits more options for the images in the WP GUI */
						if ($image_1 == true) {
							echo wp_get_attachment_image( $image_1, $size );
						}
						 ?>
					</aside>
						<aside class="projects-text">
						<h4><?php echo $project_name; ?></h4>
						<h5><?php echo $client; ?></h5>
						<p class="site-link"><strong><a href="<?php echo $site_link; ?>">Site Link</a></strong></p>
						<?php the_content(); ?>
					</aside>
				</article>
			<?php endwhile; ?>
			</div><!-- #portfolio -->
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>