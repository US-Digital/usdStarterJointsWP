<?php
require_once(get_template_directory().'/functions/library/class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'us_digital_register_required_plugins' );
function us_digital_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		// Recommend Breeze Caching
		array(
			'name'      => 'Breeze Cache',
			'slug'      => 'breeze',
			'required'  => false,
		),
		// Recommend Image Optimiser
		array(
			'name'      => 'Image Optimiser',
			'slug'      => 'ewww-image-optimizer',
			'required'  => false,
		),
		// Recommend ManageWP Worker
		array(
			'name'      => 'ManageWP Worker',
			'slug'      => 'worker',
			'required'  => false,
		),
		// Recommend Wordfence Security
		array(
			'name'      => 'Wordfence Security',
			'slug'      => 'wordfence',
			'required'  => false,
        ),
        
        // Require Classic Editor
		array(
			'name'      => 'Classic Editor',
			'slug'      => 'classic-editor',
			'required'  => true,
		),
        // Require ACF Pro
        array(
			'name'         => 'ACF Pro',
			'slug'         => 'advanced-custom-fields-pro',
			'source'       => 'https://connect.advancedcustomfields.com/index.php?a=download&p=pro&k=b3JkZXJfaWQ9NDU5NDJ8dHlwZT1kZXZlbG9wZXJ8ZGF0ZT0yMDE0LTEyLTEwIDA5OjI1OjE1',
			'required'     => true,
			// 'external_url' => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
		),
		// Require WP Rollback Worker
		array(
			'name'      => 'Plugin Rollback',
			'slug'      => 'wp-rollback',
			'required'  => true,
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'us-digital',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'usd-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'us-digital' ),
			'menu_title'                      => __( 'Install Plugins', 'us-digital' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'us-digital' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'us-digital' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'us-digital' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'us-digital'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'us-digital'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'us-digital'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'us-digital'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'us-digital'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'us-digital'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'us-digital'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'us-digital'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'us-digital'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'us-digital' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'us-digital' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'us-digital' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'us-digital' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'us-digital' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'us-digital' ),
			'dismiss'                         => __( 'Dismiss this notice', 'us-digital' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'us-digital' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'us-digital' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);

	tgmpa( $plugins, $config );
}