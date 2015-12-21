<?php
/*
Template Name: Secondary
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
				
					<?php while(have_posts()) : the_post(); ?>
						<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
							<header>
								<h1 class="entry-title"><?php the_title(); ?></h1>
								<?php
									echo '<p class="byline author">';
									//echo __( 'By', 'foundationpress' ) .' <a href="'. get_author_posts_url( get_the_author_meta( 'ID' ) ) .'" rel="author" class="fn">'. get_the_author_nickname() .'</a> | ';
									//echo '<time class="updated" datetime="'. get_the_time( 'c' ) .'">'. sprintf( __( '%s', 'foundationpress' ), get_the_date()) .'</time>';	
									echo '</p>';
								?>
							</header>
							<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
							<div class="entry-content">
				
							<?php if(has_post_thumbnail()) : ?>
								<div class="row">
									<div class="column">
										<div id='feature_image' style='background: url(<?=$feature_image?>) no-repeat center center; background-size: cover;'></div>
									</div>
								</div>
							<?php endif; ?>
				
							<?php the_content(); ?>
							</div>
						</article>
					<?php endwhile;?>
				
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
							
							$args = array(
    							'posts_per_page' => 3,
								'post_type' => 'post',
								'post_status' => 'publish',
								'category_name' => $category_slug
								);
							$post_query = new WP_Query($args);
							if($post_query->have_posts()){
								while($post_query->have_posts()){
									$post_query->the_post();
						
						?>
						
						<?php get_template_part( 'excerpt', get_post_format() ); ?>
				
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
	</div>
    	
<?php get_footer(); ?>