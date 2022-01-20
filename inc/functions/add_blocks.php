<?php 
//icons sin dashboad https://developer.wordpress.org/resource/dashicons/#star-filled
add_action('acf/init', 'my_acf_blocks_init');
function my_acf_blocks_init() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        
        acf_register_block_type(array(
            'name'              => 'block_copyrights',
            'title'             => __('copyrights'),
            'description'       => __('copyrights'),
            'render_template'   => get_template_directory() .'/inc/parts/blocks/block_copyrights.php',
            'icon' => 'star-filled',
            'category'          => 'media',
        ));

  
        acf_register_block_type(array(
            'name'              => 'block caseStudy headline',
            'title'             => __('block_caseStudy_headline'), //THIS can't have spaces
            'description'       => __('block for case_study 1 block headline 2cond block description'),
            'render_template'   => get_template_directory() .'/inc/parts/blocks/block_case_study_headline.php',
            'icon'              => 'star-filled',
            'category'          => 'media',
        ));

        acf_register_block_type(array(
            'name'              => 'block box content',
            'title'             => __('block_box_content'),
            'description'       => __('You can choose image , text , image & text or text & text block'),
            'render_template'   => get_template_directory() .'/inc/parts/blocks/block_box_content.php',
            'icon' => 'star-filled',
            'category'          => 'media',
        ));




        acf_register_block_type(array(
            'name'              => 'block objectives',
            'title'             => __('block_objectives'), //THIS can't have spaces
            'description'       => __('block objectives '),
            'render_template'   => get_template_directory() .'/inc/parts/blocks/block_objectives.php',
            'icon'              => 'star-filled',
            'category'          => 'media',
        ));

    }
}

?>
