<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package razsodisce
 */

get_header(); ?>

	<section id="primary" class="content-area search-area">
		<main id="main" class="site-main row" role="main">

			<div class="col-sm-5">
				<h2>Napredno iskanje</h2>
				<div class="search">
					<form>
						<input type="text" name="oseba" id="oseba" placeholder="Vpiši akterja" value="<?php echo get_query_var('oseba'); ?>">
						<input type="text" name="medij" id="medij" placeholder="Vpiši medij" value="<?php echo get_query_var('medij'); ?>">
						<div style="display: inline-block;">
							<span style="float: left; font-size: 14px; line-height: 15px;">Vpiši člene* <br> kršitve kodeksa</span>
						<input type="text" name="clen" id="clen" value="<?php echo get_query_var('clen'); ?>" style="width: 30%; margin: 0px; float: right;">
						</div>
						<div class="help-text">Člene ločujte z vejicami (3,4)</div>
						
						<div class="help-text">*členi kodeksov po letih se ne ujemajo</div>
						<ul>
							<?php $kodeksi=get_children(array('post_parent' => 1866, 'order' => 'DESC', 'post_type'=>'page'));
							foreach ($kodeksi as $kodeks):?>
								<li>
									<a href="<?php $kodeks->guid ?>">Kodeks <?php echo $kodeks->post_title;?></a>
								</li>
							<?php endforeach; ?>
						</ul>
						<?php if (is_category( )) {
							  $cat = get_query_var('cat');
							  $cat = get_category ($cat);
							 }?>
						
						<select name="category" id="category">
							<option value="">Status razsodbe</option>
							<option value="prekinjen_primer" <?php if ("prekinjen_primer"==$cat->slug) echo "selected"; ?>>
							Prekinjen primer</option>
							<option value="razsodba" <?php if ("razsodba"==$cat->slug) echo "selected"; ?>>
							Sprejeta razsodba</option>
						</select>
						<input type="submit" value="Išči" style="float: right;">
						<input type="hidden" name="y" value="">
					</form>
				</div>
			</div>
			<div class="col-sm-17 col-sm-offset-2">
				<header class="page-header row">
					<?php //the_archive_description( '<h1 class="page-title">', get_query_var('y', $years[0]).'</h1>' ); 
						/* yearly pagination */
						$years = array();
						while ( have_posts() ) : the_post(); 
						$years[]=get_the_time('Y');
						endwhile; 
						$years=array_unique($years);
						$current_year=get_query_var('y', $years[0]);
						if($current_year=="")
							$current_year=$years[0];	
					?>
					<h2 class="col-sm-7"><?php if (is_category( ))
								echo $cat->description." ".$current_year;
							  else
								echo "Rezultati iskanja ".$current_year;?>
					</h2>
					<div class="col-sm-16 col-sm-offset-1 previous-years">
						<div>Pretekle razsodbe po letih</div>
						<div class="slider-years">
							<?php foreach($years as $year):?>
								<div class="slide">
									<a href="<?php echo add_query_arg( 'y', $year);?>"><?php echo $year; ?></a>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</header><!-- .page-header -->
				<div class="two-columns">
					<?php
						if ( have_posts() ) :
							/* Start the Loop */
							rewind_posts();
							while ( have_posts() ) : the_post();
								// display only posts that match the selected year
								if(get_the_time('Y') == $current_year) ?>

									<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
										<header class="entry-header">
											<?php the_time('d.m.Y'); ?>
										</header>
										<a href="<?php the_permalink(); ?>" class="entry-content">
											<?php the_title(); ?>
										</a>
									</article>

							<?php endwhile;

							the_posts_navigation();

						else :
							echo "<h2>Iskanje ni vrnilo nobenih rezultatov<h2>";
							//get_template_part( 'template-parts/content', 'none' );

						endif;
					?>
				</div>
			</div>

		</main><!-- #main -->
	</section><!-- #primary -->
	<script type="text/javascript">
		jQuery(document).ready(function($){
			$('#category').selectmenu({width : '100%'});
			$('.slider-years').bxSlider({
				infiniteLoop: false,
				hideControlOnEnd: true,
				slideWidth: 130,
				minSlides: 2,
				maxSlides: 4,
				moveSlides: 1,
				slideMargin: 0,
				pager: false
			});
		});
	</script>

<?php
get_footer();
