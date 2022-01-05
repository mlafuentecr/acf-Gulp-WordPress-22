<?php
/*-----------------------------------------------------------*/
/*  customers logos
/*-----------------------------------------------------------*/
$sectionlogo_heading   = get_field('section-logo-heading', 'option');
$link_customer = get_field('link_customer', 'option');
$logos = get_field('logo_repeater', 'option');

?>
<section class="customers my-5">
  <div class="container">
    <div class="row">
      <!-- <h2><?php // echo $sectionlogo_heading; ?></h2> -->

      <?php
    if ($logos) {
        echo '<div class="slick-arrow slick-prev"> </div>';
        echo '<ul class="logos_carusel">';
        foreach ($logos as $row) {
            echo '<li><a rel="noopener"   href="'.  $row["logo_link"] .'" target="_blank" >
            <img loading=“lazy”  width="250px" height="73px" src="' .  $row["logo"] . '" alt="'.  $row["logo_link"] .'">
            </a></li>';
        }
        echo '</ul>';
        echo '<div class="slick-arrow slick-next"> </div>';
    }
      ?>

      <a class='arrow' rel="noopener" href="<?php echo $link_customer['url']; ?>"
        target="_blank"><?php echo $link_customer['title']; ?>
      </a>
    </div>
  </div>
</section>
<!--  /.  customers logos -->
