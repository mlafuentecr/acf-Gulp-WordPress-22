<?php


/*-----------------------------------------------------------------*/
//     ADD tiny_mce FORMATS
/*-----------------------------------------------------------------*/



add_filter('mce_buttons_2', 'add_mce_buttons_2');
function add_mce_buttons_2($buttons)
{
    array_unshift($buttons, 'styleselect');
    return $buttons;
}

add_filter('tiny_mce_before_init', 'add_tiny_mce_before_init');
function add_tiny_mce_before_init($settings)
{
   
    $style_formats = array(
      array(  
        'title' => 'rs_underline',  
        'inline' => 'span',  
        'classes' => 'rs_underline',
        'wrapper' => true,
        'styles' => array(
          'text-decoration' => 'underline'
             )
      ),  
      array(  
        'title' => 'rs_circle',  
        'inline' => 'span',  
        'classes' => 'rs_circle',
        'wrapper' => true,
        'styles' => array(
          'border-radius' => '50%',
          'border' => '1px solid gray',
             )
      ), 
      array(  
        'title' => 'Uppercase',  
        'inline' => 'span',  
        'classes' => 'text-upperCase',
        'wrapper' => true,
        'styles' => array(
          'text-transform' => 'uppercase'
             )
      ),
    );
    // Before 3.1 you needed a special trick to send this array to the configuration.
    // See this post history for previous versions.
    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;
}



////ADD THE STYLE

function add_editor_styles_sub_dir() {
	add_editor_style( get_template_directory_uri() . '/dist/css/custom-editor-style.css' );
}
add_action( 'after_setup_theme', 'add_editor_styles_sub_dir' );




?>
