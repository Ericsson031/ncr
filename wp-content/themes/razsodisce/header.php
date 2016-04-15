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

?><!DOCTYPE html>
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
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'razsodisce' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="row">
			<div class="col-sm-8">
				<div class="site-branding">
					<a id="site-title" href="/" rel="home">Novinarsko častno razsodišče</a>	
					<a id="site-logo" href="/" rel="home">
						<img src="<?php echo $dir; ?>/img/logo.png">
					</a>
				</div>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation col-sm-16" role="navigation">
				<div class="row">
					<div class="col-sm-24">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'razsodisce' ); ?></button>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-15 site-quote">
						<div class="site-quote-text">
							"Vsak novinar vreden tega naziva, bo dosledno spoštovanje novinarskega kodeksa razumel kot svojo dolžnost. Ko gre za profesijo, bo novinar - upoštevaje zakonodajo - spoštoval sodbe poklicnih kolegov in zavrnil vmešavanje vlade in drugih."<br>
							<span style="float: right;">Svetovni kongres IFJ</span>
						</div>
					</div>
					<div class="col-sm-8 col-sm-offset-1 site-search">
						<?php echo search_form(); ?>
					</div>
				</div>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->
	<?php echo custom_breadcrumbs(); ?>

	<div id="content" class="site-content">
