				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-wrap">
						<header class="entry-header">
							<div class="date"><p id="entry_date"><?php the_date(); ?></p></div>
							<h2 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
		<?php the_post_thumbnail(); ?>
						</header>
						<?php the_content(); ?>
						
						<footer class="entry-footer">
							<div class="entry-meta">
								<p class="footer_info_posts">
									<span class="entry-terms author">Written by <?php the_author_posts_link(); ?> |</span>
									<span class="entry-terms category"> Posted in 
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
			?> | </span>
									<span class="entry-terms comments"><?php comments_number(); ?></p></span>
								</p>
							</div>
						</footer>
					</div>
				</article>