<?php 
//icons sin dashboad https://developer.wordpress.org/resource/dashicons/#star-filled
add_action('acf/init', 'my_acf_blocks_init');
function my_acf_blocks_init() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        
        acf_register_block_type(array(
            'name'              => 'block_copyrights',
            'title'             => __('RS copyrights'),
            'description'       => __('copyrights'),
            'render_template'   => get_template_directory() .'/inc/parts/blocks/block_copyrights.php',
            'icon' => 'star-filled',
            'category'          => 'media',
        ));

  
        acf_register_block_type(array(
            'name'              => 'block caseStudy headline',
            'title'             => __('RS CaseStudy headline'), //THIS can't have spaces
            'description'       => __('block for case_study 1 block headline 2cond block description'),
            'render_template'   => get_template_directory() .'/inc/parts/blocks/block_case_study_headline.php',
            'icon'              => 'star-filled',
            'category'          => 'media',
        ));

        acf_register_block_type(array(
            'name'              => 'block Media & text',
            'title'             => __('RS Media & text'),
            'description'       => __('You can choose image , text , image & text or text & text block'),
            'render_template'   => get_template_directory() .'/inc/parts/blocks/block_media_text.php',
            'icon' => 'star-filled',
            'category'          => 'media',
        ));




        acf_register_block_type(array(
            'name'              => 'block objectives',
            'title'             => __('RS Objectives'), 
            'description'       => __('block objectives '),
            'render_template'   => get_template_directory() .'/inc/parts/blocks/block_objectives.php',
            'icon'              => 'star-filled',
            'category'          => 'media',
            'mode'              => 'preview',
            'keywords'          => array( 'introduction', 'layout' ),
        ));


        acf_register_block_type(array(
            'name'              => 'block underline',
            'title'             => __('RS Underline'), 
            'description'       => __('block objectives '),
            'render_template'   => get_template_directory() .'/inc/parts/blocks/block_text_underline.php',
            'icon'              => 'star-filled',
            'category'          => 'media',
        ));


        acf_register_block_type(array(
            'name'              => 'block parallax',
            'title'             => __('RS parallax'), 
            'description'       => __('block parallax'),
            'render_template'   => get_template_directory() .'/inc/parts/blocks/block_parallax.php',
            'icon'              => 'star-filled',
            'category'          => 'media',
        ));

        acf_register_block_type(array(
            'name'              => 'block Faqs',
            'title'             => __('RS Faqs'), 
            'description'       => __('block Faqs'),
            'render_template'   => get_template_directory() .'/inc/parts/blocks/block_faqs.php',
            'icon'              => 'star-filled',
            'category'          => 'media',
        ));
     
        acf_register_block_type(array(
            'name'              => 'block load case study post',
            'title'             => __('RS load case study post'), 
            'description'       => __('block load case study post'),
            'render_template'   => get_template_directory() .'/inc/parts/blocks/block_caseStudy_post.php',
            'icon'              => 'star-filled',
            'category'          => 'media',
        ));

        acf_register_block_type(array(
            'name'              => 'block_what_we_do',
            'title'             => __('RS what we do'), 
            'description'       => __('block what_we_do'),
            'render_template'   => get_template_directory() .'/inc/parts/blocks/block_what_we_do.php',
            'icon'              => 'star-filled',
            'category'          => 'media',
        ));

        acf_register_block_type(array(
            'name'              => 'block get posts',
            'title'             => __('RS block get posts'), 
            'description'       => __('block get posts'),
            'render_template'   => get_template_directory() .'/inc/parts/blocks/block_get_posts.php',
            'icon'              => 'star-filled',
            'category'          => 'media',
        ));


        

    }
}

?>
