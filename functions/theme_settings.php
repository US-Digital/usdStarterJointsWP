<?php

// Add custom theme settings page
function theme_settings_page(){
    ?>
    <div class="wrap">
        <h1>Theme Panel</h1>
        <form method="post" action="options.php">
	        <?php
	            settings_fields("business_section", "social_section");
	            do_settings_sections("theme-options");      
	            submit_button(); 
	        ?>          
	    </form>
    </div>
	<?php
}

// Add it to the admin menu
function add_theme_menu_item()
{
    add_menu_page("US Digital Theme Settings", "US Digital Theme Settings", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");

function display_twitter_element()
{
	?>
    	<input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" />
    <?php
}

function display_facebook_element()
{
	?>
    	<input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" />
    <?php
}

function display_phone_element()
{
	?>
    	<input type="text" name="contact_phone" id="contact_phone" value="<?php echo get_option('contact_phone'); ?>" />
    <?php
}

function display_contact_address_element()
{
	?>
    <textarea type="text" name="contact_address" id="contact_address"><?php echo get_option('contact_address'); ?></textarea>
    <?php
}

function display_contact_hours_element()
{
	?>
    	<input type="text" name="contact_hours" id="contact_hours" value="<?php echo get_option('contact_hours'); ?>" />
    <?php
}

function display_promoted_link_element() {
    ?>
    	<input type="text" name="promoted_link" id="promoted_link" value="<?php echo get_option('promoted_link'); ?>" />
    <?php
}

function display_promoted_url_element() {
    ?>
    	<input type="text" name="promoted_url" id="promoted_url" value="<?php echo get_option('promoted_url'); ?>" />
    <?php
}

// Add custom settings to view and register them
function display_theme_panel_fields()
{
    // Add the social section
    add_settings_section("social_section", "Social Settings", null, "theme-options");
	add_settings_field("twitter_url", "Twitter Profile Url", "display_twitter_element", "theme-options", "social_section");
    add_settings_field("facebook_url", "Facebook Profile Url", "display_facebook_element", "theme-options", "social_section");

    // Add the business section
    add_settings_section("business_section", "Business Settings", null, "theme-options");
    add_settings_field("contact_phone", "Phone Number", "display_phone_element", "theme-options", "business_section");
    add_settings_field("contact_address", "Address", "display_contact_address_element", "theme-options", "business_section");
    add_settings_field("contact_hours", "Hours", "display_contact_hours_element", "theme-options", "business_section");
    add_settings_field("promoted_link", "Link text", "display_promoted_link_element", "theme-options", "business_section");
    add_settings_field("promoted_url", "Link location", "display_promoted_url_element", "theme-options", "business_section");

    // Register the settings
    register_setting("social_section", "twitter_url");
    register_setting("social_section", "facebook_url");

    register_setting("business_section", "contact_phone");
    register_setting("business_section", "contact_address");
    register_setting("business_section", "contact_hours");
    register_setting("business_section", "promoted_link");
    register_setting("business_section", "promoted_url");
}

add_action("admin_init", "display_theme_panel_fields");