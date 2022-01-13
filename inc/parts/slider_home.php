<?php  ?>
<div class="video_hero_container">
  <?php if ( wp_is_mobile() ) : ?>
  <video class="video-fluid desktop z-depth-1 video_hero_mobile d-block d-sm-block d-md-none" autoplay loop controls
    muted>
    <source src="<?php  echo bloginfo('template_url') . '/inc/videos/rootstrap-reel-13.mp4';?>" type="video/mp4" />
  </video>
  <?php else : ?>
  <video class="video-fluid mobile z-depth-1 video_hero d-none d-sm-none d-md-block" autoplay loop controls muted>
    <source src="<?php   echo bloginfo('template_url') . '/inc/videos/rootstrap-mobile-01.mp4';?>" type="video/mp4" />
  </video>
  <?php endif; ?>
</div>
