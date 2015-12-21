<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
		
		<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-144x144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-114x114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-72x72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-precomposed.png">

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>

	<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>

	<div class="off-canvas-wrap" data-offcanvas>
	<div class="inner-wrap">
	<?php endif; ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>

	<?php

		if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) :
		get_template_part( 'parts/off-canvas-menu' );
		endif;
	?>
	
	<?php get_template_part( 'parts/top-bar' ); ?>
	<div class='site-container'>
	 <div class="full-width">
	 	<div id='header'>
        	<div class='row'>
        		<div class="large-12 columns">
					<div id='header_logo'>
						<a href='<?php echo home_url(); ?>'><img src='http:<?php echo get_stylesheet_directory_uri(); ?>/images/header_logo.png' alt='<?php echo get_bloginfo('title'); ?>'></a>
					</div>
					<div id='header_right'>
						<div id='header_contact'><a target='_blank' href='#'>contact</a> / <a target='_blank' href='#'>about</a></div>
						<div id='header_edition'>
							<?php	
								if(get_field('edition_title') != ''){ 
									echo get_field('edition_title'); 
								} else { 
									$category = get_the_category(); 
									echo $category[0]->cat_name;
								} 
							?>
						</div>
					</div>
					<div class='clear_both'></div>
				</div>
			</div>
		</div>
	</div>
	
<section class="container" role="document">
	<?php //do_action( 'foundationpress_after_header' ); ?>
