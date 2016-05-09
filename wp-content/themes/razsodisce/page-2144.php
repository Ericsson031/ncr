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
		<main id="main" class="site-main row" role="main">

			<?php

			$year = (int)get_query_var('leto', 0);
			$current_year = date('Y');

			$args = array(
				'cat' => 4,
				'posts_per_page' => -1,
				'post_status' => 'publish',
				'year'			=> $year
			);

			$query = new WP_Query($args); ?>

			<div class="col-sm-6">
				<div class="select-arhiv-title">Arhiv novic</div>
				<form action="" method="get">
					<select id="yearSelect" name='leto' onchange='this.form.submit()'>
						<option value="0">Leto objave</option>
						<?php
							for ($i=$current_year; $i > 2001; $i--) { 
								echo '<option';
								if($year == $i) {
									 echo ' selected="selected"';
								}
								echo '>' . $i . '</option>';
							}
						?>
					</select>
				</form>
			</div>
			<div class="col-sm-18">
				<div class="two-columns">
					<?php
					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<header class="entry-header">
									<?php the_time('d.m.Y'); ?>
								</header>
								<a href="<?php the_permalink(); ?>" class="entry-content">
									<?php the_title(); ?>
								</a>
							</article>
						<?php
						}

					} else {
						echo 'Nobenih objav za leto ' . $year;
					}

					wp_reset_postdata();

					?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	<script type="text/javascript">
		jQuery(function($) {
			$('#yearSelect').selectmenu({width : '80%'});
			$('#yearSelect').on('selectmenuchange', function() {
				this.form.submit(); 
			});
		});
	</script>

<?php
get_footer();
