<?php 
//icons sin dashboad https://developer.wordpress.org/resource/dashicons/#star-filled
add_action('acf/init', 'my_acf_blocks_init');
function my_acf_blocks_init() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        acf_register_block_type(array(
            'name'              => 'testimonial',
            'title'             => __('Testimonial'),
            'description'       => __('A custom testimonial block.'),
            'render_template'   => get_template_directory() .'/inc/parts/blocks/block_testimonial.php',
           // 'enqueue_script'    => get_template_directory_uri() . '/'.$GLOBALS['THEME_MLM_ENV']. '/js/block_testimonial.js',
            'icon'              => 'star-filled',
            'category'          => 'media',
            'example'           => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'testimonial'   => "
                         simply dummy text of the printing and typesetting industry.
                         readable content of a page when looking at its layout. 
                         The point of using Lorem Ipsum is that it letters, 
                        ",
                        'author'        => "Jane Smith",
                        'role'          => "Admin",
                        'pic'           => 'https://picsum.photos/id/2/200/',
                        'is_preview'    => true
                    )
                )
            )
        ));
        acf_register_block_type(array(
            'name'              => 'rs_image',
            'title'             => __('rs_image'),
            'description'       => __('add image desktop and mobile'),
            'render_template'   => get_template_directory() .'/inc/parts/blocks/block_image.php',
           // 'enqueue_script'    => get_template_directory_uri() . '/'.$GLOBALS['THEME_MLM_ENV']. '/js/block_testimonial.js',
            'icon'              => 'format-image',
            'category'          => 'media',
            'example'           => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'pic'           => 'https://picsum.photos/id/2/200/',
                        'is_preview'    => true
                    )
                )
            )
        ));
        acf_register_block_type(array(
            'name'              => 'rs contact form',
            'title'             => __('rs_form'),
            'description'       => __('add the global form for contact'),
            'render_template'   => get_template_directory() .'/inc/parts/blocks/block_main_form.php',
           // 'enqueue_script'    => get_template_directory_uri() . '/'.$GLOBALS['THEME_MLM_ENV']. '/js/block_testimonial.js',
            'icon'              => 'welcome-write-blog',
            'category'          => 'media',
            'example'           => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'pic'           =>  get_template_directory() .'/inc/images/cform.jpg',
                        'is_preview'    => true
                    )
                )
            )
        ));


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
            'name'              => 'block load case study post',
            'title'             => __('RS load case study post'), 
            'description'       => __('Add Posts, Case Studies, Pages landings, has thumbnails'),
            'render_template'   => get_template_directory() .'/inc/parts/blocks/block_caseStudy_post.php',
            'icon'              => 'excerpt-view',
            'category'          => 'media',
            'example'           => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'cols'           => 2,
                        '_is_preview'   => 'true'
                    )
                )
            )
        ));

        // acf_register_block_type(array(
        //     'name'              => 'block Media & text',
        //     'title'             => __('RS Media & text'),
        //     'description'       => __('You can choose image , text , image & text or text & text block'),
        //     'render_template'   => get_template_directory() .'/inc/parts/blocks/block_media_text.php',
        //     'icon' => 'star-filled',
        //     'category'          => 'media',
        // ));




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

        acf_register_block_type(array(
            'name'              => 'block job position',
            'title'             => __('RS block job position'), 
            'description'       => __('block get job position'),
            'render_template'   => get_template_directory() .'/inc/parts/blocks/block_get_jobs.php',
            'icon'              => 'star-filled',
            'category'          => 'media',
        ));
        

        acf_register_block_type(array(
            'name'              => 'block main contact form',
            'title'             => __('RS main contact form'), 
            'description'       => __('block main contact form'),
            'render_template'   => get_template_directory() .'/inc/parts/blocks/block_main_form.php',
            'icon'              => 'star-filled',
            'category'          => 'media',
        ));

        acf_register_block_type(array(
            'name'              => 'block bg Image',
            'title'             => __('RS block bg Image'), 
            'description'       => __('block block bg Image'),
            'render_template'   => get_template_directory() .'/inc/parts/blocks/block_background_img.php',
            'icon'              => 'star-filled',
            'category'          => 'media',
        ));


        acf_register_block_type(array(
            'name'              => 'block Industries we serve',
            'title'             => __('RS block Industries we serve'), 
            'description'       => __('block block Industries we serve'),
            'render_template'   => get_template_directory() .'/inc/parts/blocks/block_Industries_we_serve.php',
            'icon'              => 'star-filled',
            'category'          => 'media',
        ));

        acf_register_block_type(array(
            'name'              => 'block Slider',
            'title'             => __('RS Slider'), 
            'description'       => __('block Slider'),
            'render_template'   => get_template_directory() .'/inc/parts/blocks/block_slider.php',
            'icon'              => 'star-filled',
            'category'          => 'media',
        ));


        acf_register_block_type(array(
            'name'              => 'block Tech Stack Logos',
            'title'             => __('RS Tech Stack Logos'), 
            'description'       => __('block Tech Stack Logos'),
            'render_template'   => get_template_directory() .'/inc/parts/blocks/block_tech_stack.php',
            'icon'              => 'star-filled',
            'category'          => 'media',
        ));

        acf_register_block_type(array(
            'name'              => 'block cols',
            'title'             => __('RS cols'), 
            'description'       => __('Add a max of 12 divs, or less '),
            'render_template'   => get_template_directory() .'/inc/parts/blocks/block_cols.php',
            'icon'              => 'table-row-after',
            'category'          => 'media',
            'example'           => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'cols'        => 3,
                        '_is_preview'   => 'true'
                    )
                )
            )
        ));



        acf_register_block_type(array(
            'name'              => 'block text media1',
            'title'             => __('RS text media1'), 
            'description'       => __('block text media1'),
            'render_template'   => get_template_directory() .'/inc/parts/blocks/block_text_media.php',
            'icon'              => 'star-filled',
            'category'          => 'media',
            'example'           => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'testimonial'   => "Blocks are...",
                        'author'        => "Jane Smith",
                        'role'          => "Person",
                        'is_preview'    => true
                    )
                )
                    )));



    }
}

?>
