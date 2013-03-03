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

	/* ========================================================================================================================
	
	Actions and Filters
	
	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

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
register_post_type('books', array(	'label' => 'Books','description' => 'Kaya Press books!','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'supports' => array('title','comments','revisions','thumbnail','author',),'taxonomies' => array('Genres',),'labels' => array (
  'name' => 'Books',
  'singular_name' => 'Book',
  'menu_name' => 'Books',
  'add_new' => 'Add Book',
  'add_new_item' => 'Add New Book',
  'edit' => 'Edit',
  'edit_item' => 'Edit Book',
  'new_item' => 'New Book',
  'view' => 'View Book',
  'view_item' => 'View Book',
  'search_items' => 'Search Books',
  'not_found' => 'No Books Found',
  'not_found_in_trash' => 'No Books Found in Trash',
  'parent' => 'Parent Book',
),) );

register_post_type('authors', array(	'label' => 'Authors','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'supports' => array('title','comments','revisions','thumbnail','author',),'labels' => array (
  'name' => 'Authors',
  'singular_name' => 'Author',
  'menu_name' => 'Authors',
  'add_new' => 'Add Author',
  'add_new_item' => 'Add New Author',
  'edit' => 'Edit',
  'edit_item' => 'Edit Author',
  'new_item' => 'New Author',
  'view' => 'View Author',
  'view_item' => 'View Author',
  'search_items' => 'Search Authors',
  'not_found' => 'No Authors Found',
  'not_found_in_trash' => 'No Authors Found in Trash',
  'parent' => 'Parent Author',
),) );


//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_book_taxonomies', 0 );

//create two taxonomies, genres and writers for the post type "book"
function create_book_taxonomies() 
{
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'                => _x( 'Genres', 'taxonomy general name' ),
    'singular_name'       => _x( 'Genre', 'taxonomy singular name' ),
    'search_items'        => __( 'Search Genres' ),
    'all_items'           => __( 'All Genres' ),
    'parent_item'         => __( 'Parent Genre' ),
    'parent_item_colon'   => __( 'Parent Genre:' ),
    'edit_item'           => __( 'Edit Genre' ), 
    'update_item'         => __( 'Update Genre' ),
    'add_new_item'        => __( 'Add New Genre' ),
    'new_item_name'       => __( 'New Genre Name' ),
    'menu_name'           => __( 'Genre' )
  ); 	

  $args = array(
    'hierarchical'        => true,
    'labels'              => $labels,
    'show_ui'             => true,
    'show_admin_column'   => true,
    'query_var'           => true,
    'rewrite'             => array( 'slug' => 'genre' )
  );

  register_taxonomy( 'genre', array( 'books' ), $args );

}


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
		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );
		wp_enqueue_script( 'site' );
		wp_register_script( 'modern', get_template_directory_uri().'/js/modernizr.custom.63321.js', array( 'jquery' ) );
		wp_enqueue_script( 'modern' );
	    wp_register_script( 'animatedcollapse', get_template_directory_uri().'/js/animatedcollapse.js', array( 'jquery' ) );
		wp_enqueue_script( 'animatedcollapse' );
		wp_register_script( 'collapse', get_template_directory_uri().'/js/collapse.js', array( 'jquery' ) );
		wp_enqueue_script( 'collapse' );
		wp_register_script( 'jquery-ui', get_template_directory_uri().'/js/jquery-ui.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'jquery-ui' );
		wp_register_script( 'hammer', get_template_directory_uri().'/js/hammer.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'hammer' );
		wp_register_script( 'responsiveCarousel', get_template_directory_uri().'/js/responsiveCarousel.js', array( 'jquery' ) );
		wp_enqueue_script( 'responsiveCarousel' );
		wp_register_script( 'catslider', get_template_directory_uri().'/js/jquery.catslider.js', array( 'jquery' ) );
		wp_enqueue_script( 'catslider' );

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
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif; 
	}