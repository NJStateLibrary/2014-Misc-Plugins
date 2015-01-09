<?php
/*
Plugin Name: NJSL Rewrite rules and URLS fixes
Plugin URI: http://www.njstatelib.org
Description: Remove 'category' from category paths
Version: 1.1
Author: David Dean for NJSL
Author URI: http://www.njstatelib.org
*/

add_filter( 'category_link', array( 'NJSL_Rewrite_Rules', 'fixup_category_link' ), 10, 2 );
register_activation_hook( __FILE__, 'flush_rewrite_rules' );

class NJSL_Rewrite_Rules {
	
	public static function fixup_category_link( $link, $ID ) {
		return preg_replace( '|/category/|', '/', $link );
	}

}

?>