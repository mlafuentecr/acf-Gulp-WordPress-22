<?php
      wp_nav_menu(
        array( 
        'theme_location' => 'top',
        'container'      => 'navbar',
        'menu_class'     => 'menu-primary navbar-collapse justify-content-evenly mt-md-0 collapse d-flex flex-column  flex-md-row  m-auto m-md-0   m-md-0 p-0  align-items-center  ',
        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'item_spacing'   => 'preserve',

      ) );
    ?>
