<?php

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('NAMESPACE_acf_field_FIELD_NAME') ) :


class NAMESPACE_acf_field_FIELD_NAME extends acf_field {
	
	
	function __construct( $settings ) {
		$this->name = 'FIELD_NAME';
		$this->label = __('FIELD_LABEL', 'TEXTDOMAIN');
		$this->category = 'basic';
		$this->defaults = array(
			'post_type'	=> array(),
		);
		$this->settings = $settings;
		
		// do not delete!
    parent::__construct();
    	
	}
	
	function render_field_settings( $field ) {

		acf_render_field_setting( $field, array(
			'label'					=> __('Filter by Post Type','TEXTDOMAIN'),
			'instructions'	=> __('Limit the type of posts that appear in the dropdown','TEXTDOMAIN'),
			'type'					=> 'select',
			'name'					=> 'post_type',
			'choices'				=> acf_get_pretty_post_types(),
			'multiple'			=> 1,
			'ui'						=> 1,
			'allow_null'		=> 1,
			'placeholder'		=> __("All post types", 'acf'),
		));

	}
	
	function render_field( $field ) {

		$field['type'] = 'select';
		$field['choices'] = array();
		$field['slugs'] = array();
		$postTypes = $field['post_type'];

		//populate slugs
		if (empty($field['slugs'])) {
			foreach($postTypes as $post) {
				$postChildren = get_posts([
					'post_type' => $post,
					'post_status' => 'publish',
					'numberposts' => -1
				]);
	
				foreach ($postChildren as $childrenIndex=>$child) {
					$field['slugs'][$childrenIndex] = $child->post_name;
				}
			}
		}

		if ($postTypes) {
			foreach ($postTypes as $index=>$post) {

				$postChildren = get_posts([
					'post_type' => $post,
					'post_status' => 'publish',
					'numberposts' => -1
				]);

				foreach ($postChildren as $childrenIndex=>$child) {
					$field['choices'][$childrenIndex] = $child->post_title;
				}

			}
			acf_render_field($field);
		}
	}

	function load_value($value, $post_id, $field) {
		return $value;
	}
	
	function update_value($value, $post_id, $field) {
		return $value;
	}

	function format_value($value, $post_id, $field) {
		if(empty($value)) {
			return $value;
		}

		return $value;
	}
	
}


// initialize
new NAMESPACE_acf_field_FIELD_NAME( $this->settings );


// class_exists check
endif;

?>