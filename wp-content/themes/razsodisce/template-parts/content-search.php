<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package razsodisce
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php echo get_the_date(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>

	
		<?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?>


	</header><!-- .entry-header -->

	<!--
	<div class="entry-summary">
		<?php //the_excerpt(); ?>
	</div><!-- .entry-summary -->
	
	<!--
	<footer class="entry-footer">
		<?php //razsodisce_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
