<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package razsodisce
 */

get_header(); ?>

		<div id="primary">
			<div class="row">
				<main id="main" class="site-main col-sm-18" role="main">
					<div class="content-area-index">
						<div class="row">
							<div class="col-sm-11 col-lg-9">
								<div class="content-area-index-title">
									Kako se pritožiti?
								</div>
								<div class="content-area-index-body">
									Če se želite pritožiti zaradi novinarskega prispevka, ki po vašem mnenju krši določila Kodeksa novinarjev Slovenije je običajno najbolje o tem najprej pisno obvestiti novinarja, avtorja članka (radijske ali tv oddaje ipd.) in urednika oz. odgovornega urednika medija, v katerem je bil ta izdelek objavljen. To je običajno najhitrejši način, če hočete doseči popravek ali opravičilo za netočnosti ali druga dejanja novinarja, ki po vašem mnenju niso v skladu z etičnimi standardi. Če se novinar in/ali urednik ne odzove(ta) na vaše opozorilo, če vam odziv ne ugaja ali če menite, da pritožba mediju ni smiselna, nam pišite, takoj ko je mogoče.
								</div>
								<div class="content-area-index-more">
									<a href="#">VEČ</a>
								</div>
							</div>
							<div class="col-sm-13 col-lg-13 col-lg-offset-2">
								<div class="statistics-title">
									Ugotovljene kršitve v letu 2015
								</div>

								<img id="statistics-img" src="<?php echo get_template_directory_uri(); ?>/img/statistics.png">

								<div class="statistics-body">
									Vir: Statistika dela NČR za leto 2015
								</div>

								<a href="/index.php/vlozite-pritozbo" class="vlozite-pritozbo">
									Vložite pritožbo
									<div></div>
								</a>
							</div>
						</div>
					</div>


				</main><!-- #main -->
				<aside id="secondary" class="widget-area col-sm-6" role="complementary">
					<?php
						$r = new WP_Query( apply_filters( 'widget_posts_args', array(
							'posts_per_page'      => 4,
							'no_found_rows'       => true,
							'post_status'         => 'publish',
							'ignore_sticky_posts' => true
						) ) );

						if ($r->have_posts()) :
						?>
						<div class="widget-title">
							Zadnje razsodbe
						</div>
						<ul>
						<?php while ( $r->have_posts() ) : $r->the_post(); ?>
							<li>
								<span class="post-date"><?php echo get_the_date('j/n/y'); ?></span>
								<a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
							</li>
						<?php endwhile; ?>
						</ul>
						<?php
						// Reset the global $the_post as this query will have stomped on it
						wp_reset_postdata();

						endif;
					?>
					<div class="widget-more">
						Več
					</div>
				</aside><!-- #secondary -->

			</div>
		</div><!-- #primary -->

<?php get_footer(); ?>
