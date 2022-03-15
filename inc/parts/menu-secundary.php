<?php
      wp_nav_menu(
        array( 
        'theme_location' => 'footer',
        'container'      => 'navbar',
        'menu_class'     => 'nav-secundary',
        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'item_spacing'   => 'preserve',

      ) );
    ?>
