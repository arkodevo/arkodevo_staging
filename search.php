<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

	get_header(); 
	
	$edition_id 	= get_option('page_on_front');
	$edition_post	= get_post($edition_id);
	$category_slug	= $edition_post->post_name;
  
	$edition_fields = array(				
						'edition_secondary_feature_headline', 
						'edition_secondary_feature_content',
						'edition_secondary_feature_button',
						'edition_secondary_feature_url',
						'edition_secondary_feature_background',
						'edition_tertiary_feature_content');
						
	foreach($edition_fields as $field){
		${$field} = get_field($field, $edition_id);
	}
	
	$post_data = get_post($edition_primary_feature);
	$feature_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));

?>

<div class='row'>
		<div class='large-12 columns'>
			<div id='post_single'>
				<div class='large-8 columns'>
					
					<?php do_action( 'foundationpress_before_content' ); ?>

					<h1><?php _e( 'Search Results for', 'foundationpress' ); ?> "<?php echo get_search_query(); ?>"</h2>
			
					<?php if ( have_posts() ) : ?>
				
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', get_post_format() ); ?>
						<?php endwhile; ?>
				
						<?php else : ?>
							<?php get_template_part( 'content', 'none' ); ?>
				
					<?php endif;?>
			
					<?php do_action( 'foundationpress_before_pagination' ); ?>
				
					<?php if ( function_exists( 'foundationpress_pagination' ) ) { foundationpress_pagination(); } else if ( is_paged() ) { ?>
				
						<nav id="post-nav">
							<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
							<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
						</nav>
					<?php } ?>
				
					<?php do_action( 'foundationpress_after_content' ); ?>
								
				</div>
				<div class='large-4 columns'>
					<div id='secondary_feature_container'>
						<div id='secondary_feature' style='background-image: url(<?=$edition_secondary_feature_background?>);'>
							<div class='content'>
								<h2><?=$edition_secondary_feature_headline?></h2>
								<p><?=$edition_secondary_feature_content?>
								<a href='<?=$edition_secondary_feature_url?>'><?=$edition_secondary_feature_button?></a>
							</div>
						</div>
					</div>
					<div id='tertiary_feature'>
						<div class='content'><?=$edition_tertiary_feature_content?></div>
					</div>
					<div id='top_posts'>
					<?php 
						
						$count = 1;
						$args = array(
							'posts_per_page' => 4,
							'post_type' => 'post',
							'post_status' => 'publish',
							'category_name' => $category_slug,
							'meta_key' => 'wpb_post_views_count', 
							'orderby' => 'meta_value_num', 
							'order' => 'DESC'
							);
						$post_query = new WP_Query($args);
						if($post_query->have_posts()){
							while($post_query->have_posts()){
								$post_query->the_post();
					
					?>
					
					<?php if($count > 3){ break; } ?>
					<?php $id = get_the_ID(); ?>
					<?php if($id != $post_id){ ?>
						<?php get_template_part( 'excerpt', get_post_format() ); ?>
						<?php $count++; ?>
					<?php } ?>
					
					<?php 
						}
						}
						wp_reset_query(); 
					?>
				</div>
				</div>
				<div class='clear_both'></div>
		</div>
	</div>

<?php get_footer(); ?>