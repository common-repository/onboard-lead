<?php
	/*
	 * Function name : leadbar_admin_enqueue_stuff
	 * Functionality : This function is add CSS and JS file on admin end when plugin get activated
	*/
	function obl_leadbar_admin_enqueue_stuff() { 
		wp_enqueue_media();
		wp_enqueue_style( 'lead-bar-style-admin', plugin_dir_url(dirname(__FILE__)).'css/lead_bar.css' );
		wp_enqueue_script('custom_obn_leadbar_developer_validation', plugin_dir_url(dirname(__FILE__)).'js/obn_lead_bar_developer.js');
	}
	//Call the files function for include css and js stuff through admin_enqueue_scripts from library folder
	add_action( 'admin_enqueue_scripts', 'obl_leadbar_admin_enqueue_stuff' );