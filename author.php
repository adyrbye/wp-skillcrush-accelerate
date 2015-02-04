<?php
/**
 * The template for displaying Author archive pages
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
			<div id="author-page">

			<?php if ( have_posts() ) : ?>

			<header class="archive-header">
				<h1 class="archive-title">
					<?php
						/*
						 * Queue the first post, that way we know what author
						 * we're dealing with (if that is the case).
						 *
						 * We reset this later so we can run the loop properly
						 * with a call to rewind_posts().
						 */
						the_post();

						printf( __( 'All posts by %s', 'skillcrushstarter' ), get_the_author() );
					?>
				</h1>
				<?php if ( get_the_author_meta( 'description' ) ) : ?>
				<div class="author-description"><?php the_author_meta( 'description' ); ?></div>
				<?php endif; ?>
			</header><!-- .archive-header -->

			<?php
					/*
					 * Since we called the_post() above, we need to rewind
					 * the loop back to the beginning that way we can run
					 * the loop properly, in full.
					 */
					rewind_posts();

					// Start the Loop.
					while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
					
				<?php	endwhile; 
					// Previous/next page navigation. ?>
			<div id="navigation"> 
				<p><?php next_posts_link(); ?></p>
				<p><?php previous_posts_link(); ?>
			</div>

				<?php else : ?>
				
			<article>
				<h4>No posts found!</h4>
			</article>
				
				<?php	// If no content, include the "No posts found" template.
					// get_template_part( 'content', 'none' );

				endif;
			?>
			</div><!-- #author-page -->
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_sidebar();

get_footer();
