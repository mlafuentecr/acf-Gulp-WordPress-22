<div id="carouselAuthors" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <header class="headline">
    <div class="container">
      <div class="col-12 col-md-8">
        <?php echo $pageFields['headline']; ?>
      </div>
    </div>
  </header>
  <div class="carousel-inner mb-5 position-relative">
    <?php
//IMAGES FOR SLIDER
$numberOfImages = 10;
$imgNumber      = 1;
$pics           = get_field('team_pictures', 10020);
//var_dump($pics);
if ($pics) {

 $numberOfSlider = round(count($pics) / $numberOfImages);

 //SLIDER ONLY
 for ($slidernumber = 0; $slidernumber <= $numberOfSlider; $slidernumber++) {
  //set the slider to 1 and not 0
  $slidernumber === 0 ? $slidernumber = 1 : $slidernumber;
  //always first slider is active
  $slidernumber === 1 ? $status = 'active' : $status = '';

  //IMAGES OF SLIDER
  echo '<div class="carousel-item ' . $status . '" data-bs-interval="10000"> ';
  echo '<div class="images-wrapper masonry-with-columns">';
  echo insertPics($pics, $slidernumber, $imgNumber, $numberOfImages);
  echo '</div>';
  echo '</div>';
 }

}

?>
  </div>
  <!-- <a class="rs_link_underline my-5" href="#">See All Authors </a> -->
  <div class="container position-relative">
    <div class="buttons">
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselAuthors" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselAuthors" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

</div>
