<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Skillcrush_Starter
 * @since Skillcrush Starter 1.0
 */
?>
<div id="secondary">
	<?php if (is_active_sidebar('sidebar-1')): ?>
		<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
			<?php dynamic_sidebar('sidebar-1'); ?>
			
<!-- Custom menu for displaying top posts from a specified category.
			<div id="sidebar-module-1">
				<h2 class=widgettitle>Featured Posts</h2>
				<ol>

		</div>
				<?php query_posts( 'category_name=noodling&orderby=post_date&posts_per_page=6' ); 
					$counter = 1;
					if (have_posts()): the_post(); ?>
				<?php	while (have_posts()): the_post(); ?>
					<li class="page_item">
						<?php echo $counter; $counter++; ?>. <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</li>
						<?php endwhile;	?>
					<?php endif; ?>	-->
				</ol>
			</div>
			
			<!-- Custom widget for adding social media links.
			<div class="custom-widget">
				<h2 class="widgettitle">Social Media</h2>
				<?php wp_nav_menu(array('theme_location' => 'social-menu')); ?>
			</div> -->
			
			<!-- Custom widget for displaying all category names.
			<div class="custom-widget">
				<h2 class="widgettitle">Category Menu</h2>
				<?php wp_nav_menu(array('theme_location' => 'category-menu')); ?>
			</div> -->
		</div><!-- #primary-sidebar -->
	<?php endif; ?>
</div><!-- #secondary -->