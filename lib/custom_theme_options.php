<?php 
// Font Awesome Shortcodes
function addscFontAwesome($atts) {
    extract(shortcode_atts(array(
    'type'	=> '',
	'size' => '',
	'rotate' => '',
	'flip' => '',
	'pull' => '',
	'animated' => '',

    ), $atts));
	
	$type = ($type) ? 'icon-'.$type. '' : 'icon-star';
	$size = ($size) ? 'icon-'.$size. '' : '';
	$rotate = ($rotate) ? 'icon-rotate-'.$rotate. '' : '';
	$flip = ($flip) ? 'icon-flip-'.$flip. '' : '';
	$pull = ($pull) ? 'pull-'.$pull. '' : '';
	$animated = ($animated) ? 'icon-spin' : '';

	$theAwesomeFont = '<i class="'.sanitize_html_class($type).' '.sanitize_html_class($size).' '.sanitize_html_class($rotate).' '.sanitize_html_class($flip).' '.sanitize_html_class($pull).' '.sanitize_html_class($animated).'"></i>';
	
	return $theAwesomeFont;
}

add_shortcode('icon', 'addscFontAwesome');

// Add custom functions

?>