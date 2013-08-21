<?php 

// Add Viewport meta tag for mobile browsers
function gregr_viewport_meta_tag() {
	echo '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />'."\n";
	echo '<meta name="HandheldFriendly" content="True" />'."\n";
	echo '<meta name="MobileOptimized" content="320" />'."\n";
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>'."\n";
}

// Change favicon location 
function gregr_favicon_filter( $favicon_url ) {
	return get_bloginfo('stylesheet_directory').'/images/favicon.png';
}

// Add scripts & styles
function gregr_load_custom_scripts() {
	  wp_register_script( 'theme', CHILD_URL . '/js/scripts.js', array( 'jquery' ), '1.0', true );
	  wp_register_style( 'google-fonts', 'http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css' );
	  wp_register_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Lora|Open+Sans+Condensed:300\" rel="stylesheet" type="text/css">' );
	  wp_register_style( 'theme-ie-only', CHILD_URL . '/css/child-style-ie.css' );
	 
	 
	  wp_enqueue_script(array('theme' ));
	  wp_enqueue_style(array( 'google-fonts', 'theme-ie-only' ));
}

// IE conditional wrapper
function gregr_ie_conditional( $tag, $handle ) {
    if ( 'theme-ie-only' == $handle )
        $tag = '<!--[if lte IE 8]>' . "\n" . $tag . '<![endif]-->' . "\n";
    return $tag;
}

// Remove version number from css and js
function _remove_script_version( $src ){
    if (preg_match("(\?ver=)", $src )){
	$parts = explode( '?', $src );
	return $parts[0];
	}else{
	return $src;
	}
}

// Footer creds
function gregr_footer_creds_text($creds) {
	if ( is_front_page()) {
$creds = '&copy;' .date('Y') .' '. get_bloginfo('name') .' <span id="footer-dev-creds">- Starter Theme By <a href="http://www.gregreindel.com">Greg Reindel</a> Powered By Genesis Famework</span>';
	}else {
$creds = '&copy; 2013 ' . get_bloginfo('name');
	}
 return  $creds;	
}

function gregr_footer_backtotop_text($backtotop) {
    $backtotop = '[footer_backtotop text="Back To The Top"]';
    return $backtotop;
}

// Remove & add custom site title
// Below is the default markup
function gregr_custom_seo_site_title() {
	if(is_front_page()){ 
echo '<h1 class="site-title" itemprop="headline"><a title="'.get_bloginfo('name').'" href="'.get_bloginfo('url').'" rel="nofollow">'.get_bloginfo('name').'</a></h1>';
}else {
echo '<p class="site-title" itemprop="headline"><a title="'.get_bloginfo('name').'" href="'.get_bloginfo('url').'" rel="nofollow">'.get_bloginfo('name').'</a></p>';
}
}

// Remove & add custom post title
// Below is the default markup
function gregr_do_custom_post_title() {
	 echo the_title( '<h1 class="entry-title" itemprop="headline">' , '</h1>');
}

// Remove & add custom site description
// Below is the default markup
function gregr_custom_seo_site_description() {
	echo '<p class="site-description">'.get_bloginfo('description').'</p>';
}


// Adds custom microdata depending on post type - can me modified
// Props Nathan Rice
function gregr_custom_entry_attributes( $attributes ) {
    if( 'products' != get_post_type() )
        return $attributes;
    $attributes['itemtype']  = 'http://schema.org/Product';
    return $attributes;
}

// Remove Genesis widgets
function gregr_remove_genesis_widgets() {
    unregister_widget( 'Genesis_eNews_Updates' );
    unregister_widget( 'Genesis_Featured_Page' );
    unregister_widget( 'Genesis_User_Profile_Widget' );
    unregister_widget( 'Genesis_Menu_Pages_Widget' );
    unregister_widget( 'Genesis_Widget_Menu_Categories' );
    unregister_widget( 'Genesis_Featured_Post' );
    unregister_widget( 'Genesis_Latest_Tweets_Widget' );
}

/**
* Don't Update Theme
* If there is a theme in the repo with the same name,
* this prevents WP from prompting an update.
*
* @link http://markjaquith.wordpress.com/2009/12/14/excluding-your-plugin-or-theme-from-update-checks/
* @author Mark Jaquith
* @since 1.0.0
*/
function gregr_prevent_theme_update( $r, $url ) {
if ( 0 !== strpos( $url, 'http://api.wordpress.org/themes/update-check' ) )
return $r; // Not a theme update request. Bail immediately.
$themes = unserialize( $r['body']['themes'] );
unset( $themes[ get_option( 'template' ) ] );
unset( $themes[ get_option( 'stylesheet' ) ] );
$r['body']['themes'] = serialize( $themes );
return $r;
}
?>