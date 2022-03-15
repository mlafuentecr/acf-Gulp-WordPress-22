<?php
//Sidebar
//add_action('widgets_init', 'my_register_sidebars');
function my_register_sidebars()
{
 /* Register the 'primary' sidebar. */
 register_sidebar(
  array(
   'id' => 'primary',
   'name' => __('Primary Sidebar'),
   'description' => __('A short description of the sidebar.'),
   'before_widget' => '<aside id="sidebarMenu" class=" col-md-3 col-lg-2 d-md-block bg-light sidebar mr-4 ">',
   'after_widget' => '</aside>',
   'before_title' => '<h3 class="widget-title">',
   'after_title' => '</h3>',
  )
 );
 /* Repeat register_sidebar() code for additional sidebars. */
}
