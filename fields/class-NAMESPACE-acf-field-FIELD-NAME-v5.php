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
			'font_size'	=> 14,
		);
		$this->settings = $settings;
		
		// do not delete!
    	parent::__construct();
    	
	}
	
	function render_field_settings( $field ) {

		acf_render_field_setting( $field, array(
			'label'			=> __('Font Size','TEXTDOMAIN'),
			'instructions'	=> __('Customise the input font size','TEXTDOMAIN'),
			'type'			=> 'number',
			'name'			=> 'font_size',
			'prepend'		=> 'px',
		));

	}
	
	function render_field( $field ) {
		
		echo '<pre>';
			print_r( $field );
		echo '</pre>';
		
		?>
		<input type="text" name="<?php echo esc_attr($field['name']) ?>" value="<?php echo esc_attr($field['value']) ?>" style="font-size:<?php echo $field['font_size'] ?>px;" />
		<?php
	}
	
	
}


// initialize
new NAMESPACE_acf_field_FIELD_NAME( $this->settings );


// class_exists check
endif;

?>