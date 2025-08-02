<?php
/*
Plugin Name: Custom Dashboard Widget
Description: Adds a custom dashboard widget with useful site info.
Version: 1.0
Author: Cryptoball cryptoball7@gmail.com
*/

// Hook into the 'wp_dashboard_setup' action to register the widget
add_action('wp_dashboard_setup', 'cdw_register_dashboard_widget');

function cdw_register_dashboard_widget() {
    wp_add_dashboard_widget(
        'cdw_site_info_widget',          // Widget slug
        'Site Info Widget',              // Title
        'cdw_display_dashboard_widget'   // Display function
    );
}

// Function to output the content of the widget
function cdw_display_dashboard_widget() {
    $site_title   = get_bloginfo('name');
    $admin_email  = get_bloginfo('admin_email');
    $theme        = wp_get_theme();

    echo '<ul style="line-height:1.8;">';
    echo '<li><strong>Site Title:</strong> ' . esc_html($site_title) . '</li>';
    echo '<li><strong>Admin Email:</strong> ' . esc_html($admin_email) . '</li>';
    echo '<li><strong>Active Theme:</strong> ' . esc_html($theme->get('Name')) . '</li>';
    echo '</ul>';
}

// Optional: Style the widget with some admin CSS
add_action('admin_head', 'cdw_dashboard_widget_styles');

function cdw_dashboard_widget_styles() {
    echo '<style>
        #cdw_site_info_widget ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>';
}
