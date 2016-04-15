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

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post(); ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="row">
						<div class="col-sm-24">
							<header class="entry-header">
								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							</header><!-- .entry-header -->
						</div>
					</div>
					<div class="entry-content row">
						<div class="col-sm-7">
							<?php the_content(); ?>
							<div class="padding-20 yellow">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2768.7227704272573!2d14.501989269920589!3d46.056627685091634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4765329f005e0afb%3A0x2d0b467fae351f9d!2sVo%C5%A1njakova+ulica+8%2C+1000+Ljubljana!5e0!3m2!1sen!2ssi!4v1457688093917" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
							</div>
						</div>
						<div class="col-sm-15 col-sm-offset-2">
							<?php the_post_thumbnail(); ?>
						</div>
					</div>
				</article><!-- #post-## -->

			<?php endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
