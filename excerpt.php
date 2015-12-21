<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

	$home_post_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); 

?>

<div class='home_post'>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class='home_post_image' style='background-image: url(<?=$home_post_image_url[0]?>);'></div>
		<div class='home_post_content'>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="entry-content">
				<?php echo strip_tags(get_the_excerpt( __( 'Read More', 'foundationpress' ))); ?>
				<nobr><a href="<?php the_permalink(); ?>">Read More</a></nobr>
			</div>
		</div>
	</article>
</div>