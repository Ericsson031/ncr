<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package razsodisce
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main row" role="main">

			<?php
			while ( have_posts() ) : the_post(); ?>

				<?php
				$content = explode("Sklep:", get_the_content());

				if(count($content) == 2) {
				?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="col-sm-12">
							<header class="entry-header">
								<div class="entry-meta">
									<?php the_date(); ?>
								</div><!-- .entry-meta -->
								<?php the_title( '<h1 class="entry-title-sklep">', '</h1>' ); ?>
							</header><!-- .entry-header -->

							<div class="entry-content">
								<?php echo apply_filters('the_content', $content[0]); ?>
							</div><!-- .entry-content -->
						</div>
						<div class="col-sm-12">
							<div class="row">
								<div class="col-sm-12">
									<div class="entry-content">
										<div class="entry-sklep">SKLEP:</div>
										<?php echo apply_filters('the_content', $content[1]); ?>
									</div><!-- .entry-content -->
								</div>
								<div class="col-sm-11 col-sm-offset-1">
									<div class="entry-sidebar-sklep">Gradivo primera</div>
									<div class="entry-sidebar-sklep">Obravnavani členi</div>
										<ul class="entry-cleni-sklep">
											
											<?php
											
											$term_list = wp_get_post_terms($post->ID, 'clen', array("fields" => "names"));
											foreach ($term_list as $term) { ?>
												<li title="<?php echo get_clen_content($term); ?>">
													<?php echo $term; ?>
												</li>
											<?php }	?>
										</ul>
									<div class="entry-sidebar-sklep">Akterji</div>
										<ul class="entry-osebe-sklep">
											<?php
											$term_list = wp_get_post_terms($post->ID, 'oseba', array("fields" => "names"));
											foreach ($term_list as $term) { ?>
												<li><?php echo $term; ?></li><br>
											<?php }	?>
										</ul>
									<div class="entry-sidebar-sklep">Povezane vsebine</div>
									<ul class="entry-povezave-sklep">
										<li><a href="/o-ncr/podlaga-za-delo/novinarski-kodeks">Novinarski kodeks</a></li>
										<li><a href="/o-ncr/podlaga-za-delo/pravilnik-o-delu-novinarskega-castnega-razsodisca">Pravilnik o delu NČR</a></li>
										<li><a href="/o-ncr/podlaga-za-delo/iz-statutov-dns-in-sns">Iz statutov DNS in SNS</a></li>
										<li><a href="/o-ncr/podlaga-za-delo/listina-o-nedopustnosti-prikritega-oglasevanja-in-zlorabe-novinarskega-prostora">Listina - prikrito oglaševanje</a></li>
										<li><a href="/o-ncr/podlaga-za-delo/zakon-o-medijih">Zakon o medijih</a></li>
										<li><a href="/o-ncr/podlaga-za-delo/kodeksi-medijskih-his">Kodeksi medijskih hiš</a></li>
									</ul>

									<a href="#" class="entry-sidebar-arhiv">Arhiv razsodb</a>
								</div>
						</div>
					</article><!-- #post-## -->

					<?php /*
					$kodeks=get_valid_kodeks();
					?>
					<a href="<?php echo get_permalink($kodeks); ?>">
						Kodeks po katerem je bila sprejeta razsodba - <?php echo $kodeks->post_title ?>
					</a>
					
					<strong>
					<?php
					/* primer izpisa vsebine poljubnega člena za kodeks v veljavi pri tej razsodbi*/
					/*$clen_slug='3-clen';
					echo get_clen_content($clen_slug);
					*/ ?>

				<?php } else { ?>

					<div class="col-sm-6">
						<a href="/delo-ncr/objave" class="back-link">< Objave</a>
					</div>
					<div class="col-sm-18">
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header class="entry-header">
								<div class="entry-meta">
									<?php the_date(); ?>
								</div><!-- .entry-meta -->
								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							</header><!-- .entry-header -->

							<div class="entry-content">
								<?php the_content(); ?>
							</div><!-- .entry-content -->

						</article><!-- #post-## -->
					</div>
				<?php } ?>
			<?php endwhile; // End of the loop.
			?>
		
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
