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
				
				<?php $children = children_pages($post->ID); ?>

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
										Izberite vrsto datoteke, s klikom na ikono odprete dokument v ločenem oknu. Datoteko lahko tudi prenesete na svoj računalnik.
									</div>
								</div>
								<div class="col-sm-15">
									<a href="<?php echo $children[0]->guid;?>">
										<div class="tile tile-large orange">
											<h2><?php echo $children[0]->post_title; ?></h2><br>
											<div class="dl-links">
												<?php
													  $file = get_field("pdf_verzija_vsebine", get_latest_kodeks()->ID);
													  if(!empty($file)): ?>
												<a href="<?php echo $file; ?>" class="dl-pdf">
													<img src="<?php echo $dir; ?>/img/icon-pdf.png">
												</a>
												<?php endif ?>
										</div>
									</div>
									</a>
								</div>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="row">
								<div class="col-sm-12">
									<a href="<?php echo $children[1]->guid;?>">
										<div class="tile orange">
											<h2><?php echo $children[1]->post_title; ?></h2>
											<div class="dl-links">
												<?php $file = get_field("pdf_verzija_vsebine", $children[1]->ID);
													  if(!empty($file)): ?>
												<a href="<?php echo $file; ?>" class="dl-pdf">
													<img src="<?php echo $dir; ?>/img/icon-pdf.png">
												</a>
												<?php endif ?>
											</div>
										</div>
									</a>
								</div>
								<div class="col-sm-12">
									<a href="<?php echo $children[2]->guid;?>">
										<div class="tile orange">
											<h2><?php echo $children[2]->post_title; ?></h2>
											<div class="dl-links">
												<?php $file = get_field("pdf_verzija_vsebine", $children[2]->ID);
													  if(!empty($file)): ?>
												<a href="<?php echo $file; ?>" class="dl-pdf">
													<img src="<?php echo $dir; ?>/img/icon-pdf.png">
												</a>
												<?php endif ?>
											</div>
										</div>
									</a>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<a href="<?php echo $children[3]->guid;?>">
										<div class="tile orange">
											<h2><?php echo $children[3]->post_title; ?></h2>
											<div class="dl-links">
												<?php $file = get_field("pdf_verzija_vsebine", $children[3]->ID);
													  if(!empty($file)): ?>
												<a href="<?php echo $file; ?>" class="dl-pdf">
													<img src="<?php echo $dir; ?>/img/icon-pdf.png">
												</a>
												<?php endif ?>
											</div>
										</div>
									</a>
								</div>
								<div class="col-sm-12">
									<a href="<?php echo $children[4]->guid;?>">
										<div class="tile orange">
											<h2><?php echo $children[4]->post_title; ?></h2>
											<div class="dl-links">
												<?php $file = get_field("pdf_verzija_vsebine", $children[4]->ID);
													  if(!empty($file)): ?>
												<a href="<?php echo $file; ?>" class="dl-pdf">
													<img src="<?php echo $dir; ?>/img/icon-pdf.png">
												</a>
												<?php endif ?>
											</div>
										</a>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<a href="<?php echo $children[5]->guid;?>">
										<div class="tile orange">
											<h2><?php echo $children[5]->post_title; ?></h2>
											<div class="dl-links">
												<?php $file = get_field("pdf_verzija_vsebine", $children[5]->ID);
													  if(!empty($file)): ?>
												<a href="<?php echo $file; ?>" class="dl-pdf">
													<img src="<?php echo $dir; ?>/img/icon-pdf.png">
												</a>
												<?php endif ?>
											</div>
										</div>
									</a>
								</div>
								<div class="col-sm-12">
									<a href="<?php echo $children[6]->guid;?>">
										<div class="tile orange">
											<h2><?php echo $children[6]->post_title; ?></h2>
											<div class="dl-links">
												<?php $file = get_field("pdf_verzija_vsebine", $children[6]->ID);
													  if(!empty($file)): ?>
												<a href="<?php echo $file; ?>" class="dl-pdf">
													<img src="<?php echo $dir; ?>/img/icon-pdf.png">
												</a>
												<?php endif ?>
											</div>
										</div>
									</a>
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
