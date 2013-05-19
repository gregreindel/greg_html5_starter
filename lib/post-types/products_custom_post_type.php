<?php // Products Custom Post Type - Create custom post type and taxonomies

//***** MUST BE ENABLED VIA /LIB/CUSTOM_POST_TYPES.PHP *****//


// Register custom post type
add_action( 'init', 'gregr_register_products_post_type' );

function gregr_register_products_post_type() {
	$labels = array(
		'name' => 'Products',
		'singular_name' => 'Products',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Product',
		'edit_item' => 'Edit Product',
		'new_item' => 'New Product',
		'view_item' => 'View Product',
		'search_items' => 'Search Product',
		'not_found' =>  'No products found',
		'not_found_in_trash' => 'No products found in trash',
		'parent_item_colon' => '',
		'menu_name' => 'Products'
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => array('slug' => 'products'),
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => true,
		'menu_position' => 5,
		'menu_icon' => '',
 		'taxonomies' => array('category', 'post_tag'), 
		'supports' => array('title', 'thumbnail', 'page-attributes', 'revisions', 'editor', 'excerpt')
			); 

	register_post_type( 'products', $args );
}


// Add new taxonomy, make it hierarchical (like categories)
add_action( 'init', 'gregr_product_categories_taxonomies', 0 );

function gregr_product_categories_taxonomies() {
  $labels = array(
    'name' => _x( 'Product Categories'),
    'singular_name' => _x( 'Product Category'),
    'search_items' =>  __( 'Search Product Categories' ),
    'all_items' => __( 'All Product Categories' ),
    'parent_item' => __( 'Parent Category' ),
    'parent_item_colon' => __( 'Parent Category:' ),
    'edit_item' => __( 'Edit Product Category' ), 
    'update_item' => __( 'Update Product Category' ),
    'add_new_item' => __( 'Add New Product Category' ),
    'new_item_name' => __( 'New Product Category' ),
    'menu_name' => __( 'Product Categories' ),
  ); 	

  register_taxonomy('product-categories',array('products'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'product-categories' ),
  ));
  
}