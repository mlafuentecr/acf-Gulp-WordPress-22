<?php 



/*-----------------------------------------------------------------------------------*/
/*  BLOCK PATH FOR ALL BLOCKs
/*-----------------------------------------------------------------------------------*/
// function block_render_callback( $block ) {

// 	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
// 	$slug = str_replace('acf/', '', $block['name']);
//   include_once( get_template_directory() .`/inc/parts/block-{$slug}.php` );
// 	// include a template part from within the "template-parts/block" folder
// 	// if( file_exists( get_template_directory() .`/inc/parts/block-{$slug}.php` ) ) {
//   //   var_dump('xxxxxxxxxx');
//   //   include_once( get_template_directory() .`/inc/parts/block-{$slug}.php` );
// 	// }
  
// }





// /*-----------------------------------------------------------------------------------*/
// /*  BLOCKS REGISTER
// /*-----------------------------------------------------------------------------------*/
// add_action('acf/init', 'my_acf_init');
// function my_acf_init() {
	
// 	// check function exists
// 	if( function_exists('acf_register_block') ) {
		
// 		// register a testimonial block
// 		acf_register_block(array(
// 			'name'				=> 'testimonial',
// 			'title'				=> __('Testimonial'),
// 			'description'		=> __('A custom testimonial block.'),
// 			'render_callback'	=> 'block_render_callback',
// 			'category'			=> 'formatting',
// 			'icon'				=> 'admin-comments',
// 			'keywords'			=> array( 'testimonial', 'quote' ),
// 		));
// 	}
// }



?>
