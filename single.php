<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

	get_header(); 

	$category 		= get_the_category();
  	$category_slug 	= $category[0]->category_nicename;
  	$edition_id 	= $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$category_slug'");
  	
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
		<div id='post_single'>
			<div class='large-8 columns'>
				<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
					<?php if(function_exists('bcn_display')){ bcn_display(); }?>
				</div>
				<?php do_action( 'foundationpress_before_content' ); ?>
			
				<?php while ( have_posts() ) : the_post(); ?>
					<?php $post_id = get_the_ID(); ?>
					<?php wpb_set_post_views(get_the_ID()); ?>
					<article <?php post_class() ?> id="post-<?php echo $post_id; ?>">
						<header>
							<h1 class="entry-title"><?php the_title(); ?></h1>
							<?php
								echo '<p class="byline author">';
								echo __( 'By', 'foundationpress' ) . ' ' . get_the_author_nickname() .' | ';
								echo '<time class="updated" datetime="'. get_the_time( 'c' ) .'">'. sprintf( __( '%s', 'foundationpress' ), get_the_date()) .'</time>';	
								echo '</p>';
							?>
						</header>
						<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
						<div class="entry-content">
			
						<?php if ( has_post_thumbnail() ) :
							
							$thumb_id 	= get_post_thumbnail_id($post->ID);
							$thumb 		= wp_get_attachment_image_src($thumb_id, 'large');
							$url 		= $thumb['0'];
							$alt 		= get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
							
						?>
							
							<div id="feature_image"><img src="<?=$url?>" alt="<?=$alt?>" width="100%" class="alignnone"></div>
							
						<?php endif; ?>
						
						<?php the_content(); ?>
						</div>
						<footer>
							<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
						</footer>
						<?php do_action( 'foundationpress_post_before_comments' ); ?>
						<?php comments_template(); ?>
						<?php do_action( 'foundationpress_post_after_comments' ); ?>
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