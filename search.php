<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Skillcrush_Starter
 * @since Skillcrush Starter 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">
	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<h1 class="page-title"><?php printf( __( 'Search Results for <span>%s</span>', 'skillcrushstarter' ), get_search_query() ); ?></h1>
		</header><!-- .page-header -->

		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
			<!-- next / prev here -->
		<?php else: ?>
			<article>
				<h4>No posts found!</h4>
			</article>
		<?php endif; ?>
</div><!-- #main-content -->

<?php
get_sidebar();

get_footer();
