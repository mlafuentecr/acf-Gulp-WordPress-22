<?php

add_filter( 'block_categories_all' , 'director_custom_block_category' );
function director_custom_block_category( $categories ) {

  $categories[] = array(
    'slug'  => 'director-blocks',
    'title' => 'director Custom Blocks'
  );
  return $categories;
}



add_action('acf/init', 'director_acf_blocks_init');
function director_acf_blocks_init() {
  $path = get_template_directory_uri() . '/dist';
  // Check function exists.
  if ( function_exists( 'acf_register_block_type' ) ) {

    //TESTIMONIAL GLOBAL
    acf_register_block_type(array(
      'name'              => 'Ut Global Testimonial',
      'title'             => __('director Global Testimonial'),
      'description'       => __('A custom Testimonial block.'),
      'render_template'   => get_template_directory() .'/inc/template-parts/blocks/block-global-testimonial.php',
      'icon'              => 'star-filled',
      'category'          => 'director-blocks',
      'mode'              => 'edit',
    ));

    //TESTIMONIAL SINGLE
    acf_register_block_type(array(
      'name'              => 'Ut Testimonial ',
      'title'             => __('director Testimonial'),
      'description'       => __('A custom Testimonial block.'),
      'render_template'   => get_template_directory() .'/inc/template-parts/blocks/block-testimonial.php',
      'icon'              => 'star-filled',
      'category'          => 'director-blocks',
      'mode'              => 'edit',
    ));

    //TESTIMONIAL full width blue
    acf_register_block_type(array(
      'name'              => 'Ut Testimonial full width ',
      'title'             => __('director Testimonial Full Width'),
      'description'       => __('A full-width version of the custom Testimonial block'),
      'render_template'   => get_template_directory() .'/inc/template-parts/blocks/block-testimonial.php',
      'icon'              => 'star-filled',
      'category'          => 'director-blocks',
			'example'           => array(
        'attributes'       => array(
            'mode'        => 'edit',
            'data'        => array(
              'is_preview'  => false,
							'full_width'  => 'blue',
            )
          )
      )
    ));

    //Block Grain Industry
    acf_register_block_type(array(
      'name'              => 'Ut Grain Blocks',
      'title'             => __('director Global Grain Industry'),
      'description'       => __('Add global Grain Industry blocks.'),
      'render_template'   => get_template_directory() .'/inc/template-parts/blocks/block-grain-industry.php',
      'icon'              => 'star-filled',
      'category'          => 'director-blocks',
      'mode'              => 'edit',
    ));

    //Block Carusel
    acf_register_block_type(array(
      'name'              => 'Ut Carusel Media',
      'title'             => __('director Media Carousel'),
      'description'       => __('Customized carousel for images and text.'),
      'render_template'   => get_template_directory() .'/inc/template-parts/blocks/block-carousel.php',
      'enqueue_script'    => get_template_directory_uri() . '/dist/js/_block_carousel.js',
      'icon'              => 'star-filled',
      'category'          => 'director-blocks',
      'mode'              => 'edit',
    ));
    //Block News Stories
    acf_register_block_type(array(
     'name'              => 'Ut News Stories',
     'title'             => __('director News Stories'),
     'description'       => __('Customized carousel for News Stories'),
     'render_template'   => get_template_directory() .'/inc/template-parts/blocks/block-newstories.php',
     'icon'              => 'star-filled',
     'category'          => 'director-blocks',
     'mode'              => 'edit',
    ));

      //Block Sponsors Logos
      acf_register_block_type(array(
        'name'              => 'Ut Sponsors Logos',
        'title'             => __('director Sponsors Logos'),
        'description'       => __('Customized carousel for Sponsors Logos'),
        'render_template'   => get_template_directory() .'/inc/template-parts/blocks/block-sponsors.php',
        'enqueue_script'    => get_template_directory_uri() . '/dist/js/_block_sponsors.js',
        'icon'              => 'star-filled',
        'category'          => 'director-blocks',
        'mode'              => 'edit',
      ));

    // Accordion Block
    acf_register_block_type( array(
      'name'              => 'director Accordion',
      'title'             => __('director Accordion'),
      'description'       => __('Insert a generic accordion into the page'),
      'render_template'   => get_template_directory() .'/inc/template-parts/blocks/block-accordion.php',
      'icon'              => 'star-filled',
      'category'          => 'director-blocks',
      'mode'              => 'edit',
    ));

    // Course-Bio Accordion Block
    acf_register_block_type( array(
      'name'              => 'director Course Bio Accordion',
      'title'             => __('director Course Bio Accordion'),
      'description'       => __('Insert an accordion that is formatted specifically for course instructor bios'),
      'render_template'   => get_template_directory() .'/inc/template-parts/blocks/block-accordion-bio.php',
      'icon'              => 'star-filled',
      'category'          => 'director-blocks',
      'mode'              => 'edit',
    ));

    // Course-Schedule Accordion Block
    acf_register_block_type( array(
      'name'              => 'director Course Schedule Accordion',
      'title'             => __('director Course Schedule Accordion'),
      'description'       => __('Insert an accordion that is formatted specifically for course schedules'),
      'render_template'   => get_template_directory() .'/inc/template-parts/blocks/block-accordion-schedule.php',
      'icon'              => 'star-filled',
      'category'          => 'director-blocks',
      'mode'              => 'edit',
    ));

    // Exchange Session Accordion Block
    acf_register_block_type( array(
      'name'              => 'director Exchange Session Accordion',
      'title'             => __('director Exchange Session Accordion'),
      'description'       => __('Insert an accordion that is formatted specifically for event sessions with speakers'),
      'render_template'   => get_template_directory() .'/inc/template-parts/blocks/block-accordion-session.php',
      'icon'              => 'star-filled',
      'category'          => 'director-blocks',
      'mode'              => 'edit',
    ));

    // Exchange Speakers Block
    acf_register_block_type( array(
      'name'              => 'director Exchange Speakers',
      'title'             => __('director Exchange Speakers'),
      'description'       => __('Insert a block that displays speakers for a session or an entire event.'),
      'render_template'   => get_template_directory() .'/inc/template-parts/blocks/block-speakers.php',
      'icon'              => 'star-filled',
      'category'          => 'director-blocks',
      'mode'              => 'edit',
    ));
  }
}

