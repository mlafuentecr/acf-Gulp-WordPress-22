<?php 


  //Variable = $block data comming from acf when you register if there isn not( ACF yet put a defulth)
  $block_testimonial_img          = $block['data']['pic'] ?: ( get_field('block_testimonial_pic')['url']  ?: 'https://picsum.photos/id/1/300/');
  $block_testimonial_testimonial  = $block['data']['testimonial'] ?: ( get_field('block_testimonial_testimonial')['url']  ?: 'CLICK HERE AND THEN THE PENCIL TO EDIT...');
  $block_testimonial_author       = $block['data']['author'] ?: ( get_field('block_testimonial_author')  ?: 'Jhon Doe');
  $block_testimonial_role         = $block['data']['role'] ?: ( get_field('block_testimonial_role')  ?: 'Admin');

  //if we are in previewmode css is col-6
  $block['data']['testimonial'] ? $css_correction = 'col-6' : $css_correction = 'col-12';


    ?>

<blockquote class="block_testimonial col-12 d-flex">
  <!-- IF IMG -->
  <?php if( $block_testimonial_img ): ?>
  <div class=" <?php echo $css_correction; ?> col-md-6 p-2  block_testimonial-img text-center">
    <img src="<?php echo $block_testimonial_img; ?>" />
  </div>
  <?php endif; ?>

  <div class="<?php echo $css_correction; ?> col-md-6 p-2 block_testimonial-text">
    <?php echo $block_testimonial_testimonial ?>
    </br>
    <b> <span class='autor'><?php echo $block_testimonial_author ?></span>
      <span class='role'><?php echo $block_testimonial_role ?></span>
    </b>
  </div>
</blockquote>



<!-- /*
$data = array(
'testimonial' => "
simply dummy text of the printing and typesetting industry.
readable content of a page when looking at its layout.
The point of using Lorem Ipsum is that it letters,
",
'author' => "Jane Smith",
'role' => "Admin",
'pic' => 'https://picsum.photos/id/2/200/',
'is_preview' => true
);
//////
'example' => array(
'attributes' => array(
'mode' => 'preview',
'data' => array(
'testimonial' => "
simply dummy text of the printing and typesetting industry.
readable content of a page when looking at its layout.
The point of using Lorem Ipsum is that it letters,
",
'author' => "Jane Smith",
'role' => "Admin",
'pic' => 'https://picsum.photos/id/2/200/',
'is_preview' => true
)
)
)

*/ -->
