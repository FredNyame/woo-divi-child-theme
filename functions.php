<?php 
function mb_theme_enqueue_styles() { 
  //Adding the Google fonts
  wp_enqueue_style('mb-google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap');

  //Loading the Parent Styles
  wp_enqueue_style( 'mbc-parent-style', get_template_directory_uri() . '/style.css' );

  // enqueue child styles
	wp_enqueue_style('mcb-child-theme', get_stylesheet_directory_uri() .'/dist/css/theme.css', array('mbc-parent-style'));
}
add_action( 'wp_enqueue_scripts', 'mb_theme_enqueue_styles' );

//Adding Add To Cart
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 10);

/**
 * Rename product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {
	$tabs['description']['title'] = __( 'Product Details' );		// Rename the description tab
/* 	$tabs['reviews']['title'] = __( 'Ratings' );				// Rename the reviews tab
	$tabs['additional_information']['title'] = __( 'Product Data' );	// Rename the additional information tab */

	return $tabs;
}