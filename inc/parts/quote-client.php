<?php
/*  7 Quote  */
$seventh_heading   = get_field('seventh_heading', 'options');
$seventh_testimonial  = get_field('seventh_testimonial', 'options');
$seventh_name  = get_field('seventh_name', 'options');
$seventh_position  = get_field('seventh_position', 'options');
$seventh_photo  = get_field('seventh_photo', 'options');
$seventh_link  = get_field('seventh_link', 'options');
?>
<section class="quotes-from-client ">
  <div class="container">
    <?php if($seventh_heading): ?>
    <div class="title title-purple"><?php echo $seventh_heading; ?></div><?php endif; ?>

    <div class="imgcontainer col-12 col-md-6">
      <img class="boxShadow"  width="500px" height="270px" loading=“lazy” src="<?php echo $seventh_photo["url"]; ?>"
        alt="<?php echo $seventh_name; ?>">
    </div>
    <div class="text col-12 col-md-6">
      <?php echo $seventh_testimonial; ?>
      <div class="testimon-name"><?php echo $seventh_name; ?></div>
      <div class="testimon-position"><?php echo $seventh_position; ?></div>
    </div>



  </div>
</section>
