<?php
 	
 	require_once( 'wp-less/wp-less.php' );
 	
	add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
	function theme_enqueue_styles() {
    	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/assets/stylesheets/foundation.css' );
	}
	
	function nt_less(){
		if (!is_admin()){
			wp_enqueue_style( 'screen', get_stylesheet_directory_uri() . '/screen.less', null, '2.2', 'screen' );
			wp_enqueue_style( 'print', get_stylesheet_directory_uri() . '/print.less', null, '2.2', 'print' );
		}
 	}
 
	add_action('wp_enqueue_scripts', 'nt_less');
 
 
?>