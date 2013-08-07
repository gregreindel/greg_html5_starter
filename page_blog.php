<?php // Template Name: Blog


// Remove the post meta function 
//remove_action( 'genesis_entry_header', 'genesis_post_info' );

/** Customize the post info function */
//add_filter( 'genesis_post_info', 'post_info_filter' );
function post_info_filter($post_info) {
$post_info = '[post_date] by [post_author_posts_link] [post_comments] [post_edit]';
return $post_info;
}


// Remove the post meta function 
//remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

// Customize the post meta function 
//add_filter( 'genesis_post_meta', 'post_meta_filter' );
function post_meta_filter($post_meta) {
$post_meta = '[post_categories before="Filed Under: "] [post_tags before="Tagged: "]';
return $post_meta;
}

genesis();