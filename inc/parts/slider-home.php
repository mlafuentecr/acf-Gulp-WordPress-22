<?php  ?>
<div class="video_hero_container">
  <?php if ( !wp_is_mobile() ) : ?>
  <video class="container-fluid desktop z-depth-1  m-0 p-0  d-none  d-md-block " autoplay loop controls muted>
    <source src="<?php  echo bloginfo('template_url') . '/inc/videos/rootstrap-reel-13.mp4';?>" type="video/mp4" />
  </video>
  <?php else : ?>
  <video class="container-fluid mobile z-depth-1 m-0 p-0 d-block  d-md-none " autoplay loop controls muted>
    <source src="<?php   echo bloginfo('template_url') . '/inc/videos/rootstrap-mobile-01.mp4';?>" type="video/mp4" />
  </video>
  <?php endif; ?>
</div>
