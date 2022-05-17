<?php  ?>
<!-- THIS VIDEOS ARE LOAD IN JS ON slider_home.js -->
<div class="video_hero_container">
  <?php if ( !wp_is_mobile() ) : ?>
  <video id="video-desktop" data-video="<?php  echo bloginfo('template_url') . '/inc/videos/rootstrap-reel-13.mp4';?>"
    class="container-fluid desktop z-depth-1  m-0 p-0  d-none  d-md-block " loop controls muted>
    <!-- VIDEO IS LOADING FROM JS SLIDER_HOME -->
  </video>
  <?php else : ?>
  <video id="video-mobile" data-video="<?php   echo bloginfo('template_url') . '/inc/videos/rootstrap-mobile-01.mp4';?>"
    class="container-fluid mobile z-depth-1 m-0 p-0 d-block  d-md-none " loop controls muted>
    <!-- VIDEO IS LOADING FROM JS SLIDER_HOME -->
  </video>
  <?php endif; ?>
</div>
