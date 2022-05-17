<?php 
  $id = get_the_ID();   

 $pageFields       = get_fields($id);
 $cols             = $pageFields['cols'] ?: 3;
 $add_title        = $pageFields['add_title'] ?: true;
 $add_excerpt      = $pageFields['add_excerpt'] ?: true;
 $add_author       = $pageFields['add_author_info'] ?: true;
 $image_id = get_post_thumbnail_id($id );
 $alt_text = get_post_meta($image_id , '_wp_attachment_image_alt', true);

?>

<div class="col my-5 ">
  <div class="card post-<?php echo $id; ?> bg-transparent ">
    <a class="card-link " href="<?php echo  get_permalink(  $id ); ?>" rel="noopener noreferrer">
      <div class="card-img mb-4 zoom_img" role="img" aria-label='<?php echo $alt_text; ?>'
        style="background-image: url(<?php   echo get_the_post_thumbnail_url( $id ); ?>);">
      </div>
    </a>

    <div class="card-body  p-0  ">
      <?php if($add_title): ?>
      <a class="card-link text-gray" href="<?php echo   get_permalink($id ); ?>" rel="noopener noreferrer">
        <div class="title link_main_style links-with-line">
          <?php  echo $post->post_title; ?>
        </div>
      </a>
      <?php endif; ?>

      <!-- Show excerpt -->
      <div class="content text-gray">
        <?php // the_excerpt($id); ?>
        <?php echo wp_trim_words(get_the_excerpt($id), 35); ?>
      </div>

      <?php get_template_part("/inc/parts/card", "author"); ?>


    </div>
    <!-- end card-body -->
  </div>
  <!-- end card -->

</div>
