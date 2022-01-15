<?php 
//icons sin dashboad https://developer.wordpress.org/resource/dashicons/#star-filled
add_action('acf/init', 'my_acf_blocks_init');
function my_acf_blocks_init() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        
        acf_register_block_type(array(
            'name'              => 'block_copyrights',
            'title'             => __('copyrights'),
            'description'       => __('Boton para registrarse'),
            'render_template'   => get_template_directory() .'/inc/parts/blocks/copyrights.php',
            'icon' => 'star-filled',
            'category'          => 'media',
        ));



    }
}

?>
