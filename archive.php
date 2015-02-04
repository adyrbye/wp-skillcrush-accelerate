<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Fourteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
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
			<h1 class="page-title">
				<?php
					if ( is_day() ) :
						printf( __( 'Daily Archives for <span>%s</span>', 'skillcrushstarter' ), get_the_date() );

					elseif ( is_month() ) :
						printf( __( 'Monthly Archives for <span>%s</span>', 'skillcrushstarter' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'skillcrushstarter' ) ) );

					elseif ( is_year() ) :
						printf( __( 'Yearly Archives for <span>%s</span>', 'skillcrushstarter' ), get_the_date( _x( 'Y', 'yearly archives date format', 'skillcrushstarter' ) ) );

					else :
						_e( '<span>Archives</span>', 'skillcrushstarter' );

					endif;
				?>
			</h1>
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
