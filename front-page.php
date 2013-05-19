<?php

add_action( 'genesis_meta', 'gregr_home_widget_test' );

// Add widgets to homepage. If no widgets, then loop.
function gregr_home_widget_test() {

	if ( is_active_sidebar( 'home-featured-full' ) || is_active_sidebar( 'home-featured-left' ) || is_active_sidebar( 'home-featured-right' ) || is_active_sidebar( 'home-middle-1' ) || is_active_sidebar( 'home-middle-2' ) || is_active_sidebar( 'home-middle-3' ) || is_active_sidebar( 'home-bottom' ) ) {

		remove_action( 'genesis_loop', 'genesis_do_loop' );
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
		add_action( 'genesis_after_header', 'gregr_home_do_featured' );		
		add_action( 'genesis_after_header', 'gregr_home_do_middle' );
		add_action( 'genesis_after_header', 'gregr_home_do_bottom' );
	}
}

// Home feature widget section
function gregr_home_do_featured() {

	if ( is_active_sidebar( 'home-featured-full' ) || is_active_sidebar( 'home-featured-left' ) || is_active_sidebar( 'home-featured-right' ) ) {

		echo '<div id="home-featured" class="clearfix"><div class="wrap">';
		
			genesis_widget_area( 'home-featured-full', array(
				'before' => '<div class="home-featured-full">',
			) );
			
		echo '<div id="home-featured-halves">';
			
			genesis_widget_area( 'home-featured-left', array(
				'before' => '<div class="home-featured-left one-half first">',
			) );
			
			genesis_widget_area( 'home-featured-right', array(
				'before' => '<div class="home-featured-right one half">',
			) );

		echo '</div><!-- end home-featured-halves --></div><!-- end wrap --></div><!-- end home-featured -->'."\n";
	}	
}


// Home middle widget section

function gregr_home_do_middle() {

	if ( is_active_sidebar( 'home-middle-1' ) || is_active_sidebar( 'home-middle-2' ) || is_active_sidebar( 'home-middle-3' )  ) {								
		
		echo '<div id="home-middle" class="clearfix"><div class="wrap">';
		
			genesis_widget_area( 'home-middle-1', array(
				'before' => '<div class="home-middle-1 one-third first">',
			) );
			
			genesis_widget_area( 'home-middle-2', array(
				'before' => '<div class="home-middle-2 one-third">',
			) );
			genesis_widget_area( 'home-middle-3', array(
				'before' => '<div class="home-middle-3 one-third">',
			) );									
		
		echo '</div><!-- end wrap --></div><!-- end home-middle -->'."\n";			
	}		
}




// Home bottom widget section

function gregr_home_do_bottom() {

	if ( is_active_sidebar( 'home-bottom' ) ) {								
	
		echo '<div id="home-bottom" class="clearfix"><div class="wrap">';
		
			genesis_widget_area( 'home-bottom', array(
				'before' => '<div class="home-bottom">',
			) );
		
		echo '</div><!-- end .wrap --></div><!-- end #home-bottom -->'."\n";
	}
}

genesis();