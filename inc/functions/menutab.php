<?php
/**
 * https://www.advancedcustomfields.com/resources/get-values-from-an-options-page/
 * <p><?php the_field('field_name', 'option'); ?></p>
*
*/


if (function_exists('acf_add_options_page')) {

acf_add_options_page(array(
'page_title' => 'Theme Settings',
'menu_title' => 'Theme Settings',
'menu_slug' => 'theme-general-settings',
'capability' => 'edit_posts',
'icon_url' => 'dashicons-images-alt2',
'position' => 3,
'redirect' => false
));

// acf_add_options_sub_page(array(
// 'page_title' => 'Global',
// 'menu_title' => 'Global',
// 'parent_slug' => 'theme-general-settings',
// ));
}
