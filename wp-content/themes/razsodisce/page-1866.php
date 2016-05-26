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
		<main id="main" class="site-main row" role="main">
			<div class="col-md-19">

			<?php
			query_posts(array('post_type' => 'page', 'post_parent' =>1866, 'numberposts' => 1, 'order'=>'desc'));
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
			</div>
			<div class="col-md-5">
				<div class="entry-sidebar-sklep">Kodeksi po letih</div>
					<ul class="entry-sidebar-kodeks">
						<?php foreach(get_pages(array('child_of' =>1866, 'sort_order'=>'desc')) as $kodeks):?>
						<li>
							<a href="<?php echo $kodeks->guid;?>">Kodeks <?php echo $kodeks->post_title;?></a>
						<?php endforeach; ?>
						</li>
					</ul>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
