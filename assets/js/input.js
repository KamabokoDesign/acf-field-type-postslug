(function($){
	
	function initialize_field( $field ) {
		
		//$field.doStuff();
		
	}
	
	
	if( typeof acf.add_action !== 'undefined' ) {
		
		acf.add_action('ready_field/type=FIELD_NAME', initialize_field);
		acf.add_action('append_field/type=FIELD_NAME', initialize_field);
		
		
	} else {
		
		$(document).on('acf/setup_fields', function(e, postbox){
			
			// find all relevant fields
			$(postbox).find('.field[data-field_type="FIELD_NAME"]').each(function(){
				
				// initialize
				initialize_field( $(this) );
				
			});
		
		});
	
	}

})(jQuery);
