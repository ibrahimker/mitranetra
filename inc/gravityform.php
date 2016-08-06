<?php
/**
* Plugin Name: Gravity Forms budget Field
*/
// Add currency
add_filter( 'gform_currencies', 'update_currency' );
function update_currency( $currencies ) {
	$currencies['Rupiah'] = array(
		'name'               => __( 'Rupiah', 'gravityforms' ),
		'symbol_left'        => 'Rp',
		'symbol_right'       => '',
		'symbol_padding'     => ' ',
		'thousand_separator' => ',',
		'decimal_separator'  => '.',
		'decimals'           => 2
		);

	return $currencies;
}

// Add a custom field button to the advanced to the field editor
add_filter( 'gform_add_field_buttons', 'wps_add_budget_field' );
function wps_add_budget_field( $field_groups ) {
	foreach( $field_groups as &$group ){
if( $group["name"] == "standard_fields" ){ // to add to the Standard Fields
	$group["fields"][] = array(
		"class"=>"button",
		"value" => __("Budget Slider", "gravityforms"),
		"onclick" => "StartAddField('budget');"
		);
	break;
}
}
return $field_groups;
}

// Adds title to GF custom field
add_filter( 'gform_field_type_title' , 'wps_budget_title' );
function wps_budget_title( $type ) {
	if ( $type == 'budget' )
		return __( 'budget' , 'gravityforms' );
}

// Adds the input area to the external side
add_action( "gform_field_input" , "wps_budget_field_input", 10, 5 );
function wps_budget_field_input ( $input, $field, $value, $lead_id, $form_id ){

	if ( $field["type"] == "budget" ) {
		$max_chars = "";
		if(!IS_ADMIN && !empty($field["maxLength"]) && is_numeric($field["maxLength"]))
			$max_chars = self::get_counter_script($form_id, $field_id, $field["maxLength"]);

		$input_name = $form_id .'_' . $field["id"];
		$tabindex = GFCommon::get_tabindex();
		$css = isset( $field['cssClass'] ) ? $field['cssClass'] : ”;

		return sprintf("<script>function outputUpdate(value) {
			if(value == 0){
				document.querySelector('#output-amount').value = 'From Rp 10.000.000';
			}
			else if (value == 1) {
				document.querySelector('#output-amount').value = 'Up to Rp 20.000.000';
			}
			else if (value == 2) {
				document.querySelector('#output-amount').value = 'Up to Rp 50.000.000';
			}
			else if (value == 3) {
				document.querySelector('#output-amount').value = 'Up to Rp 100.000.000';
			}
			else if (value == 4) {
				document.querySelector('#output-amount').value = 'Over Rp 100.000.000';
			}
			else{
				document.querySelector('#output-amount').value = value;
			}
		}
	</script>
	<p><output for='amount' id='output-amount'>Up to Rp 50.000.000 </output></p>
	<div class='ginput_container'><input type='range' min='0' max='4' value='2' step='1' id='amount' oninput='outputUpdate(value)' name='input_%s' id='%s' class='textarea gform_budget %s' $tabindex rows='10' cols='50'></div><div id='budget-range-min'></div>{$max_chars}", $field["id"], 'budget-'.$field['id'] , $field["type"] . ' ' . esc_attr($css) . ' ' . $field['size'] , esc_html($value));

	}

	return $input;
}

// Now we execute some javascript technicalitites for the field to load correctly
add_action( "gform_editor_js", "wps_gform_editor_js" );
function wps_gform_editor_js(){
	?>

	<script type='text/javascript'>

		jQuery(document).ready(function($) {
//Add all textarea settings to the "budget" field plus custom "budget_setting"
 fieldSettings["budget"] = fieldSettings["textarea"] + ", .budget_setting"; // this will show all fields that Paragraph Text field shows plus my custom setting

// from forms.js; can add custom "budget_setting" as well
fieldSettings["budget"] = ".label_setting, .description_setting, .admin_label_setting, .size_setting, .default_value_textarea_setting, .error_message_setting, .css_class_setting, .visibility_setting, .budget_setting"; //this will show all the fields of the Paragraph Text field minus a couple that I didn't want to appear.

//binding to the load field settings event to initialize the checkbox
$(document).bind("gform_load_field_settings", function(event, field, form){
	jQuery("#field_budget").attr("checked", field["field_budget"] == true);
	$("#field_budget_value").val(field["budget"]);
});
});

	</script>
	<?php
}

// Add a custom setting to the budget advanced field
add_action( "gform_field_advanced_settings" , "wps_budget_settings" , 10, 2 );
function wps_budget_settings( $position, $form_id ){

// Create settings on position 50 (right after Field Label)
	if( $position == 50 ){
		?>

		<li class="budget_setting field_setting">

			<input type="checkbox" id="field_budget" onclick="SetFieldProperty('field_budget', this.checked);" />
			<label for="field_budget" class="inline">
				<?php _e("Disable Submit Button", "gravityforms"); ?>
				<?php gform_tooltip("form_field_budget"); ?>
			</label>

		</li>
		<?php
	}
}

//Filter to add a new tooltip
add_filter('gform_tooltips', 'wps_add_budget_tooltips');
function wps_add_budget_tooltips($tooltips){
	$tooltips["form_field_budget"] = "<h6>Disable Submit Button</h6>Check the box if you would like to disable the submit button.";
	$tooltips["form_field_default_value"] = "<h6>Default Value</h6>Enter the Terms of Service here.";
	return $tooltips;
}

// Add a script to the display of the particular form only if budget field is being used
add_action( 'gform_enqueue_scripts' , 'wps_gform_enqueue_scripts' , 10 , 2 );
function wps_gform_enqueue_scripts( $form, $ajax ) {
// cycle through fields to see if budget is being used
	if (is_array($form) || is_object($form)) {
		foreach ( $form["fields"] as $field ) {
			if ( ( $field["type"] == 'budget' ) && ( isset( $field["field_budget"] ) ) ) {
				$url = plugins_url( 'gform_budget.js' , __FILE__ );
				wp_enqueue_script( "gform_budget_script", $url , array("jquery"), '1.0' );
				break;
			}
		}
	}
}

// Add a custom class to the field li
add_action("gform_field_css_class", "custom_class", 10, 3);
function custom_class($classes, $field, $form){

	if( $field["type"] == "budget" ){
		$classes .= " gform_budget";
	}

	return $classes;
}