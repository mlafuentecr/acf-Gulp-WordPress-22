<?php
/*-----------------------------------------------------------*/
/*  customers logos
/*-----------------------------------------------------------*/
$sectionlogo_heading   = get_field('section-logo-heading', 'option');
$logos = get_field('logo_repeater', 'option');

$link_customer = get_field('link_customer', 'option');
if ($link_customer):
  $link_customer_url     = $link_customer ['url'];
  $link_customer_title   = $link_customer ['title'];
  $link_customer_target  = $link_customer ['target'] ? $link['target'] : '_self';
endif;
?>
<section class="customers ">
  <div class="container">
    <div class="row">
      <h2><?php echo $sectionlogo_heading; ?></h2>

      <?php
    if ($logos) {
   
        echo '<ul class="logos_carusel">';
        foreach ($logos as $row) {
            echo '<li><a rel="noopener"   href="'.  $row["logo_link"] .'" target="_blank" >
            <img loading=“lazy” src="' .  $row["logo"] . '" alt="'.  $row["logo_link"] .'">
            </a></li>';
        }
        echo '</ul>';
    }
      ?>

      <a class='arrow' rel="noopener" href="<?php echo $link_customer_url; ?>"
        target="_blank"><?php echo $link_customer_title; ?>
      </a>
    </div>
  </div>
</section>
<!--  /.  customers logos -->
