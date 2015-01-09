<?php
/*
Plugin Name: Drupal metadata inspector
Plugin URI: http://www.njstatelib.org
Description: Show Drupal metadata for a post
Version: 1.0
Author: David Dean for NJSL
Author URI: http://www.njstatelib.org
*/

add_action( 'add_meta_boxes', 'add_drupal_metabox' );

function add_drupal_metabox() {

	$types = array(
		'post',
		'page',
		'njsl_database',
		'press-release',
		'press-link',
		'news',
		'attachment',
	);

	foreach( $types as $type ) {
		
		add_meta_box(
			'drupal-node-data',
			__( 'Drupal Metadata', 'njsl-2014' ),
			'show_drupal_metadata',
			$type
		);
	}

}

function show_drupal_metadata( $post ) {

	global $wpdb;
	
	$value = get_post_meta( $post->ID, '_my_meta_value_key', true );
	
	$r = $wpdb->get_results( $wpdb->prepare( "
		SELECT p.ID, pm.meta_key, pm.meta_value FROM {$wpdb->postmeta} pm
		LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
		WHERE pm.post_id = %d
		AND pm.meta_key LIKE '%s'
		", $post->ID, '_drupal%' )
	);
	
	$metas = array();
	
	foreach ( $r as $my_r ) {
		
		if( array_key_exists( $my_r->meta_key, $metas ) ) {
			
			if( ! is_array( $metas[$my_r->meta_key] ) ) {
				
				$metas[$my_r->meta_key] = array(
					$metas[$my_r->meta_key]
				);
				
			}
			
			$metas[$my_r->meta_key][] = $my_r->meta_value;
			
		} else {
			
			$metas[$my_r->meta_key] = $my_r->meta_value;
			
		}
	}
	
	if( empty( $metas ) ) {
		echo '<p>No Drupal metadata was found.</p>';
		return;
	}

	echo '<ul>';

	foreach( $metas as $key => $meta ) {
		echo '<li><label>' . $key . '</label>: <code>' . maybe_serialize( $meta ) . '</code></li>';
	}

	echo '</ul>';
	
}

?>