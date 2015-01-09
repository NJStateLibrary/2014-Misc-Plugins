<?php
/*
Plugin Name: NJSL User Roles
Plugin URI: http://www.njstatelib.org
Description: Manage roles and capabilities for NJSL users
Version: 1.1
Author: David Dean for NJSL
Author URI: http://www.njstatelib.org
*/

/**
 * Allow editors to create and manage Ninja Forms
 */
add_filter( 'ninja_forms_admin_menu_capabilities',        'njsl_allow_editors' );
add_filter( 'ninja_forms_admin_menu_capabilities',        'njsl_allow_editors' );
add_filter( 'ninja_forms_admin_add_new_capabilities',     'njsl_allow_editors' );
add_filter( 'ninja_forms_admin_submissions_capabilities', 'njsl_allow_editors' );

add_filter( 'nf_new_field_capabilities',    'njsl_allow_editors' );
add_filter( 'nf_delete_field_capabilities', 'njsl_allow_editors' );
add_filter( 'nf_delete_form_capabilities',  'njsl_allow_editors' );

function njsl_allow_editors( $cap ) {
	return 'edit_others_pages';
}

/* These are system level admin options */
//add_filter( 'ninja_forms_admin_import_export_capabilities', 'manage_options' );
//add_filter( 'ninja_forms_admin_settings_capabilities',      'manage_options' );
//add_filter( 'ninja_forms_admin_status_capabilities',        'manage_options' );
//add_filter( 'ninja_forms_admin_extend_capabilities',        'manage_options' );

?>