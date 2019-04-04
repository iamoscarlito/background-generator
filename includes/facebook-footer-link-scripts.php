<?php
//die("Working....");
//echo "Hello I'm on top!";

function ffl_add_scripts(){
	//add css style
	wp_enqueue_style('ffl-main-style',plugins_url() . '/facebook-footer-link/css/style.css');
	wp_enqueue_script('ffl-main-script',plugins_url() . '/facebook-footer-link/js/main.js');

}


//add hook to tie this up with Wordpress
add_action('wp_enqueue_scripts','ffl_add_scripts');

