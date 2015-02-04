<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<div class="date"><p id="entry_date"><?php the_date(); ?></p></div>
		<h2 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
	</header>
	<?php the_content(); ?>
	<footer>
		<p class="footer_info_posts">Written by <?php the_author_posts_link(); ?> / Posted in 
			<?php 
			
				$categories = get_the_category();
				$separator = ', ';
				$output = '';
				if($categories){
					foreach($categories as $category) {
						$output .= '<a href="'.get_category_link( $category->term_id ).'" 		title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
					}
						echo trim($output, $separator);
				}
			?>
  / <?php comments_number(); ?></p>
		<div id="leave_comment"><p><?php echo get_comments_number(); ?> <?php echo strtoupper('comments'); ?> <?php if (is_user_logged_in() && current_user_can('edit_posts')): echo '| <a href="' . get_edit_post_link() . '">Edit Post</a>'; endif; ?> <a href="<?php comments_link(); ?>">Add Comment</a></p></div>
	</footer>
</article>