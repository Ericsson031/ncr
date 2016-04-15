<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package razsodisce
 */

?>
	</div><!-- #content -->
	<div class="site-footer row">
		<aside class="col-sm-18">
			<footer class="row" role="contentinfo">
				<div class="col-sm-9">
					<a href="/">
						<img src="<?php echo get_template_directory_uri(); ?>/img/logo-black.png" class="site-info-logo">
					</a>
					<div class="site-info-txt">
						<b>Novinarsko častno razsodišče</b><br>
						<br>
						Društvo novinarjev Slovenije
					</div>
				</div>
				<div class="col-sm-6">
					<address class="site-info-address">
						Vošnjakova 8, Ljubljana
					</address>
				</div>
				<div class="col-sm-5 site-partner1">
					<a href="http://www.sindikat-novinarjev.si" target="_new">
						<img src="<?php echo get_template_directory_uri(); ?>/img/sns-logo-black.png">
					</a>
				</div>
				<div class="col-sm-4 site-partner2">
					<a href="http://www.novinar.com" target="_new">
						<img src="<?php echo get_template_directory_uri(); ?>/img/dns-logo-black.png">
					</a>
				</div>
			</footer>
		</aside>
	</div><!-- .site-footer -->
</div><!-- .container -->

<?php wp_footer(); ?>

</body>
</html>
