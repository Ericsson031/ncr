<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package razsodisce
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<div class="search">
			<form>
				<input type="text" name="oseba" id="oseba" placeholder="Vpiši akterja" value="<?php echo get_query_var('oseba'); ?>">
				<input type="text" name="medij" id="medij" placeholder="Vpiši medij" value="<?php echo get_query_var('medij'); ?>">
				<span>
				Vpiši člene kršitve kodeksa
				<input type="text" name="clen" id="clen" value="<?php echo get_query_var('clen'); ?>">
				</span>
				<span> Člene ločujte z vejicami (3,4)</span>
				
				<span>*členi kodeksov po letih se ne ujemajo</span>
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
				<input type="submit" value="Išči">
				<input type="hidden" name="y" value="">
			</form>
		</div>
		
		

		<?php
		if ( have_posts() ) : ?>
			<div>
				<?php /* yearly pagination */
				$years = array();
				while ( have_posts() ) : the_post(); 
				$years[]=get_the_time('Y');
				endwhile; 
				$years=array_unique($years);
				$current_year=get_query_var('y', $years[0]);
				if($current_year=="")
					$current_year=$years[0];
				
				foreach($years as $year):?>
					<a href="<?php echo add_query_arg( 'y', $year);?>"><?php echo $year; ?></a>
				<?php endforeach; ?>
			</div>

			<header class="page-header">
				
				<?php //the_archive_description( '<h1 class="page-title">', get_query_var('y', $years[0]).'</h1>' ); 
							
				?>
			<h1><?php if (is_category( ))
						echo $cat->description." ".$current_year;
					  else
						echo "Rezultati iskanja ".$current_year;?>
			</h1>
			</header><!-- .page-header -->
			<?php
			/* Start the Loop */
			rewind_posts();
			while ( have_posts() ) : the_post();
				// display only posts that match the selected year
				if(get_the_time('Y')== $current_year)
					get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :
			echo "<h2>Iskanje ni vrnilo nobenih rezultatov<h2>";
			//get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
