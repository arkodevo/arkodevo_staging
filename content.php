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

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php
			echo '<p class="byline author">';
			echo __( 'By', 'foundationpress' ) .' <a href="'. get_author_posts_url( get_the_author_meta( 'ID' ) ) .'" rel="author" class="fn">'. get_the_author_nickname() .'</a> | ';
			echo '<time class="updated" datetime="'. get_the_time( 'c' ) .'">'. sprintf( __( '%s', 'foundationpress' ), get_the_date()) .'</time>';	
			echo '</p>';
		?>
	</header>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading...', 'foundationpress' ) ); ?>
	</div>
	<hr />
</article>