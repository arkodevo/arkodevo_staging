<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

</section>
</div>

<div id='footer_feature'>
	<div class="full-width">
		<div class='row'>
			<div class='large-7 columns'>
				<strong>WHAT DID YOU THINK?</strong>
				<p>Our goal with this newsletter is to provide you with timely and relevant news and resources related to IT Availability. Please let us know how we are doing by completing a <a href='#' target='_blank'>brief feedback survey</a>. We'd love to hear from you!</p>
			</div>
		</div>
	</div>
	<div class='clear_both'></div>
</div>
     	
<div id="footer-container">
	<footer id="footer">
		<div class='large-6 columns'>
			<div id='footer_copyright'>
				&copy; 2015 Arkodevo, all rights reserved / <a target='_blank' href='#'>Privacy Policy</a>
			</div>
		</div>
		<div class='large-6 columns'>
			<div id='footer_sm'>
				<a class='icon' target='_blank' href='#'><img src='<?php echo get_stylesheet_directory_uri(); ?>/images/sm_yt.png' alt='YouTube'></a>
				<a class='icon' target='_blank' href='#'><img src='<?php echo get_stylesheet_directory_uri(); ?>/images/sm_tw.png' alt='Twitter'></a>
				<a class='icon' target='_blank' href='#'><img src='<?php echo get_stylesheet_directory_uri(); ?>/images/sm_fb.png' alt='Facebook'></a>
				<a class='icon' target='_blank' href='#'><img src='<?php echo get_stylesheet_directory_uri(); ?>/images/sm_li.png' alt='LinkedIn'></a>
				<div class='clear_both'></div>
			</div>
		</div>
	</footer>
</div>

<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>

<a class="exit-off-canvas"></a>
<?php endif; ?>

	<?php do_action( 'foundationpress_layout_end' ); ?>

<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
	</div>
</div>
<?php endif; ?>

<?php wp_footer(); ?>
<?php do_action( 'foundationpress_before_closing_body' ); ?>
</body>
</html>
