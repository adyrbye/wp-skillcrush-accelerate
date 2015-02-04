<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Skillcrush_Starter
 * @since Skillcrush Starter 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		<?php get_template_part('content', 'post'); ?>
		<div id="navigation"> 
			<p><?php next_posts_link(); ?></p>
			<p><?php previous_posts_link(); ?>
		</div>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
