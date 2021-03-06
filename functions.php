<?php
	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * @subpackage 	Starkers
 	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================
	
	Required external files
	
	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );

	/* ========================================================================================================================
	
	Theme specific settings

	Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme
	
	======================================================================================================================== */

	add_theme_support('post-thumbnails');
	
	register_nav_menus(array('primary' => 'Primary Navigation'));
	register_nav_menus(array('secondary' => 'Footer Navigation'));

	register_sidebar(array(
  	'name' => __( 'Footer Quote' ),
  	'id' => 'footer-quote',
  	'description' => __( 'Widgets in this area will be shown right above main footer area' ),
  	'before_title' => '<h1>',
  	'after_title' => '</h1>'
));

	register_sidebar( array(
    'id'          => 'side-menu',
    'name'        => __( 'Side Menu'),
    'description' => __( 'This sidebar is located on category and tag pages.'),
) );

	register_sidebar( array(
    'id'          => 'about-menu',
    'name'        => __( 'About Menu'),
    'description' => __( 'This sidebar is located on about pages.'),
) );

	add_theme_support('post-thumbnails');
  	add_image_size('category-thumb', 200, 283, true);
  	add_image_size('book-thumb', 338, 478, true);
  	add_image_size('book-landing', 676, 956, true);
  	add_image_size('news-image', 325, 325, true);
  	add_image_size('news-featured', 670, 502, true);
  	add_image_size('author-thumb', 250, 350, true); 
  	add_image_size('featured-event', 160, 130, true);
  	add_image_size('featured-slide', 850, 700, true);
  	add_image_size('featured-slide-small', 595, 490, true);

	/* ========================================================================================================================
	
	Actions and Filters
	
	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );


	 function the_titlesmall($before = '', $after = '', $echo = true, $length = false) { $title = get_the_title();

	if ( $length && is_numeric($length) ) {
		$title = substr( $title, 0, $length );
	}

	if ( strlen($title)> 0 ) {
		$title = apply_filters('the_titlesmall', $before . $title . $after, $before, $after);
		if ( $echo )
			echo $title;
		else
			return $title;
		}
	}
	
	function my_custom_change_ninja_forms_capabilities_filter( $capabilities ) {
    $capabilities = "edit_others_posts";
    return $capabilities;
	}
	add_filter( 'ninja_forms_admin_menu_capabilities', 'my_custom_change_ninja_forms_capabilities_filter' );

	if (is_admin()) :
	function my_remove_meta_boxes() {
	 	if( !current_user_can('manage_options') ) {
  			remove_meta_box('pageparentdiv', 'page', 'side');
  			
			 }
	}
	add_action( 'admin_menu', 'my_remove_meta_boxes' );

	function remove_plugin_metaboxes(){
    	if ( ! current_user_can( 'manage_options' ) ) { 
    		remove_meta_box( 'ninja_forms_selector', 'page', 'side' );
        	remove_meta_box( 'ninja_forms_selector', 'post', 'side' ); // Remove Ninja Form Append
    		}
	}
	add_action( 'do_meta_boxes', 'remove_plugin_metaboxes' );
	endif;

	function exclude_widget_categories($args){
	$exclude = "1, 54"; // The IDs of the excluding categories
	$args["exclude"] = $exclude;
	return $args;
	}
	add_filter("widget_categories_args","exclude_widget_categories");
	
	

    /* ========================================================================================================================
	
	Search Hook
	
	======================================================================================================================== */


/* ========================================================================================================================
	
	Twitter Time
	
	======================================================================================================================== */

function niceTime( $time )
{
	$time = strtotime( str_replace( '+0000', '', $time ) );
	
	$delta = time() - $time;
	
	switch( $delta )
	{
		case ( $delta < 60 ):
			return 'Seconds Ago';
		case( $delta < 120 ):
			return 'A Minute Ago';
		case( $delta < ( 45 * 60 ) ):
			return floor( $delta / 60 ) . ' Minutes Ago';
		case( $delta < ( 90 * 60 ) ):
			return 'An Hour Ago';
		case( $delta < ( 24 * 60 * 60 ) ):
			return floor( $delta / 3600 ) . ' Hours Ago';
		case( $delta < ( 48 * 60 * 60 ) ):
			return '1 Day Ago';
		default:
			return date('j M', $time);
	}
}


	/* ========================================================================================================================
	
	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );
	
	======================================================================================================================== */



	/* ========================================================================================================================
	
	Scripts
	
	======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */

if( !is_admin()){ 
 wp_deregister_script('jquery');
 wp_register_script('jquery', get_template_directory_uri().'/js/jquery.min.js', false, '1.8.0');
 wp_enqueue_script('jquery');
}

	function starkers_script_enqueuer() {

		wp_register_script( 'matchmedia', get_template_directory_uri().'/js/matchMedia.min.js' );
		wp_enqueue_script( 'matchmedia' );
		wp_register_script( 'modern', get_template_directory_uri().'/js/modernizr.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'modern' );
	    wp_register_script( 'animatedcollapse', get_template_directory_uri().'/js/animatedcollapse.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'animatedcollapse' );
		wp_register_script( 'jquery-ui', get_template_directory_uri().'/js/jquery-ui.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'jquery-ui' );
		wp_register_script( 'equalize', get_template_directory_uri().'/js/equalize.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'equalize' );
		wp_register_script( 'hammer', get_template_directory_uri().'/js/hammer.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'hammer' );
		wp_register_script( 'responsiveCarousel', get_template_directory_uri().'/js/responsiveCarousel.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'responsiveCarousel' );
		wp_register_script( 'catslider', get_template_directory_uri().'/js/jquery.catslider.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'catslider' );
		wp_register_script( 'picturefill', get_template_directory_uri().'/js/picturefill.js' );
		wp_enqueue_script( 'picturefill' );
		wp_register_script( 'custom', get_template_directory_uri().'/js/custom.js', array('picturefill'), true);
		wp_enqueue_script( 'custom');
		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}	

	/* ========================================================================================================================
	
	Comments
	
	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments 
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>	
		<li class="padded-vertical kaya_c_section">
			<article id="comment-<?php comment_ID() ?>">
				<div class="kaya_comment"><span class="kaya_quote">&#8220;</span><?php comment_text() ?></div>
				&mdash; <strong><?php comment_author_link() ?></strong> <time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?></a></time>
				
			</article>
		</li>
		<?php endif; 
	}

/* ========================================================================================================================
	
	Optimization
	
	======================================================================================================================== */


	function _remove_script_version( $src ){
		$parts = explode( '?', $src );
		return $parts[0];
	}
	add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
	add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

?>