<?php

// Async load
function usdigital_async_scripts($url)
{
    if ( strpos( $url, '#asyncload') === false )
        return $url;
    else if ( is_admin() )
        return str_replace( '#asyncload', '', $url );
    else
	return str_replace( '#asyncload', '', $url )."' async='async"; 
    }
add_filter( 'clean_url', 'usdigital_async_scripts', 11, 1 );

// Defer load
function usdigital_defer_scripts($url)
{
    if ( strpos( $url, '#deferload') === false )
        return $url;
    else if ( is_admin() )
        return str_replace( '#deferload', '', $url );
    else
	return str_replace( '#deferload', '', $url )."' defer='defer"; 
    }
add_filter( 'clean_url', 'usdigital_defer_scripts', 11, 1 );

// To use add #asyncload or #deferload to the end of the script URL
// Example
// wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/scripts/scripts.js#asyncload', array( 'jquery' ), filemtime(get_template_directory() . '/assets/scripts/js'), true );