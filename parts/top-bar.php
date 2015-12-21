<?php
/**
 * Template part for top bar menu
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<div class="top-bar-container contain-to-grid">
    <nav class="top-bar" data-topbar role="navigation">
        <ul class="title-area top-bar-<?php echo apply_filters( 'filter_mobile_nav_position', 'mobile_nav_position' ); ?>">
            <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
        </ul>
        <section class="top-bar-section">
            <div class="large-3 right">
            	<?php get_search_form(); ?>
            </div>
            <div class="large-3 right">
            	<div class="row collapse">
            		<?php foundationpress_top_bar_r(); ?>
            	</div>
            </div>
        </section>
    </nav>
	<div class='clear_both'></div>
</div>
