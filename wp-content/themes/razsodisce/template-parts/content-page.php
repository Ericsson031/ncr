<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package razsodisce
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title">
		<?php // if the page parent is kodeks, that we display this custom title
			$query = new WP_Query(array('post_type' => 'page', 'post_parent' =>1866, 'numberposts' => 1, 'order'=>'asc', 'orderby' => 'date',));
			$posts = $query->get_posts();

			$is_kodeks = "1866"==wp_get_post_parent_id( get_the_id());
			
			if(current_kodeks()->ID==get_the_id())
				echo "Kodeks novinarjev Slovenije";
			else{
				if($is_kodeks) echo "Kodeks novinarjev Slovenije - ";
				the_title();
			}
			?> </h1>
			
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'razsodisce' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'razsodisce' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
