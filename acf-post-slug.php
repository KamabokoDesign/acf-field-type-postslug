<?php

/*
Plugin Name: Advanced Custom Fields: Post Slugs
Description: Adds a "Post Slug" selector for WPSiteSync support on Post Objects
Version: 1.0.0
Author: Kamaboko Design
Author URI: https://www.kamabokodesign.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('NAMESPACE_acf_plugin_post_slug') ) :

class NAMESPACE_acf_plugin_post_slug {
	
	// vars
	var $settings;
	
	function __construct() {
		
		// settings
		// - these will be passed into the field class.
		$this->settings = array(
			'version'	=> '1.0.0',
			'url'		=> plugin_dir_url( __FILE__ ),
			'path'		=> plugin_dir_path( __FILE__ )
		);
		
		
		// include field
		add_action('acf/include_field_types', 	array($this, 'include_field')); // v5
		add_action('acf/register_fields', 		array($this, 'include_field')); // v4
	}
	
	function include_field( $version = false ) {
		
		// support empty $version
		if( !$version ) $version = 4;
		
		
		// load textdomain
		load_plugin_textdomain( 'TEXTDOMAIN', false, plugin_basename( dirname( __FILE__ ) ) . '/lang' ); 
		
		
		// include
		include_once('fields/class-NAMESPACE-acf-field-FIELD-NAME-v' . $version . '.php');
	}
	
}


// initialize
new NAMESPACE_acf_plugin_post_slug();


// class_exists check
endif;
	
?>