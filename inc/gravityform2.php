<?php
//Buat Slider Untuk Timeframe

// Add a custom field button to the advanced to the field editor
add_filter( 'gform_add_field_buttons', 'wps_add_timeframe_field' );
function wps_add_timeframe_field( $field_groups ) {
	foreach( $field_groups as &$group ){
if( $group["name"] == "standard_fields" ){ // to add to the Standard Fields
	$group["fields"][] = array(
		"class"=>"button",
		"value" => __("Timeframe Slider", "gravityforms"),
		"onclick" => "StartAddField('timeframe');"
		);
	break;
}
}
return $field_groups;
}

// Adds title to GF custom field
add_filter( 'gform_field_type_title' , 'wps_timeframe_title' );
function wps_timeframe_title( $type ) {
	if ( $type == 'timeframe' )
		return __( 'timeframe' , 'gravityforms' );
}

// Adds the input area to the external side
add_action( "gform_field_input" , "wps_timeframe_field_input", 10, 5 );
function wps_timeframe_field_input ( $input, $field, $value, $lead_id, $form_id ){

	if ( $field["type"] == "timeframe" ) {
		$max_chars = "";
		if(!IS_ADMIN && !empty($field["maxLength"]) && is_numeric($field["maxLength"]))
			$max_chars = self::get_counter_script($form_id, $field_id, $field["maxLength"]);

		$input_name = $form_id .'_' . $field["id"];
		$tabindex = GFCommon::get_tabindex();
		$css = isset( $field['cssClass'] ) ? $field['cssClass'] : ”;

		return sprintf("<script>function outputUpdate2(value) {
			if(value == 0){
				document.querySelector('#output-amount2').value = 'Less than 2 months';
			}
			else if (value == 1) {
				document.querySelector('#output-amount2').value = 'Up to 3 months';
			}
			else if (value == 2) {
				document.querySelector('#output-amount2').value = 'Up to 6 months';
			}
			else if (value == 3) {
				document.querySelector('#output-amount2').value = 'Up to 12 months';
			}
			else if (value == 4) {
				document.querySelector('#output-amount2').value = 'More than 12 months';
			}
			else{
				document.querySelector('#output-amount2').value = value;
			}
		}
	</script>
	<p><output for='amount' id='output-amount2'>Up to 3 months</output></p>
	<div class='ginput_container'><input type='range' min='0' max='4' value='1' step='1' id='amount' oninput='outputUpdate2(value)' name='input_%s' id='%s' class='textarea gform_timeframe %s' $tabindex rows='10' cols='50'></div><div id='timeframe-range-min'></div>{$max_chars}", $field["id"], 'timeframe-'.$field['id'] , $field["type"] . ' ' . esc_attr($css) . ' ' . $field['size'] , esc_html($value));

	}

	return $input;
}

// Now we execute some javascript technicalitites for the field to load correctly
add_action( "gform_editor_js", "wps_gform_editor_js2" );
function wps_gform_editor_js2(){
	?>

	<script type='text/javascript'>

		jQuery(document).ready(function($) {
//Add all textarea settings to the "timeframe" field plus custom "timeframe_setting"
 fieldSettings["timeframe"] = fieldSettings["textarea"] + ", .timeframe_setting"; // this will show all fields that Paragraph Text field shows plus my custom setting

// from forms.js; can add custom "timeframe_setting" as well
fieldSettings["timeframe"] = ".label_setting, .description_setting, .admin_label_setting, .size_setting, .default_value_textarea_setting, .error_message_setting, .css_class_setting, .visibility_setting, .timeframe_setting"; //this will show all the fields of the Paragraph Text field minus a couple that I didn't want to appear.

//binding to the load field settings event to initialize the checkbox
$(document).bind("gform_load_field_settings", function(event, field, form){
	jQuery("#field_timeframe").attr("checked", field["field_timeframe"] == true);
	$("#field_timeframe_value").val(field["timeframe"]);
});
});

	</script>
	<?php
}

// Add a custom setting to the timeframe advanced field
add_action( "gform_field_advanced_settings" , "wps_timeframe_settings" , 10, 2 );
function wps_timeframe_settings( $position, $form_id ){

// Create settings on position 50 (right after Field Label)
	if( $position == 50 ){
		?>

		<li class="timeframe_setting field_setting">

			<input type="checkbox" id="field_timeframe" onclick="SetFieldProperty('field_timeframe', this.checked);" />
			<label for="field_timeframe" class="inline">
				<?php _e("Disable Submit Button", "gravityforms"); ?>
				<?php gform_tooltip("form_field_timeframe"); ?>
			</label>

		</li>
		<?php
	}
}

//Filter to add a new tooltip
add_filter('gform_tooltips', 'wps_add_timeframe_tooltips');
function wps_add_timeframe_tooltips($tooltips){
	$tooltips["form_field_timeframe"] = "<h6>Disable Submit Button</h6>Check the box if you would like to disable the submit button.";
	$tooltips["form_field_default_value"] = "<h6>Default Value</h6>Enter the Terms of Service here.";
	return $tooltips;
}

// Add a script to the display of the particular form only if timeframe field is being used
add_action( 'gform_enqueue_scripts' , 'wps_gform_enqueue_scripts2' , 10 , 2 );
function wps_gform_enqueue_scripts2( $form, $ajax ) {
// cycle through fields to see if timeframe is being used
	if (is_array($form) || is_object($form)){
		foreach ( $form["fields"] as $field ) {
			if ( ( $field["type"] == 'timeframe' ) && ( isset( $field["field_timeframe"] ) ) ) {
				$url = plugins_url( 'gform_timeframe.js' , __FILE__ );
				wp_enqueue_script( "gform_timeframe_script", $url , array("jquery"), '1.0' );
				break;
			}
		}
	}
}

// Add a custom class to the field li
add_action("gform_field_css_class", "custom_class2", 10, 3);
function custom_class2($classes, $field, $form){

	if( $field["type"] == "timeframe" ){
		$classes .= " gform_timeframe";
	}

	return $classes;
}