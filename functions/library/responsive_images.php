<?php
// Adds custom image sizes for Foundation breakpoints

add_theme_support( 'post-thumbnails' );

add_action( 'after_setup_theme', 'aw_custom_add_image_sizes' );
function aw_custom_add_image_sizes() {
    add_image_size( 'small', 300, 9999 ); // 300px wide unlimited height
    add_image_size( 'medium-small', 640, 9999 ); // 300px wide unlimited height
    add_image_size( 'medium-large', 800, 9999 ); // 300px wide unlimited height
    add_image_size( 'xl', 1200, 9999 ); // 1200px wide unlimited height
    add_image_size( 'xxl', 2000, 9999 ); // 2000px wide unlimited height
    add_image_size( 'xxxl', 3000, 9999 ); // 3000px wide unlimited height
    add_image_size( 'super', 4000, 9999 ); // 4000px wide unlimited height
}

add_filter( 'image_size_names_choose', 'aw_custom_add_image_size_names' );
function aw_custom_add_image_size_names( $sizes ) {
  return array_merge( $sizes, array(
    'small' => __( 'Small' ),
    'medium-small' => __( 'Medium Small' ),
    'medium-large' => __( 'Medium Large' ),
    'xl' => __( 'Extra Large' ),
    'xxl' => __( '2x Extra Large' ),
    'xxxl' => __( '3x Extra Large' ),
  ) );
}