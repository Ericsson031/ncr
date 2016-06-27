<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package razsodisce
 */

get_header(); 
get_template_part( 'template-parts/content', get_post_format() );
get_footer();
?>