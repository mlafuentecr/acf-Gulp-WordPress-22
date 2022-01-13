<?php
      wp_nav_menu(
        array( 
        'theme_location' => 'primary',
        'container'      => 'navbar',
        'menu_class'     => 'navigation-main d-flex flex-column  flex-md-row  m-0 p-0 gap-1 flex-grow-1 align-items-center justify-content-between justify-content-sm-end float-md-end ',
        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'item_spacing'   => 'preserve',

      ) );
    ?>
