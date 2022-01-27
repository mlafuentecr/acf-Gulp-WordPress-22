<?php
// Load values and assign defaults.
/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();
$parallax_img = $pageFields['image'];

$parallax =  $pageFields['parallax'];
$full_width =  $pageFields['full_width'];

$horiz_pos =  $pageFields['horizontal_position'];
$vert_pos =  $pageFields['vertical_position'];
$height       = $pageFields['height'];
$margen = $pageFields['margen'];

if($parallax){
  $parallax_true = 'background-size: cover; background-attachment: fixed;';
 
}else{
  $parallax_true = '';

}


$full_width ?  $ignoreContainer = 'ignore-container' : $ignoreContainer = '';

 ?>

<section
  class='block_parallax <?php echo $block['className'] ?> <?php echo $ignoreContainer; ?>  <?php echo $margen; ?>'
  style="min-height: <? echo $height;?>px; ">
  <div class="parallax_background"
    style="min-height: <? echo $height;?>px; <? echo $parallax_true; ?>	background-image: url(<? echo $parallax_img; ?>);">
  </div>
</section>



<?php if (is_admin() ) { ?>
<!-- Only show this to admin -->
<style type="text/css">
.parallax_background {
  /* The image used */
  /* Set a specific height */

  min-height: <? echo $height;
  ?>px;
  /* Create the parallax scrolling effect */
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

</style>
<?php } ?>
