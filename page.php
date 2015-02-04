<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
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
				while (have_posts()): the_post(); ?>
			<h2 class="entry-title"><?php the_title(); ?></h2>
			<?php the_post_thumbnail(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
