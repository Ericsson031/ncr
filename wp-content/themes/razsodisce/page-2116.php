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
					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->

			<?php endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<script>
		jQuery(document).ready(function($){
			$.datepicker.setDefaults({
				closeText: "Zapri",
				prevText: "&#x3C;Prejšnji",
				nextText: "Naslednji&#x3E;",
				currentText: "Trenutni",
				monthNames: [ "Januar","Februar","Marec","April","Maj","Junij",
				"Julij","Avgust","September","Oktober","November","December" ],
				monthNamesShort: [ "Jan","Feb","Mar","Apr","Maj","Jun",
				"Jul","Avg","Sep","Okt","Nov","Dec" ],
				dayNames: [ "Nedelja","Ponedeljek","Torek","Sreda","Četrtek","Petek","Sobota" ],
				dayNamesShort: [ "Ned","Pon","Tor","Sre","Čet","Pet","Sob" ],
				dayNamesMin: [ "Ne","Po","To","Sr","Če","Pe","So" ],
				weekHeader: "Teden",
				dateFormat: "yy-mm-dd",
				firstDay: 1,
				isRTL: false,
				showMonthAfterYear: false,
				yearSuffix: ""
			});
			$( "#datepicker" ).datepicker();

			$('.wpcf7-form .upload-files input[type=file]').change(function(){
				var extension = $(this).val().split('.').pop();
				var fileName = $(this).val().split('\\').pop();
				console.log(fileName);
				if ($.inArray(extension, ['doc', 'docx']) != -1) {
					var icon = '<img src="/wp-content/themes/razsodisce/img/icon-doc.png">';
				} else if ($.inArray(extension, ['pdf']) != -1) {
					var icon = '<img src="/wp-content/themes/razsodisce/img/icon-pdf.png">';
				}

				var fileNum = $(this).attr('name');

				var fileExtID = '#' + fileNum + '-ext';
				var fileFilenameID = '#' + fileNum + '-filename';
				var fileRemoveID = '#' + fileNum + '-remove';

				$(fileExtID).append(icon);
				$(fileFilenameID).append(fileName);
				$(fileRemoveID).append('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>');

				$(this).css('display', 'none');
			});

			$('.wpcf7-form .upload-files .add-new').click(function(){
				$(this).html('Dodate lahko največ 2 datoteki.');
			});

			$('#file-01-remove').click(function(){
				$('#file-01-ext').empty();
				$('#file-01-filename').empty();
				$('#file-01-remove').empty();

				$('.wpcf7-form .upload-files .add-new').html('dodaj / .DOC ali .PDF<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>');
				var inputField = $('.wpcf7-form .upload-files .file-01 input[type=file]');
				inputField.css('display', 'block');
				inputField.wrap('<form>').closest('form').get(0).reset();
				inputField.unwrap();
			});

			$('#file-02-remove').click(function(){
				$('#file-02-ext').empty();
				$('#file-02-filename').empty();
				$('#file-02-remove').empty();

				$('.wpcf7-form .upload-files .add-new').html('dodaj / .DOC ali .PDF<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>');
				var inputField = $('.wpcf7-form .upload-files .file-02 input[type=file]');
				inputField.css('display', 'block');
				inputField.wrap('<form>').closest('form').get(0).reset();
				inputField.unwrap();
			});
		});
	</script>

<?php
get_footer();
