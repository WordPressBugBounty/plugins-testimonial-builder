<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

  $wpsm_nonce = wp_create_nonce( 'wpsm_nonce_save_settings_values' ); 
  $De_Settings = unserialize(get_option('test_B_default_Settings'));
  $PostId = $post->ID;
  $Test_Settings = unserialize(get_post_meta( $PostId, 'Test_Settings', true));
  $testimonial_defaults = array(
    "carousel_dot_bgclr"   => "#D6D6D6",
		"carousel_dot_hover_bgclr"   => "#869791",
		"enable_test_mb_dots"   => "yes",
		);
  if(!(isset($De_Settings['carousel_dot_bgclr']) && isset($De_Settings['carousel_dot_hover_bgclr']) && isset($De_Settings['enable_test_mb_dots'])))
  {
	   $De_Settings = wp_parse_args( $De_Settings, $testimonial_defaults );
  }

	$option_names = array(
				
		"test_mb_name_clr" 	 => $De_Settings['test_mb_name_clr'],
		"test_mb_deg_clr" => $De_Settings['test_mb_deg_clr'],
		"test_mb_web_link_clr" => $De_Settings['test_mb_web_link_clr'],
		"test_mb_content_clr" => $De_Settings['test_mb_content_clr'],
		"test_mb_name_font_size"   =>$De_Settings['test_mb_name_font_size'],
		"test_mb_deg_font_size"   => $De_Settings['test_mb_deg_font_size'],
		"test_mb_web_link_font_size"   =>$De_Settings['test_mb_web_link_font_size'],
		"test_mb_content_font_size"   => $De_Settings['test_mb_content_font_size'],
		"test_font_family"   =>$De_Settings['test_font_family'],
		"test_layout"   => $De_Settings['test_layout'],
		"test_image_layout"   => $De_Settings['test_image_layout'],
		"test_mb_web_link_label"   => $De_Settings['test_mb_web_link_label'],
		"custom_css"   => $De_Settings['custom_css'],
		"templates"   => $De_Settings['templates'],
		"bgclr_style2" => $De_Settings['bgclr_style2'],
		"enable_test_mb_dots" => $De_Settings['enable_test_mb_dots'],
		"carousel_dot_bgclr" => $De_Settings['carousel_dot_bgclr'],
		"carousel_dot_hover_bgclr" => $De_Settings['carousel_dot_hover_bgclr'],
		
		);
		
		foreach($option_names as $option_name => $default_value) {
			if(isset($Test_Settings[$option_name])) 
				${"" . $option_name}  = $Test_Settings[$option_name];
			else
				${"" . $option_name}  = $default_value;
		}
	
		
?>

<Script>

 //font slider size script
  jQuery(function() {
    jQuery( "#test_mb_name_ft_size_id" ).slider({
		orientation: "horizontal",
		range: "min",
		max: 35,
		min:8,
		slide: function( event, ui ) {
		jQuery( "#test_mb_name_font_size" ).val( ui.value );
      }
		});
		
		jQuery( "#test_mb_name_ft_size_id" ).slider("value",<?php if(isset ($test_mb_name_font_size)) { echo esc_attr($test_mb_name_font_size) ;} else {echo "19"; } ?> );
		jQuery( "#test_mb_name_font_size" ).val( jQuery( "#test_mb_name_ft_size_id" ).slider( "value") );
    
  });
</script>
<Script>

 //font slider size script
  jQuery(function() {
    jQuery( "#test_mb_deg_font_size_id" ).slider({
		orientation: "horizontal",
		range: "min",
		max: 35,
		min:8,
		slide: function( event, ui ) {
		jQuery( "#test_mb_deg_font_size" ).val( ui.value );
      }
		});
		
		jQuery( "#test_mb_deg_font_size_id" ).slider("value",<?php if(isset ($test_mb_deg_font_size)) { echo esc_attr($test_mb_deg_font_size) ;} else {echo "19"; } ?> );
		jQuery( "#test_mb_deg_font_size" ).val( jQuery( "#test_mb_deg_font_size_id" ).slider( "value") );
    
  });
</script>
<Script>

 //font slider size script
  jQuery(function() {
    jQuery( "#test_mb_desc_ft_size_id" ).slider({
		orientation: "horizontal",
		range: "min",
		max: 35,
		min:8,
		slide: function( event, ui ) {
		jQuery( "#test_mb_desc_ft_size" ).val( ui.value );
      }
		});
		
		jQuery( "#test_mb_desc_ft_size_id" ).slider("value",<?php if(isset ($test_mb_desc_ft_size)) { echo esc_attr($test_mb_desc_ft_size) ;} else {echo "19"; } ?> );
		jQuery( "#test_mb_desc_ft_size" ).val( jQuery( "#test_mb_desc_ft_size_id" ).slider( "value") );
    
  });
</script> 

<Script>

 //font slider size script
  jQuery(function() {
    jQuery( "#test_mb_web_link_font_size_id" ).slider({
		orientation: "horizontal",
		range: "min",
		max: 35,
		min:8,
		slide: function( event, ui ) {
		jQuery( "#test_mb_web_link_font_size" ).val( ui.value );
      }
		});
		
		jQuery( "#test_mb_web_link_font_size_id" ).slider("value",<?php if(isset ($test_mb_web_link_font_size)) { echo esc_attr($test_mb_web_link_font_size) ;} else {echo "19"; } ?> );
		jQuery( "#test_mb_web_link_font_size" ).val( jQuery( "#test_mb_web_link_font_size_id" ).slider( "value") );
    
  });
</script>

<Script>

 //font slider size script
  jQuery(function() {
    jQuery( "#test_mb_content_font_size_id" ).slider({
		orientation: "horizontal",
		range: "min",
		max: 22,
		min:8,
		slide: function( event, ui ) {
		jQuery( "#test_mb_content_font_size" ).val( ui.value );
      }
		});
		
		jQuery( "#test_mb_content_font_size_id" ).slider("value",<?php if(isset ($test_mb_content_font_size)) { echo esc_attr($test_mb_content_font_size) ;} else {echo "19"; } ?> );
		jQuery( "#test_mb_content_font_size" ).val( jQuery( "#test_mb_content_font_size_id" ).slider( "value") );
    
  });
</script>

<Script>
// Default setting update function 
function wpsm_update_default(){
	 jQuery.ajax({
		url: location.href,
		type: "POST",
		data : {
			    'action123':'default_settins_action',
			     },
                success : function(data){
									alert("Default Settings Updated");
									location.reload(true);
                                   }	
	});
	
}
</script>
<?php

if(isset($_POST['action123']) == "default_settins_action")
	{
	
		$Settings_Array2 = serialize( array(
				
		"test_mb_name_clr" 	 => $test_mb_name_clr,
		"test_mb_deg_clr" => $test_mb_deg_clr,
		"test_mb_web_link_clr" => $test_mb_web_link_clr,
		"test_mb_content_clr" => $test_mb_content_clr,
		"test_mb_name_font_size"   =>$test_mb_name_font_size,
		"test_mb_deg_font_size"   => $test_mb_deg_font_size,
		"test_mb_web_link_font_size"   =>$test_mb_web_link_font_size,
		"test_mb_content_font_size"   => $test_mb_content_font_size,
		"test_font_family"   =>$test_font_family,
		"test_layout"   => $test_layout,
		"test_image_layout"   => $test_image_layout,
		"test_mb_web_link_label"   => $test_mb_web_link_label,
		"custom_css"   => $custom_css,
		"templates"   => $templates,
		"bgclr_style2" => $bgclr_style2,
		"enable_test_mb_dots" 	 => $enable_test_mb_dots,
		"carousel_dot_bgclr" => $carousel_dot_bgclr,
		"carousel_dot_hover_bgclr" => $carousel_dot_hover_bgclr
				
				
				
				) );

			update_option('test_B_default_Settings', $Settings_Array2);
}

 ?>
<input type="hidden" name="wpsm_security" value="<?php echo esc_attr( $wpsm_nonce ); ?>">
<input type="hidden" id="test_b_setting_save_action" name="test_b_setting_save_action" value="test_b_setting_save_action"/>

<table class="form-table acc_table">
	<tbody>
		<tr>
			<th scope="row"><label><?php esc_html_e('Testimonial Name Color',wpshopmart_test_b_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#test_mb_name_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<input id="test_mb_name_clr" name="test_mb_name_clr" type="text" value="<?php echo esc_attr($test_mb_name_clr); ?>" class="my-color-field" data-default-color="#e8e8e8" />
				<div id="test_mb_name_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php esc_html_e('Update Your Testimonial Name Color Here',wpshopmart_test_b_text_domain); ?></h2>
						<img src="<?php echo esc_url(wpshopmart_test_b_directory_url.'assets/tooltip/img/name-clr.png'); ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php esc_html_e('Testimonial Designation Color',wpshopmart_test_b_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#test_mb_pos_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<input id="test_mb_deg_clr" name="test_mb_deg_clr" type="text" value="<?php echo esc_attr($test_mb_deg_clr); ?>" class="my-color-field" data-default-color="#e8e8e8" />
				<div id="test_mb_pos_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php esc_html_e('Update Your Testimonial Designation Color Here',wpshopmart_test_b_text_domain); ?></h2>
						<img src="<?php echo esc_url(wpshopmart_test_b_directory_url.'assets/tooltip/img/desig-color.png'); ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php esc_html_e('Website Link Color',wpshopmart_test_b_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#test_mb_desc_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<input id="test_mb_web_link_clr" name="test_mb_web_link_clr" type="text" value="<?php echo esc_attr($test_mb_web_link_clr); ?>" class="my-color-field" data-default-color="#e8e8e8" />
				<div id="test_mb_desc_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php esc_html_e('Update Your Testimonial Website Link Color Here',wpshopmart_test_b_text_domain); ?></h2>
						<img src="<?php echo esc_url(wpshopmart_test_b_directory_url.'assets/tooltip/img/link-clr.png'); ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php esc_html_e('Testimonial Description Color',wpshopmart_test_b_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#test_mb_social_icon_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
			
			</th>
			<td>
				<input id="test_mb_content_clr" name="test_mb_content_clr" type="text" value="<?php echo esc_attr($test_mb_content_clr); ?>" class="my-color-field" data-default-color="#e8e8e8" />
				<div id="test_mb_social_icon_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php esc_html_e('Update Your Testimonial Description Color Here',wpshopmart_test_b_text_domain); ?></h2>
						<img src="<?php echo esc_url(wpshopmart_test_b_directory_url.'assets/tooltip/img/desc-color.png'); ?>">
					</div>
		    	</div>
			</td>
		</tr>
		<tr class="setting_color">
			<th><label><?php esc_html_e('Name Font Size',wpshopmart_test_b_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#test_mb_social_icon_bg_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<div id="test_mb_name_ft_size_id" class="size-slider" ></div>
				<input type="text" class="slider-text" id="test_mb_name_font_size" name="test_mb_name_font_size"  readonly="readonly">
				<div id="title_size_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;"><?php esc_html_e('You can update Name Font Size from here. Just Scroll it to change size.',wpshopmart_test_b_text_domain)?></h2>
					</div>
		    	</div>
			</td>
		</tr>
		
		
		
		<tr class="setting_color">
			<th><label><?php esc_html_e('Designation Font Size',wpshopmart_test_b_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#test_mb_social_icon_bg_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<div id="test_mb_deg_font_size_id" class="size-slider" ></div>
				<input type="text" class="slider-text" id="test_mb_deg_font_size" name="test_mb_deg_font_size"  readonly="readonly">
				<div id="title_size_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;"><?php esc_html_e('You can update Designation Font Size from here. Just Scroll it to change size.',wpshopmart_test_b_text_domain); ?></h2>
					</div>
		    	</div>
			</td>
		</tr>
		
		
		<tr class="setting_color">
			<th><label><?php esc_html_e('Website Link Font Size',wpshopmart_test_b_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#test_mb_social_icon_bg_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<div id="test_mb_web_link_font_size_id" class="size-slider" ></div>
				<input type="text" class="slider-text" id="test_mb_web_link_font_size" name="test_mb_web_link_font_size"  readonly="readonly">
				<div id="title_size_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;"><?php esc_html_e('You can update Website Link Font Size from here. Just Scroll it to change size.',wpshopmart_test_b_text_domain); ?></h2>
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr class="setting_color">
			<th><label><?php esc_html_e('Testimonial Description Font Size',wpshopmart_test_b_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#test_mb_social_icon_bg_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<div id="test_mb_content_font_size_id" class="size-slider" ></div>
				<input type="text" class="slider-text" id="test_mb_content_font_size" name="test_mb_content_font_size"  readonly="readonly">
				<div id="title_size_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;"><?php esc_html_e('You can update Testimonial Description Size from here. Just Scroll it to change size.',wpshopmart_test_b_text_domain); ?></h2>
					</div>
		    	</div>
			</td>
		</tr>
		
		
		<tr >
			<th><label><?php esc_html_e('Font Style/Family',wpshopmart_test_b_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#font_family_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<select name="test_font_family" id="test_font_family" class="standard-dropdown" style="width:100%" >
					<optgroup label="Default Fonts">
						<option value="Arial"           <?php if($test_font_family == 'Arial' ) { echo "selected"; } ?>>Arial</option>
						<option value="Arial Black"    <?php if($test_font_family == 'Arial Black' ) { echo "selected"; } ?>>Arial Black</option>
						<option value="Courier New"     <?php if($test_font_family == 'Courier New' ) { echo "selected"; } ?>>Courier New</option>
						<option value="Georgia"         <?php if($test_font_family == 'Georgia' ) { echo "selected"; } ?>>Georgia</option>
						<option value="Grande"          <?php if($test_font_family == 'Grande' ) { echo "selected"; } ?>>Grande</option>
						<option value="Helvetica" 	<?php if($test_font_family == 'Helvetica' ) { echo "selected"; } ?>>Helvetica Neue</option>
						<option value="Impact"         <?php if($test_font_family == 'Impact' ) { echo "selected"; } ?>>Impact</option>
						<option value="Lucida"         <?php if($test_font_family == 'Lucida' ) { echo "selected"; } ?>>Lucida</option>
						<option value="Lucida Grande"         <?php if($test_font_family == 'Lucida Grande' ) { echo "selected"; } ?>>Lucida Grande</option>
						<option value="Open Sans"   <?php if($test_font_family == 'Open Sans' ) { echo "selected"; } ?>>Open Sans</option>
						<option value="OpenSansBold"   <?php if($test_font_family == 'OpenSansBold' ) { echo "selected"; } ?>>OpenSansBold</option>
						<option value="Palatino Linotype"       <?php if($test_font_family == 'Palatino Linotype' ) { echo "selected"; } ?>>Palatino</option>
						<option value="Sans"           <?php if($test_font_family == 'Sans' ) { echo "selected"; } ?>>Sans</option>
						<option value="sans-serif"           <?php if($test_font_family == 'sans-serif' ) { echo "selected"; } ?>>Sans-Serif</option>
						<option value="Tahoma"         <?php if($test_font_family == 'Tahoma' ) { echo "selected"; } ?>>Tahoma</option>
						<option value="Times New Roman"          <?php if($test_font_family == 'Times New Roman' ) { echo "selected"; } ?>>Times New Roman</option>
						<option value="Trebuchet"      <?php if($test_font_family == 'Trebuchet' ) { echo "selected"; } ?>>Trebuchet</option>
						<option value="Verdana"        <?php if($test_font_family == 'Verdana' ) { echo "selected"; } ?>>Verdana</option>
					</optgroup>
				</select>
				<div id="font_family_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;"><?php esc_html_e('You can update Testimonial name , designation and Description Font Family/Style from here. Select any one form these options.',wpshopmart_test_b_text_domain); ?></h2>
					
					</div>
		    	</div>
				<div style="margin-top:10px;display:block;overflow:hidden;width:100%;"> <a style="margin-top:10px" href="https://wpshopmart.com/plugins/testimonial-pro/" target="_blank"><?php esc_html_e('Get 500+ Google Fonts In Premium Version',wpshopmart_test_b_text_domain); ?></a> </div>
			
			</td>
		</tr>
		
		
		<tr>
			<th><label><?php esc_html_e('Testimonial Column Display layout ',wpshopmart_test_b_text_domain); ?> </label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#test_layout_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<select name="test_layout" id="test_layout" class="standard-dropdown" style="width:100%" >
						<option value="12"  <?php if($test_layout == '12') { echo "selected"; } ?>><?php esc_html_e('One Column Layout',wpshopmart_test_b_text_domain); ?></option>
						<option value="6"  <?php if($test_layout == '6') { echo "selected"; } ?>><?php esc_html_e('Two Column Layout',wpshopmart_test_b_text_domain); ?></option>
						<option value="4"  <?php if($test_layout == '4') { echo "selected"; } ?>><?php esc_html_e('Three Column Layout',wpshopmart_test_b_text_domain); ?></option>
						

				</select>
				<div id="test_layout_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;"><?php esc_html_e('Testimonial Column Display layout',wpshopmart_test_b_text_domain); ?></h2>
					</div>
		    	</div>
				<div style="margin-top:10px;display:block;overflow:hidden;width:100%;"> <a style="margin-top:10px" href="https://wpshopmart.com/plugins/testimonial-pro/" target="_blank"><?php esc_html_e('Unlock 6+ More Display layouts In Premium Version',wpshopmart_test_b_text_domain); ?></a> </div>
			
			</td>
		</tr>
		<tr>
			<th scope="row"><label><?php esc_html_e('Testimonial Background Color For Design-2',wpshopmart_test_b_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#test_mb_desc_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<input id="bgclr_style2" name="bgclr_style2" type="text" value="<?php echo esc_attr($bgclr_style2); ?>" class="my-color-field" data-default-color="#e8e8e8" />
				<div id="test_mb_desc_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php esc_html_e('Update Your testimonial Design Background Color Here',wpshopmart_test_b_text_domain); ?></h2>
						<img src="<?php echo esc_url(wpshopmart_test_b_directory_url.'assets/tooltip/img/background.png'); ?>">
					</div>
		    	</div>
			</td>
		</tr>

		<tr class="setting_color">
			<th><label><?php esc_html_e('Website Link Label',wpshopmart_test_b_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#test_mb_web_link_label_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<input type="text" class="wpsm_ac_label_text" id="test_mb_web_link_label" name="test_mb_web_link_label"  value="<?php echo esc_attr($test_mb_web_link_label); ?>">
				<div id="test_mb_web_link_label_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;"><?php esc_html_e('Update Website Link Label Here',wpshopmart_test_b_text_domain); ?></h2>
					</div>
		    	</div>
				<div style="margin-top:10px;display:block;overflow:hidden;width:100%;"> <a style="margin-top:10px" href="https://wpshopmart.com/plugins/testimonial-pro/" target="_blank"><?php esc_html_e('Unlock more option like Ratings, emailid and webiste with link in Premium Version',wpshopmart_test_b_text_domain); ?></a> </div>
			
			</td>
		</tr>	
		
		<tr>
			<th><label><?php esc_html_e('Testimonial Image Design ',wpshopmart_test_b_text_domain); ?> </label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#test_image_layout_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<select name="test_image_layout" id="test_image_layout" class="standard-dropdown" style="width:100%" >
						<option value="1"  <?php if($test_image_layout == '1') { echo "selected"; } ?>><?php esc_html_e('Rectangle',wpshopmart_test_b_text_domain); ?></option>
						<option value="2"  <?php if($test_image_layout == '2') { echo "selected"; } ?>><?php esc_html_e('Circle',wpshopmart_test_b_text_domain); ?></option>
						

				</select>
				<div id="test_image_layout_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;"><?php esc_html_e('Select Testimonial Image Design Style Here',wpshopmart_test_b_text_domain); ?></h2>
					</div>
		    	</div>
				<div style="margin-top:10px;display:block;overflow:hidden;width:100%;"> <a style="margin-top:10px" href="https://wpshopmart.com/plugins/testimonial-pro/" target="_blank"><?php esc_html_e('Unlock 150+ testimonial design templates with different image style in Premium Version',wpshopmart_test_b_text_domain); ?></a> </div>
			
			</td>
		</tr>
		<tr>
			<th scope="row"><label><?php _e('Display Carousel Dots',wpshopmart_test_b_text_domain); ?></label>
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#test_mb_dots_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<div class="switch">
					<input type="radio" class="switch-input" name="enable_test_mb_dots" value="yes" id="enable_test_mb_dots" <?php if($enable_test_mb_dots == 'yes' ) { echo "checked"; } ?>   >
					<label for="enable_test_mb_dots" class="switch-label switch-label-off"><?php _e('Yes',wpshopmart_test_b_text_domain); ?></label>
					<input type="radio" class="switch-input" name="enable_test_mb_dots" value="no" id="disable_test_mb_dots"  <?php if($enable_test_mb_dots == 'no' ) { echo "checked"; } ?> >
					<label for="disable_test_mb_dots" class="switch-label switch-label-on"><?php _e('No',wpshopmart_test_b_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				
				<div id="test_mb_dots_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Display your Carousel Dots here ',wpshopmart_test_b_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_test_b_directory_url.'assets/tooltip/img/displaydots.jpg'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		<tr>
			<th scope="row"><label><?php _e('Carousel Dots Background Color',wpshopmart_test_b_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#test_mb_dots_bg_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<input id="carousel_dot_bgclr" name="carousel_dot_bgclr" type="text" value="<?php echo $carousel_dot_bgclr; ?>" class="my-color-field" data-default-color="#D6D6D6" />
				<div id="test_mb_dots_bg_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Update Your testimonial Carousel <br/>Dots Background Color Here',wpshopmart_test_b_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_test_b_directory_url.'assets/tooltip/img/dotsbgcolor.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		<tr>
			<th scope="row"><label><?php _e('Carousel Dots Hover/Active Background Color',wpshopmart_test_b_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#test_mb_dots_hover_bg_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<input id="carousel_dot_hover_bgclr" name="carousel_dot_hover_bgclr" type="text" value="<?php echo $carousel_dot_hover_bgclr; ?>" class="my-color-field" data-default-color="#869791" />
				<div id="test_mb_dots_hover_bg_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Update Your testimonial Carousel Dots <br/>Hover/Active  Background Color Here',wpshopmart_test_b_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_test_b_directory_url.'assets/tooltip/img/dotshvcolor.jpg'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<script>
		
		jQuery('.ac_tooltip').darkTooltip({
				opacity:1,
				gravity:'east',
				size:'small'
			});
			

		</script>
	</tbody>
</table>