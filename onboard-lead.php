<?php
/**
 * @package onboard-lead
 */
/*
Plugin Name: Onboard Lead
Plugin URI: https://www.onboardinformatics.com/nav20
Description: The Lead component is a lead capture tool that enables visitors to quickly request someone connect with them via email, phone or text. It is an efficient and effective way to capture online leads who are looking to speak with someone right away.
Version: 1.0
Author: Onboard Informatics
Author URI: https://www.onboardinformatics.com/
Text Domain: Onboard Inc
*/

// File include using require_once from library folder
require_once(plugin_dir_path(__FILE__).'library/enqueuing.php' );

/*
Function name : onboard_lead_create
Discription : This function is used for display Onboard Lead as admin menu over the wordpress admin panel
*/
add_action('admin_menu', 'obl_onboard_lead_create');
function obl_onboard_lead_create() {
    $page_title = 'Onboard Lead';
    $menu_title = 'Onboard Lead';
    $capability = 'edit_posts';
    $menu_slug = 'onboard_lead_bar';
    $function = 'obl_custom_onboard_leadbar_display';
    $icon_url = 'dashicons-shield';
    $position = 24;
    add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
}

/*
Function name : obl_custom_onboard_leadbar_display
Discription : This function is used for display Lead form when someone click on "Onboard Lead" menu from wordpress admin panel, From this section user can save the script which is provided by Onboard Informatics to display property related lead on the website. 
*/
function obl_custom_onboard_leadbar_display() {
	
	//Check form is posted or not
	if ( ! empty( $_POST ) ) {
		//Check for nonce field verification
		if (isset( $_POST['custom_onboard_leadbar_display_field'] ) && $_POST['custom_onboard_leadbar_display_field'] !="" || wp_verify_nonce( $_POST['custom_onboard_leadbar_display_field'], 'obl_custom_onboard_leadbar_display' )){
			
			//Update Lead widget text script code, It will capture user email, Phone number and Cell number field through iframe and send the specific notification to that user.
			if (isset($_POST['lead_bar_text']) && !empty($_POST['lead_bar_text'])) {
				
				$lead_bar_text = stripslashes(json_encode($_POST['lead_bar_text']));
				update_option('lead_bar_text', $lead_bar_text); //Update script code in wordpress with lead_bar_text meta_value
				
			}
		}
	}
	
	
	$wd_set = get_option('lead_bar_text', ''); // get value of widget text script code to display pre-filled in html form
	
	if(!empty($wd_set)){
		//Get the saved value to pre-filled the data into form.
		$lead_bar_text 	= stripslashes(json_decode($wd_set));  	
	}else{
		$lead_bar_text 	= '';  	
	}
    //Get form from this file
    include 'lead-bar-form-file.php';
}

/*
Function name : custom_leadbar_shortcode
Discription : This function is used for generate shortcode so that user can easily use lead anywhere on his/her website. This lead widget display the form on your website to get the contact query which is related to property, It will capture user email, Phone number and Cell number field through iframe and send the specific notification to that user.
*/

function obl_custom_leadbar_shortcode($atts) {
	
	$leadbar_widget_script_set = get_option('lead_bar_text');
	if(!empty($leadbar_widget_script_set)){
		$widgetScript 	= stripslashes(json_decode($leadbar_widget_script_set));  	
	}else{
		$widgetScript 	= $leadbar_widget_script_set;  	
	}
	return $widgetScript;	
}
add_shortcode( 'onboard-lead', 'obl_custom_leadbar_shortcode' );


function obl_custom_leadbar_action_links( $links ) {
 $links = array_merge( array(
  '<a href="' . esc_url( admin_url( 'admin.php?page=onboard_lead_bar' ) ) . '">' . __( 'Settings', 'textdomain' ) . '</a>'
 ), $links );
 return $links;
}
add_action( 'plugin_action_links_' . plugin_basename( __FILE__), 'obl_custom_leadbar_action_links' );