<?php
/*
Template Name: Post
*/
get_header(); 
	
$edition_fields = array(				
						'edition_secondary_feature_headline', 
						'edition_secondary_feature_content',
						'edition_secondary_feature_button',
						'edition_secondary_feature_url',
						'edition_secondary_feature_background',
						'edition_tertiary_feature_content');
						
	foreach($edition_fields as $field){
		${$field} = get_field($field);
	}
	
	$post_data = get_post($edition_primary_feature);
	//$content_raw = get_post($edition_primary_feature);
	//$content = wp_trim_words($content_raw, 40, '<a href="'. get_permalink() .'"> ...Read More</a>' );
	//var_dump($content);
	if(has_post_thumbnail($edition_primary_feature)):
  		$primary_feature_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($edition_primary_feature), 'large' ); 
  	endif;
  	
?>

      	<div class='row'>
			<div class='large-12 columns'>
				<div id='post_single'>
					<div class='large-8 columns'>
						<div id='primary_feature'>
							<div id='image' style='background: url(<?=$primary_feature_image_url[0]?>) no-repeat center center; background-size: cover;' ></div>
							<div id='content'>
								<h2><a href="<?=$post_data->post_permalink?>"><?=$post_data->post_title?></a></h2>
								<?=$post_data->post_excerpt?>
							</div>
						</div>
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
									'post_type' => 'post',
									'category_name' => $edition_title
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
				</div>
			</div>
			<div class='clear_both'></div>
		</div>
      
     
    	
    	
<?php get_footer(); ?>