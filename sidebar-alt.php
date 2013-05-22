<?php
 
/**
 * Handles secondary sidebar structure.
 * handles the html5 sidebar tags
*/
 
genesis_markup( array(
	'html5'   => '<aside %s>',
	'xhtml'   => '<div id="sidebar-alt" class="sidebar widget-area">',
	'context' => 'sidebar-secondary',
) );
genesis_structural_wrap( 'sidebar-alt' );

do_action( 'genesis_before_sidebar_alt_widget_area' );
do_action( 'genesis_sidebar_alt' );
do_action( 'genesis_after_sidebar_alt_widget_area' );

genesis_structural_wrap( 'sidebar-alt', 'close' );
genesis_markup( array(
	'html5' => '</aside>', //* end .sidebar-secondary
	'xhtml' => '</div>', //* end #sidebar-alt
) );