<?php
/**
 * The template for displaying Advice Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Skillcrush_Starter
 * @since Skillcrush Starter 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">
	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title"><?php printf( __( 'Posts categorized as <span>%s</span>', 'skillcrushstarter' ), single_cat_title( '', false ) ); ?></h1>

			<?php
				// Show an optional term description.
				$term_description = term_description();
				if ( ! empty( $term_description ) ) :
					printf( '<div class="taxonomy-description">%s</div>', $term_description );
				endif;
			?>
		</header><!-- .category-header -->

		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
		
		<!-- next / prev here -->
		<div id="navigation"> 
			<p><?php next_posts_link(); ?></p>
			<p><?php previous_posts_link(); ?>
		</div>

	<?php else: ?>
		<article>
			<h4>No posts found!</h4>
		</article>
	<?php endif; ?>
</div><!-- #main-content -->

<?php
get_sidebar();

get_footer();
