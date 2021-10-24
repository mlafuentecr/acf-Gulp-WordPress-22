<?php
/*  7 Quote  */
$seventh_heading   = get_field('seventh_heading', 'options');
$seventh_testimonial  = get_field('seventh_testimonial', 'options');
$seventh_name  = get_field('seventh_name', 'options');
$seventh_position  = get_field('seventh_position', 'options');
$seventh_photo  = get_field('seventh_photo', 'options');
$seventh_link  = get_field('seventh_link', 'options');
?>
<section class="quotes bg-gray">
  <div class="container">
    <?php if($seventh_heading): ?>
    <h2><?php echo $seventh_heading; ?></h2><?php endif; ?>

    <div class="imgcontainer col-12 col-md-6">
      <img class="boxShadow" loading=“lazy” src="<?php echo $seventh_photo["url"]; ?>"
        alt="<?php echo $seventh_name; ?>">
    </div>
    <div class="text col-12 col-md-6">
      <?php echo $seventh_testimonial; ?>
      <div class="home-section__testimon-name"><?php echo $seventh_name; ?></div>
      <div class="home-section__testimon-position"><?php echo $seventh_position; ?></div>
    </div>



  </div>
</section>
