<?php
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
        
    // Adding scripts file in the footer
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/scripts/scripts.js#asyncload', array( 'jquery' ), filemtime(get_template_directory() . '/assets/scripts/scripts.js'), true );
   
    // Register main stylesheet
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/styles/style.css', array(), filemtime(get_template_directory() . '/assets/styles/style.css'), 'all' );
    
    // Register slick slider default CSS
    wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/assets/styles/slick.css', array(), filemtime(get_template_directory() . '/assets/styles/slick.css'), 'all' );

    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);