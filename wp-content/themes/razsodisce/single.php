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
				$content = preg_split("/Sklep:/i", get_the_content());

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
									<?php $file = get_field("pdf_verzija_vsebine", $post->ID);
									    if(!empty($file)): ?>
									<div class="entry-sidebar-sklep">Tiskana verzija</div>
											<a href="<?php echo $file; ?>" 
											
											<?php $filetype = "";
											if (strpos($file, '.pdf') !== false)
												$filetype="pdf";
											else
												$filetype="doc"; ?>
											class="dl-<?php echo $filetype ?>">

												<img src="<?php echo $dir; ?>/img/icon-<?php echo $filetype ?>.png">
											</a>
                                            <?php echo array_pop(explode("/", $file)); ?>									
									
									<?php endif ?>
											
									<div class="entry-sidebar-sklep">Gradivo primera</div>
									<?php $kodeks = get_valid_kodeks();?>
									<ul class="entry-sidebar-kodeks">
										<li>
											<a href="<?php echo $kodeks->guid; ?>">Novinarski kodeks <?php echo $kodeks->post_title; ?></a>
										</li>
									</ul>
									<div class="entry-sidebar-sklep">Obravnavani členi</div>
										<ul class="entry-cleni-sklep">
											
											<?php
											
											$term_list = wp_get_post_terms($post->ID, 'clen');
											foreach ($term_list as $term) { ?>
												<li data-toggle="tooltip" data-placement="top" title="<?php echo get_clen_content($term->name); ?>">
													<a href="<?php echo "/?".$term->taxonomy."=".$term->slug?>"><?php echo $term->name; ?></a>
												</li>
											<?php }	?>
										</ul>
									<div class="entry-sidebar-sklep">Medij</div>
										<ul class="entry-osebe-sklep">
											<?php
											$term_list = wp_get_post_terms($post->ID, 'medij');
											foreach ($term_list as $term) { ?>
												<li><a href="<?php echo "/?".$term->taxonomy."=".$term->slug?>"><?php echo $term->name; ?></a></li><br>
											<?php }	?>
										</ul>
										
									<div class="entry-sidebar-sklep">Akterji</div>
										<ul class="entry-osebe-sklep">
											<?php
											$term_list = wp_get_post_terms($post->ID, 'oseba');
											foreach ($term_list as $term) { ?>
												<li><a href="<?php echo "/?".$term->taxonomy."=".$term->slug?>"><?php echo $term->name; ?></a></li><br>
											<?php }	?>
										</ul>
									<div class="entry-sidebar-sklep">Povezane vsebine</div>
									<ul class="entry-povezave-sklep">
										<li><a href="/o-ncr/podlaga-za-delo/novinarski-kodeks">Novinarski kodeks</a></li>
										<li><a href="/o-ncr/podlaga-za-delo/pravilnik-o-delu-novinarskega-castnega-razsodisca">Pravilnik o delu NČR</a></li>
										<li><a href="/o-ncr/podlaga-za-delo/iz-statutov-dns-in-sns">Iz statutov DNS in SNS</a></li>
										<li><a href="/o-ncr/podlaga-za-delo/listina-o-nedopustnosti-prikritega-oglasevanja-in-zlorabe-novinarskega-prostora">Listina - prikrito oglaševanje</a></li>
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
		<script type="text/javascript">
			jQuery(function ($) {
				$('[data-toggle="tooltip"]').tooltip()
			})
		</script>
	</div><!-- #primary -->

<?php
get_footer();
