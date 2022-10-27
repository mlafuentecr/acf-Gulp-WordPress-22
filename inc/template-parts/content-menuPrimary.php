<?php
  wp_nav_menu(
    array(
      'theme_location'  => 'position_top',
      'menu'            => 'topnav',
      'container'       => 'div', 
      'container_class' => 'collapse navbar-collapse', 
      'container_id'    => 'navbar-top',
      'menu_class'      => 'menu', 
      'items_wrap'      => '<ul class="navbar-nav w-100 %2$s">%3$s</ul>',
    )
  );
?>
