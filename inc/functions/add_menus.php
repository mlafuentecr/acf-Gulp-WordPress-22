<?php
/*-----------------------------------------------------------------------------------*/
/* Register menus for Wordpress use
/*-----------------------------------------------------------------------------------*/
register_nav_menus(array('top'      => __('Top',     'mlm'),));
register_nav_menus(array('mobile'   => __('Mobile',  'mlm'),));
register_nav_menus(array('footer'   => __('Footer',  'mlm'),));
register_nav_menus(array('social'   => __('Social',  'mlm'),));
//register_nav_menus(array('blog'     => __('Blog',    'mlm'), ));
/*-----------------------------------------------------------------------------------*/
/* add active
/*-----------------------------------------------------------------------------------*/
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}
