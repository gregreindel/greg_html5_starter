<?php
// Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Gregs HTML5 Starter' );
define( 'CHILD_THEME_URL', 'http://www.gregreindel.com' );

// Activate the child theme
add_action('genesis_setup','gregr_theme_setup', 15);


/***** THIS FIRES OFF ALL CHILD THEME SETUP - FUNCTIONS LOCATED IN /LIB/GREGR_CHILD_FUNCTIONS.PHP *****/
function gregr_theme_setup() {

// Start the engine
// Holds all of the funtions called from this main file
// View /lib/gregr_child_functions.php for details
include_once( get_stylesheet_directory() . '/lib/gregr_child_functions.php' ); /* <-- THIS FILE IS REQUIRED!! DO NOT REMOVE --> */

// Add a custom post types with or without custom taxonomy
// View /lib/custom_post_types for details
//include_once( get_stylesheet_directory() . '/lib/custom_post_types.php' );

// Add some custom options to the admin panel
// View /lib/admin_funtions.php for details
include_once( get_stylesheet_directory() . '/lib/admin_functions.php' );

// Custom metabox options
//include_once( get_stylesheet_directory() . '/lib/custom_metabox.php' );

// Add additional theme options
//include_once( get_stylesheet_directory() . '/lib/custom_theme_options.php' );


/***** CLEAN UP THE <HEAD> *****/

// Remove rsd link
remove_action( 'wp_head', 'rsd_link' );                    
// Remove Windows Live Writer
remove_action( 'wp_head', 'wlwmanifest_link' );                       
// Index link
remove_action( 'wp_head', 'index_rel_link' );                         
// Previous link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );            
// Start link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );             
// Links for adjacent posts
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); 
// Remove WP version
remove_action( 'wp_head', 'wp_generator' );  


/***** OTHER <HEAD> ELEMENTS *****/

// Add Viewport meta tag for mobile browsers
add_action( 'genesis_meta', 'gregr_viewport_meta_tag' );

//* Add viewport meta tag for mobile browsers GENESIS 2.0 FEATURE
//add_theme_support( 'genesis-responsive-viewport' );

// Change favicon location 
//add_filter( 'genesis_pre_load_favicon', 'gregr_favicon_filter' );

// Add scripts & styles 
add_action( 'wp_enqueue_scripts', 'gregr_load_custom_scripts', 999 );

// IE conditional wrapper
add_filter( 'style_loader_tag', 'gregr_ie_conditional', 10, 2 );

// Remove version number from js and css
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );


/***** STRUCTURE & REPOSITIONING *****/

// Add HTML5 functions
add_theme_support( 'genesis-html5' );

/** Add support for structural wraps */
add_theme_support( 'genesis-structural-wraps', array( 'header', 'nav', 'subnav', 'inner', 'footer-widgets', 'footer' ) );

// Reposition nav menus
//remove_action('genesis_after_header','genesis_do_nav');
//remove_action('genesis_after_header','genesis_do_subnav');

//add_action('genesis_header_right','genesis_do_subnav');
//add_action('genesis_header_right','genesis_do_nav');

// Remove Genesis layout settings
// remove_theme_support( 'genesis-inpost-layouts' );


/***** CUSTOMIZING TITLES & DESCRIPTION & BREADCRUMBS *****/

// Remove and/or add custom site title
//remove_action( 'genesis_site_title', 'genesis_seo_site_title' );
//add_action( 'genesis_site_title', 'gregr_custom_seo_site_title' );

// Remove and/or add custom post title
//remove_action('genesis_post_title','genesis_do_post_title');
//add_action('genesis_post_title','gregr_do_custom_post_title');

// Remove and/or add custom site description
//remove_action( 'genesis_site_description', 'genesis_seo_site_description' );
//add_action( 'genesis_site_description', 'gregr_custom_seo_site_description' );

// Reposition breadcrumbs
//remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
//add_action( 'genesis_after_post_title', 'genesis_do_breadcrumbs' );


/***** FOOTER *****/

// Footer creds
add_filter('genesis_footer_creds_text', 'gregr_footer_creds_text');
add_filter('genesis_footer_backtotop_text', 'gregr_footer_backtotop_text');

// Add support for footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );


/***** OTHER GENESIS CLEANUP OPTIONS *****/

// Remove Genesis widgets
//add_action( 'widgets_init', 'gregr_remove_genesis_widgets', 20 );

// Remove unused Genesis profile options
remove_action( 'show_user_profile', 'genesis_user_options_fields' );
remove_action( 'edit_user_profile', 'genesis_user_options_fields' );
remove_action( 'show_user_profile', 'genesis_user_archive_fields' );
remove_action( 'edit_user_profile', 'genesis_user_archive_fields' );
remove_action( 'show_user_profile', 'genesis_user_seo_fields' );
remove_action( 'edit_user_profile', 'genesis_user_seo_fields' );
remove_action( 'show_user_profile', 'genesis_user_layout_fields' );
remove_action( 'edit_user_profile', 'genesis_user_layout_fields' );

// Remove Genesis layout options
//genesis_unregister_layout( 'sidebar-content' );
//genesis_unregister_layout( 'content-sidebar-sidebar' );
//genesis_unregister_layout( 'sidebar-sidebar-content' );
//genesis_unregister_layout( 'sidebar-content-sidebar' );
//genesis_unregister_layout( 'content-sidebar' );
//genesis_unregister_layout( 'full-width-content' );

// Remove Genesis menu link
//remove_theme_support( 'genesis-admin-menu' );


/***** SIDEBARS & WIDGETS *****/

// Remove the header right widget area
//unregister_sidebar( 'header-right' );
//unregister_sidebar( 'sidebar-alt' );

// Home page widgets
genesis_register_sidebar( array(
	'id'			=> 'home-featured-full',
	'name'			=> __( 'Home Featured Full', 'gregshtml5starter' ),
	'description'	=> __( 'This is the featured section if you want full width.', 'gregshtml5starter' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-featured-left',
	'name'			=> __( 'Home Featured Left', 'gregshtml5starter' ),
	'description'	=> __( 'This is the featured section left side.', 'gregshtml5starter' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-featured-right',
	'name'			=> __( 'Home Featured Right', 'gregshtml5starter' ),
	'description'	=> __( 'This is the featured section right side.', 'gregshtml5starter' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-middle-1',
	'name'			=> __( 'Home Middle 1', 'gregshtml5starter' ),
	'description'	=> __( 'This is the home middle left section.', 'gregshtml5starter' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-middle-2',
	'name'			=> __( 'Home Middle 2', 'gregshtml5starter' ),
	'description'	=> __( 'This is the home middle center section.', 'gregshtml5starter' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-middle-3',
	'name'			=> __( 'Home Middle 3', 'gregshtml5starter' ),
	'description'	=> __( 'This is the home middle right section.', 'gregshtml5starter' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-bottom',
	'name'			=> __( 'Home Bottom', 'gregshtml5starter' ),
	'description'	=> __( 'This is the home bottom section.', 'gregshtml5starter' ),
) );


/***** OTHER *****/

add_filter( 'http_request_args', 'gregr_prevent_theme_update', 5, 2 );

// Below is the closing bracket of theme setup. It's kinda important. 
} // <-- DO NOT REMOVE THIS
?>