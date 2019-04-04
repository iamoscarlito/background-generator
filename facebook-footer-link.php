<?php
/**
* Plugin Name: Facebook Footer Link
* Description: Adds a Facebook Profile Link to the the end of the posts
* Version: 1.0
* Author: Oscar Ira
**/


//We don't want anyone to directly access our file 
if(!defined('ABSPATH')){
	exit;
}

//Global Options Variable
//needed in facebook-footer-link-settings.php
$ffl_options = get_option('ffl_settings');

// Load Scripts

require_once(plugin_dir_path(__FILE__).'/includes/facebook-footer-link-scripts.php');

// Load Content

require_once(plugin_dir_path(__FILE__).'/includes/facebook-footer-link-content.php');

//Load Settings

//only include only in the admin side not front-end
//use a special facebook method 

if(is_admin()){

require_once(plugin_dir_path(__FILE__).'/includes/facebook-footer-link-settings.php');

}