<?php
/*-----------------------------------------------------------------------------------*/
//     Dashboard Colors
/*-----------------------------------------------------------------------------------*/
// /*-----------------------------------------------------------------------------------*/
// /* ADMIN ENQUEUE
// /*-----------------------------------------------------------------------------------*/

function wp_admin_style()
{
    if ($GLOBALS['THEME_MLM_ENV']=== 'src') {
        wp_register_style('admin_css', $GLOBALS['THEME_MLM_PATH']  . '/assets/src/css/admin/admin.css', false, $GLOBALS["THEME_MLM_VER"]);
    } else {
        wp_register_style('admin_css', $GLOBALS['THEME_MLM_PATH']  . '/assets/'.$GLOBALS['THEME_MLM_ENV'].'/css/admin/admin.css', false, $GLOBALS["THEME_MLM_VER"]);
    }
    wp_enqueue_style('admin_css');
}
add_action('admin_enqueue_scripts', 'wp_admin_style');



/*-----------------------------------------------------------------------------------*/
//     Dashboard remove
/*-----------------------------------------------------------------------------------*/

function remove_dashboard_meta()
{
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); //Quick Press widget
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side'); //Recent Drafts
    remove_meta_box('dashboard_primary', 'dashboard', 'side'); //WordPress.com Blog
    remove_meta_box('dashboard_secondary', 'dashboard', 'side'); //Other WordPress News
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal'); //Incoming Links
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
    remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
    remove_action('welcome_panel', 'wp_welcome_panel');
}
add_action('admin_init', 'remove_dashboard_meta');



// Admin footer modification
function marioLafuente_remove_footer_admin()
{
    echo '<span id="footer-thankyou">Developed by <a href="https://Mariolafuente.com" target="_blank">Mariolafuente </a></span>';
}

add_filter('admin_footer_text', 'marioLafuente_remove_footer_admin');
