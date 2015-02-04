<?php
/**
 * Skillcrush Starter functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Skillcrush_Starter
 * since Skillcrush Starter 1.0
 */

// Turns on widgets & menus
if (function_exists('register_sidebar')) {
	register_sidebar();
}

// Disables admin bar on external site
// add_filter('show_admin_bar', '__return_false');

/** Creating menus **/
// Check if the menu exists
$primary_menu = wp_get_nav_menu_object('Primary Menu');

if (!$primary_menu) {
    $primary_menu_id = wp_create_nav_menu('Primary Menu');

    wp_update_nav_menu_item($primary_menu_id, 0, array(
        'menu-item-title' =>  __('Homepage'),
        'menu-item-url' => home_url( '/' ), 
        'menu-item-status' => 'publish')
	);
}

register_nav_menu('primary-menu', 'Primary Menu');

// Check if the menu exists
$blog_posts_menu = wp_get_nav_menu_object('Favorite Blog Posts');

if (!$blog_posts_menu) {
    $blog_posts_menu_id = wp_create_nav_menu('Favorite Blog Posts');
}

register_nav_menu('primary-menu', 'Primary Menu');

register_nav_menu('social-menu', 'Social Menu');

// Turns on featured images
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}

//register the category menu
register_nav_menu('category-menu', 'Category Menu');


//menu walker function. Source: http://perishablepress.com/css-dropdown-menu-wordpress/

class CSS_Menu_Walker extends Walker {

	var $db_fields = array('parent' => 'menu_item_parent', 'id' => 'db_id');
	
	function start_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul>\n";
	}
	
	function end_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}
	
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
	
		global $wp_query;
		$indent = ($depth) ? str_repeat("\t", $depth) : '';
		$class_names = $value = '';
		$classes = empty($item->classes) ? array() : (array) $item->classes;
		
		/* Add active class */
		if (in_array('current-menu-item', $classes)) {
			$classes[] = 'active';
			unset($classes['current-menu-item']);
		}
		
		/* Check for children */
		$children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
		if (!empty($children)) {
			$classes[] = 'has-sub';
		}
		
		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
		
		$id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
		$id = $id ? ' id="' . esc_attr($id) . '"' : '';
		
		$output .= $indent . '<li' . $id . $value . $class_names .'>';
		
		$attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
		$attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target    ) .'"' : '';
		$attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn       ) .'"' : '';
		$attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url       ) .'"' : '';
		
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'><span>';
		$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		$item_output .= '</span></a>';
		$item_output .= $args->after;
		
		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}
	
	function end_el(&$output, $item, $depth = 0, $args = array()) {
		$output .= "</li>\n";
	}
}


// Add custom page & post types with Advanced Custom Fields
function create_custom_post_types() {
    register_post_type( 'projects', //assigns a unique name
        array( //defines settings (many more options available)
            'labels' => array(
                'name' => __( 'Projects Portfolio' ), //human-readable name, plural
                'singular_name' => __( 'Project Portfolio' ) //human-readable name, singular
            ),
            'public' => true,
            'has_archive' => true, //ensures posts are archived
            'rewrite' => array( 'slug' => 'projects' ), //defines URL slug for archive
        )
    );
}
add_action( 'init', 'create_custom_post_types' );