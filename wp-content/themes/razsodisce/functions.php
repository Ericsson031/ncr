<?php
/**
 * razsodisce functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package razsodisce
 */

if ( ! function_exists( 'razsodisce_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function razsodisce_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on razsodisce, use a find and replace
	 * to change 'razsodisce' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'razsodisce', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'razsodisce' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	 
	add_theme_support( 'post-formats', array(
		#'aside',
		#'file',
		#'image',
		#'video',
		#'quote',
		'link',
	) );
	

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'razsodisce_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'razsodisce_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function razsodisce_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'razsodisce_content_width', 640 );
}
add_action( 'after_setup_theme', 'razsodisce_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function razsodisce_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'razsodisce' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'razsodisce_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function razsodisce_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'jquery-ui-css', get_template_directory_uri() . '/css/jquery-ui.min.css' );
	wp_enqueue_style( 'jquery-ui-theme-css', get_template_directory_uri() . '/css/jquery-ui.theme.min.css' );
	wp_enqueue_style( 'jquery-bx-slider', get_template_directory_uri() . '/css/jquery.bxslider.css' );
	wp_enqueue_style( 'razsodisce-style', get_stylesheet_uri() );

	wp_enqueue_script( 'razsodisce-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'razsodisce-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array('jquery'), null, true );
	wp_enqueue_script( 'jquery-bx-slider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), null, true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), null, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'razsodisce_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Custom taxonomies.
 */
function create_clen_taxonomies() {
		$labels = array(
			'name'              => 'Členi',
			'singular_name'     => 'Člen',
			'search_items'      => 'Išči člene',
			'all_items'         => 'Vsi členi',
			'edit_item'         => 'Uredi člen',
			'update_item'       => 'Posodobi člen',
			'add_new_item'      => 'Dodaj novi člen',
			'new_item_name'     => 'Novi člen',
			'menu_name'         => 'Členi',
		);

		$args = array(
			'hierarchical'      => false,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'clen' ),
		);

		register_taxonomy( 'clen', 'post', $args);
	}
add_action( 'init', 'create_clen_taxonomies', 0 );

function create_oseba_taxonomies() {
		$labels = array(
			'name'              => 'Osebe',
			'singular_name'     => 'Oseba',
			'search_items'      => 'Išči osebe',
			'all_items'         => 'Vse osebe',
			'edit_item'         => 'Uredi osebo',
			'update_item'       => 'Posodobi osebo',
			'add_new_item'      => 'Dodaj novo osebo',
			'new_item_name'     => 'Nova oseba',
			'menu_name'         => 'Osebe',
		);

		$args = array(
			'hierarchical'      => false,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'oseba' ),
		);

		register_taxonomy( 'oseba', 'post', $args);
	}
add_action( 'init', 'create_oseba_taxonomies', 0 );

function create_medij_taxonomies() {
		$labels = array(
			'name'              => 'Mediji',
			'singular_name'     => 'Medij',
			'search_items'      => 'Išči medije',
			'all_items'         => 'Vsi mediji',
			'edit_item'         => 'Uredi medij',
			'update_item'       => 'Posodobi medij',
			'add_new_item'      => 'Dodaj nov medij',
			'new_item_name'     => 'Nov medij',
			'menu_name'         => 'Mediji',
		);

		$args = array(
			'hierarchical'      => false,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'medij' ),
		);

		register_taxonomy( 'medij', 'post', $args);
	}
add_action( 'init', 'create_medij_taxonomies', 0 );

update_option( 'siteurl', 'http://dev.razsodisce.org' );
update_option( 'home', 'http://dev.razsodisce.org' );


/**
 * Search form.
 */
function search_form() {
	global $blog_url;
	global $blog_template_url;
	global $s;

	$form = '';

	$form .= '<div class="search-form">';
	$form .=    '<div class="input-group">';
	$form .=         '<form method="get" id="searchform" action="' . $blog_url . '/">';
	$form .=              '<input type="text" class="form-control" value="' . esc_html($s) . '" name="s" id="s" placeholder="Išči">';
	$form .=         '</form>';
	$form .=    '</div>';
	$form .= '</div>';

	return $form;
}


/**
 * Breadcrumbs.
 */
//function custom_breadcrumbs(){return "";}
 

function custom_breadcrumbs() {
	   
	// Settings
	$separator          = '&gt;';
	$breadcrums_id      = 'breadcrumbs';
	$breadcrums_class   = 'breadcrumbs';
	$home_title         = 'Homepage';
	$output				= '';
	  
	// If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
	$custom_taxonomy    = 'product_cat';
	   
	// Get the query & post information
	global $post,$wp_query;
	   
	// Do not display on the homepage
	if ( !is_front_page() ) {
		
		$additional_class = ' purple';
		
		if(!is_search()){
		// Check if parent equals
		if ($post->post_parent)	{
			$ancestors=get_post_ancestors($post->ID);
			$root=count($ancestors)-1;
			$parent = $ancestors[$root];
		} else {
			$parent = $post->ID;
		}		
		
		if ($parent == 2100)
			$additional_class = ' yellow';
		}

		// Build the breadcrums
		$output .= '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . $additional_class . '">';
		   
		// Home page
		//$output .= '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
		//$output .= '<li class="separator separator-home"> ' . $separator . ' </li>';
		   
		if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
			  
			$output .= '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
			  
		} else if ( is_archive() && is_tax() && !is_category() && !is_tag() && !is_search()) {
			  
			// If post is a custom post type
			$post_type = get_post_type();
			  
			// If it is a custom post type display name and link
			if($post_type != 'post') {
				  
				$post_type_object = get_post_type_object($post_type);
				$post_type_archive = get_post_type_archive_link($post_type);
			  
				$output .= '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
				$output .= '<li class="separator"> ' . $separator . ' </li>';
			}
			  
			$custom_tax_name = get_queried_object()->name;
			$output .= '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
			  
		} else if ( is_single() ) {
			  
			// If post is a custom post type
			$post_type = get_post_type();
			  
			// If it is a custom post type display name and link
			if($post_type != 'post') {
				  
				$post_type_object = get_post_type_object($post_type);
				$post_type_archive = get_post_type_archive_link($post_type);
			  
				$output .= '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
				$output .= '<li class="separator"> ' . $separator . ' </li>';
			  
			}
			  
			// Get post category info
			$category = get_the_category();
			 
			if(!empty($category)) {
			  
				// // Get last category post is in
				// $last_category = end(array_values($category));
				  
				// // Get parent any categories and create array
				// $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
				// $cat_parents = explode(',',$get_cat_parents);
				  
				// // Loop through parent categories and store in variable $cat_display
				// $cat_display = '';
				// foreach($cat_parents as $parents) {
				// 	$cat_display .= '<li class="item-cat">'.$parents.'</li>';
				// 	$cat_display .= '<li class="separator"> ' . $separator . ' </li>';
				// }

				$output .= '<li class="item-parent item-parent-2102"><a class="bread-parent bread-parent-2102" href="/delo-ncr/" title="delo NČR">delo NČR</a></li><li class="separator">' . $separator . ' </li><li class="item-2144">Razsodbe</li><li class="separator">' . $separator . ' </li>';
			 
			}
			  
			// If it's a custom post type within a custom taxonomy
			$taxonomy_exists = taxonomy_exists($custom_taxonomy);
			if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
				   
				$taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
				$cat_id         = $taxonomy_terms[0]->term_id;
				$cat_nicename   = $taxonomy_terms[0]->slug;
				$cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
				$cat_name       = $taxonomy_terms[0]->name;
			   
			}
			  
			// Check if the post is in a category
			if(!empty($last_category)) {
				$output .= $cat_display;
				$output .= '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
				  
			// Else if post is in a custom taxonomy
			} else if(!empty($cat_id)) {
				  
				$output .= '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
				$output .= '<li class="separator"> ' . $separator . ' </li>';
				$output .= '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
			  
			} else {
				  
				$output .= '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
				  
			}
			  
		} else if ( is_category() ) {
			   
			// Category page
			$category = get_category(get_query_var( 'cat' ));
			if(!empty($category->description))
				$name = $category->description;
			else
				$name = $category->name;
			$output .= '<li class="item-parent item-parent-2102">Delo NČR</li><li class="separator">' . $separator . ' </li><li class="item">'.$name.'</li>';
			   
		} else if ( is_page() ) {
			   
			// Standard page
			if( $post->post_parent ){
				   
				// If child page, get parents 
				$anc = get_post_ancestors( $post->ID );
				   
				// Get parents in the right order
				$anc = array_reverse($anc);
				$parents = '';
				   
				// Parent page loop
				foreach ( $anc as $ancestor ) {
					$parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
					$parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
				}
				   
				// Display parent pages
				$output .= $parents;
				   
				// Current page
				$output .= '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
				   
			} else {
				   
				// Just display current page if not parents
				$output .= '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
				   
			}
			   
		} else if ( is_tag() ) {
			   
			// Tag page
			   
			// Get tag information
			$term_id        = get_query_var('tag_id');
			$taxonomy       = 'post_tag';
			$args           = 'include=' . $term_id;
			$terms          = get_terms( $taxonomy, $args );
			$get_term_id    = $terms[0]->term_id;
			$get_term_slug  = $terms[0]->slug;
			$get_term_name  = $terms[0]->name;
			   
			// Display the tag name
			$output .= '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
		   
		} elseif ( is_day() ) {
			   
			// Day archive
			   
			// Year link
			$output .= '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
			$output .= '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
			   
			// Month link
			$output .= '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
			$output .= '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
			   
			// Day display
			$output .= '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
			   
		} else if ( is_month() ) {
			   
			// Month Archive
			   
			// Year link
			$output .= '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
			$output .= '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
			   
			// Month display
			$output .= '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
			   
		} else if ( is_year() ) {
			   
			// Display year archive
			$output .= '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
			   
		} else if ( is_author() ) {
			   
			// Auhor archive
			   
			// Get the author information
			global $author;
			$userdata = get_userdata( $author );
			   
			// Display author name
			$output .= '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
		   
		} else if ( get_query_var('paged') ) {
			   
			// Paginated archives
			$output .= '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
			   
		} else if ( is_search() ) {
		   
			// Search results page
			$output .= '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Rezultati iskanja za: ' . get_search_query() . '">Rezultati iskanja za: ' . get_search_query() . '</strong></li>';
		   
		} elseif ( is_404() ) {
			   
			// 404 page
			$output .= '<li>' . 'Error 404' . '</li>';
		}
	   
		$output .= '</ul>';
		   
	}
	   
	return $output;
}

/**
 * Get all children pages from the current page.
 */
function children_pages($post_id) {
	$output = array();
	$args = array(
		'post_parent' => $post_id,
		'post_type'   => 'page', 
		'numberposts' => -1,
		'post_status' => 'publish' 
	);

	$children_array = get_children($args);

	foreach ($children_array as $key => $child) {
		$output[$key] = $child;
	}

	$output = array_reverse($output);

	return $output;
}

/*
 * Get the kodeks by which 
 */
 
function get_valid_kodeks($post=NULL){
			// child_pages od "novinarski kodeks" p=1866
		    $kodeksi=get_children(array('post_parent' => 1866, 'order' => 'DESC', 'post_type'=>'page'));
			
			//če post ni bil podan, poberi trenutno prikazan post
			if($post)
				$post_time = $post->post_date;
			else
				$post_time = get_post_time('c');
			foreach($kodeksi as $kodeks)
			{
				//iteriramo po kodeksih nazaj dokler "razsodba_date" > "kodeks_date"
				//ko je pogoj ispolnjen, pomeni, da smo našli prvi kodeks, ki je starejši od razsodbe
				//torej je bil v veljavi v času razsodbe
				
				if(strtotime($kodeks->post_date) < strtotime(get_post_time('c')))
				{	
					break;
				}
			}
			return $kodeks;
}

function get_latest_kodeks(){
	$kodeks = array_values(get_children(array('post_parent' => 1866, 'order' => 'DESC', 'post_type'=>'page', 'post_count'=>1)));
	return $kodeks[0];
}

//function add_query_vars_filter( $vars ){
//  $vars[] = "leto";
//  return $vars;
//}
//add_filter( 'query_vars', 'add_query_vars_filter' );

function get_clen_content($clen){
		$clen=str_replace(array('-','.',' ','Č', 'č'), array('', '', '', 'c', 'c'), $clen);
		$content = get_valid_kodeks()->post_content;
		$regex = "/".$clen."[\w\W]*?\/h3>([\w\W]*?)<(\/div|span)/i";
		preg_match($regex, $content, $matches);
		if (count($matches)>1)
			return $matches[1];
		return "";
}


function custom_query_vars_filter($vars) {
  $vars[] = 'y';
  $vars[] .= 'c';
  return $vars;
}
add_filter( 'query_vars', 'custom_query_vars_filter' );

add_action( 'pre_get_posts', 'clean_vars' );
function clean_vars($query) {
	global $wp_query;
	if($query->is_main_query()){
		//print_r($query);
		if($query->get('oseba'))
		{
			$oseba = urldecode($query->get('oseba'));
			$oseba = str_replace(' ', '-', $oseba);
			$query->set('oseba', $oseba);
		}
		if($query->get('medij'))
		{
			$medij = urldecode($query->get('medij'));
			$medij = str_replace(' ', '-', $medij);
			$query->set('medij', $medij);
		}
		if($query->get('clen'))
		{
			$clen = urldecode($query->get('clen'));
			$clen = preg_replace('/[^0-9,]/','',$clen);
			$clen = explode(',', $clen);
			$clen = join('-clen,', $clen);
			$clen = $clen."-clen";
			$query->set('clen', $clen);
		}
		
	}
}

//getting the first link from content
function get_my_url() {
    if ( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', get_the_content(), $matches ) )
        return false;
 
    return esc_url_raw( $matches[1] );
}


function current_kodeks(){
	
	$query = new WP_Query(array('post_type' => 'page', 'post_parent' =>1866, 'showposts' => 1, 'order'=>'desc', 'orderby' => 'date'));
	$posts = $query->get_posts();
	return $posts[0];
}


//linking externals directlly
function linking_files( $permalink, $postID ) {
	
	if(get_post_format()=='link')
	{
		$file = get_field("pdf_verzija_vsebine", $post->ID);
		if(!empty($file))
			return $file;
		 
		$external_link = get_my_url();
		if( !empty( $external_link ) ) {
			return $external_link;
		}
	}
	
    return $permalink;
}
add_filter( 'post_link', 'linking_files', 10, 2 );

