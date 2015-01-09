<?php
/*
Plugin Name: NJSL Rename "Posts" type
Plugin URI: http://www.njstatelib.org
Description: Rename "posts" to "blog posts" for improved UX
Version: 1.1
Author: David Dean for NJSL
Author URI: http://www.njstatelib.org
*/

add_action( 'admin_menu', 'njsl_change_post_menu' );
add_action( 'init', 'njsl_change_post_labels' );

function njsl_change_post_menu() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'Blog Posts';
	$submenu['edit.php'][5][0]  = __( 'Blog Posts',    'njsl-2014' );
	$submenu['edit.php'][10][0] = __( 'Add Blog Post', 'njsl-2014' );
	$submenu['edit.php'][16][0] = __( 'Blog Tags',     'njsl-2014' );
	echo '';
}
function njsl_change_post_labels() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name               = __( 'Blog Posts',           'njsl-2014' );
	$labels->singular_name      = __( 'Blog Post',            'njsl-2014' );
	$labels->add_new            = __( 'Add Blog Post',        'njsl-2014' );
	$labels->add_new_item       = __( 'Add Blog Post',        'njsl-2014' );
	$labels->edit_item          = __( 'Edit Blog Post',       'njsl-2014' );
	$labels->new_item           = __( 'Blog Post',            'njsl-2014' );
	$labels->view_item          = __( 'View Blog Post',       'njsl-2014' );
	$labels->search_items       = __( 'Search Blog Posts',    'njsl-2014' );
	$labels->not_found          = __( 'No blog posts found',  'njsl-2014' );
	$labels->not_found_in_trash = __( 'No blog posts found in Trash', 'njsl-2014' );
	$labels->all_items          = __( 'All Blog Posts',       'njsl-2014' );
	$labels->menu_name          = __( 'Blog Posts',           'njsl-2014' );
	$labels->name_admin_bar     = __( 'Blog Posts',           'njsl-2014' );
}


?>