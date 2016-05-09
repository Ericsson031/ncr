<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package razsodisce
 */
?>

<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package razsodisce
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php
global $dir;
$dir = get_template_directory_uri();
?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="<?php echo $dir; ?>/favicon.ico" />

<?php wp_head(); ?>

<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,800,700,500&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=PT+Serif+Caption:400,400italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>

<body <?php body_class(); ?>>
<div class="container">
	<div id="content" class="not-found">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404">
				<header class="page-header">
					<h1 class="page-title">404<img src="<?php echo $dir; ?>/img/404logo.png"></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					Iskana stran ne obstaja ali pa je bila premaknjena. Vrnite se na <a href="/" class="404-homepage">začetno stran.</a>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
	</div><!-- #content -->
</div><!-- .container -->

<?php wp_footer(); ?>

</body>
</html>
