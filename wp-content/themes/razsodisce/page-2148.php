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

global $dir;

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post(); ?>
				
				<?php $titles = children_pages($post->ID); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="row">
						<div class="col-sm-24">
							<header class="entry-header">
								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							</header><!-- .entry-header -->
						</div>
					</div>
					<div class="entry-content row">
						<div class="col-sm-6">
							<?php the_content(); ?>
						</div>
						<div class="col-sm-8">
							<div class="row">
								<div class="col-sm-9 tile-large-table">
									<div class="help-txt">
										Izberite datoteko, s klikom na ikono odprete dokument v ločenem oknu. Datoteko lahko tudi prenesete na svoj računalnik.
									</div>
								</div>
								<div class="col-sm-15">
									<div class="tile tile-large purple">
										<h2><?php echo $titles[0]; ?></h2><br>
										<div class="dl-links">
											<a href="#" class="dl-pdf">
												<img src="<?php echo $dir; ?>/img/icon-pdf.png">
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="row">
								<div class="col-sm-12">
									<div class="tile purple">
										<h2><?php echo $titles[1]; ?></h2>
										<div class="dl-links">
											<a href="#" class="dl-pdf">
												<img src="<?php echo $dir; ?>/img/icon-pdf.png">
											</a>
										</div>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="tile purple">
										<h2><?php echo $titles[2]; ?></h2>
										<div class="dl-links">
											<a href="#" class="dl-pdf">
												<img src="<?php echo $dir; ?>/img/icon-pdf.png">
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="tile purple">
										<h2><?php echo $titles[3]; ?></h2>
										<div class="dl-links">
											<a href="#" class="dl-pdf">
												<img src="<?php echo $dir; ?>/img/icon-pdf.png">
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</article><!-- #post-## -->

			<?php endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
