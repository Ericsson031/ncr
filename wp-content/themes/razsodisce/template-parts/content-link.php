<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package razsodisce
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'razsodisce' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
    <div class="container clearfix">
        <header class="entry-title">
        <?php if ( is_single() ) { ?>
            <h1><?php the_title(); ?></h1>
        <?php } else { ?>
        <?php $myLink = get_my_url(); ?>
            <h2>
                <a href="<?php echo $myLink; ?>"><?php echo the_title(); ?></a>
            </h2>
            <p>This is an external link and will take you to a new page.</p>
        <?php } ?>
 
            <?php et_fable_post_meta(); ?>
        </header>
    </div> <!-- .container -->
</article> <!-- .entry-->


	</div><!-- .page-content -->
</section><!-- .no-results -->
