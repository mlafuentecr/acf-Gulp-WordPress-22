<?php
// Load values and assign defaults.
/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();
$add_container =get_fields('add_container'); 
$postId = $pageFields['post']; 
$numPost = count($postId);

 ?>

<?php if( $addContainer ) {echo '<div class="container">';}  ?>

<?php 
  if($numPost <= 1) {
    $postFields = get_fields( $postId[0] );
    $client   = $postFields['headline_info']['clients']; 
    $client   = str_replace(" ","_", strtolower($client));  
    $margen   = $pageFields['margen'];
    
    $image    = $postFields['headline']['headline_image'];
    $bg_color = $postFields['small_description']['background_color'];
    $excerpt  = $postFields['small_description']['excerpt'];
    $thumb    = $postFields['small_description']['thumbnail'];
    //Get thumbnail image if is not then take the other image
    $thumbnail = $thumb ? $thumbnail = $thumb['url'] : $thumbnail = $image['url'];
   
  ?>

<section class="block_post py-5 <?php echo $client.' '.$block['className'].' '.$margen; ?>"
  style="background-color: <?php  echo $bg_color; ?>">
  <div class="container  my-5 ">
    <a class='card-link' href="<?php echo get_permalink( $postId[0] ); ?>" rel="noopener noreferrer">
      <div class="d-flex flex-wrap ">
        <div class="col-12 col-md-6  fit-background zoom_img"
          style="background-image: url(<?php  echo $thumbnail; ?>);">
        </div>
        <div class="col-12 col-md-5 p-5 ">
          <?php  echo $excerpt; ?>
        </div>
      </div>
    </a>
  </div>
</section>

<?php }else{ ?>


<section class="block_post<?php echo ' '.$block['className'].' '; ?>">
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 g-3 ">

      <?php
    foreach ($postId as $post) {
      $postFields = get_fields( $post );
      $client     = $postFields['headline_info']['clients']; 
      $client     = str_replace(" ","_", strtolower($client));  
      $image      = $postFields['headline']['headline_image'];
      $bg_color   = $postFields['small_description']['background_color'];
      $excerpt    = $postFields['small_description']['excerpt'];
      $margen     = $pageFields['margen'];
  
      $thumb      = $postFields['small_description']['thumbnail']; //
      //Get thumbnail image if is not then take the other image
      $thumbnail  = $thumb ? $thumbnail = $thumb['url'] : $thumbnail = $image['url'];
  ?>
      <div class="col <?php echo $margen; ?>">
        <a class='card-link' href="<?php echo get_permalink( $post ); ?>" rel="noopener noreferrer">
          <div class="card bg-transparent shadow-sm ">
            <div class="card-img mb-4 zoom_img" style="background-image: url(<?php  echo $thumbnail; ?>);"></div>
            <div class="card-body  p-0  ">
              <?php  echo $excerpt; ?>
            </div>
          </div>
        </a>
      </div>

      <?php
   }
  ?>

    </div>
  </div>
</section>



<?php  } ?>


<?php if($addContainer ) {echo '</div>';}  ?>



<?php if (is_admin() ) { ?>
<!-- Only show this to admin -->
<style type="text/css">
.block_post {
  margin: 10px;
  padding: 10px;
  background-color: gray;
  min-height: 100px;
}

.row-cols-md-2 {
  display: flex;
}

.d-flex {
  display: flex;
}

.fit-background {
  width: 50%;
  background-position: center;
  background-size: cover;
  height: 300px;
}

.col-md-5 {
  width: 50%;
  margin-left: 20px;
}

.card-link {
  text-decoration: none;
  color: black;

  &:hover {
    text-decoration: none;
    color: black;
  }
}

</style>
<?php } ?>
