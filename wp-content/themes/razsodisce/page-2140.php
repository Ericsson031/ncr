<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package razsodisce
 */

get_header();

get_sidebar('search'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main col-sm-18" role="main">

			<?php
			$args = array(
				'cat' => 2,
				'posts_per_page' => -1,
				'post_status' => 'publish'
			);

			$query = new WP_Query($args); ?>

			<?php
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<?php the_time('j/n/y'); ?>
						</header>
						<a href="<?php the_permalink(); ?>" class="entry-content">
							<?php the_title(); ?>
						</a>
					</article>
				<?php
				}

			} else {
				echo 'Nobena razsodba še ni bila sprejeta.';
			}

			wp_reset_postdata();

			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
