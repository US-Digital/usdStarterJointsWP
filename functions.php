<?php
/** 
 * For more info: https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */			
	
// Theme support options
require_once(get_template_directory().'/functions/theme-support.php'); 

// WP Head and other cleanup functions
require_once(get_template_directory().'/functions/cleanup.php'); 

// Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php'); 

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php'); 

// Register sidebars/widget areas
require_once(get_template_directory().'/functions/sidebar.php'); 

// Makes WordPress comments suck less
require_once(get_template_directory().'/functions/comments.php'); 

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/functions/page-navi.php'); 

// Adds support for multiple languages
require_once(get_template_directory().'/functions/translation/translation.php'); 

// Adds site styles to the WordPress editor
// require_once(get_template_directory().'/functions/editor-styles.php'); 

// Remove Emoji Support
// require_once(get_template_directory().'/functions/disable-emoji.php'); 

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/functions/related-posts.php'); 

// Use this as a template for custom post types
// require_once(get_template_directory().'/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/functions/login.php'); 

// Customize the WordPress admin
// require_once(get_template_directory().'/functions/admin.php'); 

// US DIGITAL FUNCTIONS LIBRARY

// Add plugins to be included
require_once(get_template_directory().'/functions/library/included-plugins.php');

// Add custom theme settings page
// require_once(get_template_directory().'/functions/library/theme_settings.php');

// Add custom contact form usd_contact_form()
// require_once(get_template_directory().'/functions/library/custom-contact-form.php');

// Add custom feedback form usd_contact_form() with recording responses in CSV
// require_once(get_template_directory().'/functions/library/custom-feedback-form.php');

// Add Async/Defer for scripts
require_once(get_template_directory().'/functions/library/async-defer.php');

// Add CF7 removal of recpatcha badge
// require_once(get_template_directory().'/functions/library/cf7-recaptcha-hide.php');

// Add more image sizes and responsive images for ACF
require_once(get_template_directory().'/functions/library/responsive_images.php');

// Add shortcodes functions file
require_once(get_template_directory().'/functions/library/shortcodes.php');

// Add latest posts functions file
require_once(get_template_directory().'/functions/library/latest_posts.php');