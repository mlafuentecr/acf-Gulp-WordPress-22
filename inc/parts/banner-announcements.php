<?php
      // announcements
    $announcements = get_field('header_banner', 'option');
    if($announcements['turn_onoff_banner']) : ?>
<div class="announcements" style='background-color: <?php  echo $announcements['bg_color']; ?>;'>
  <div class="container announcements-wrap">
    <img class='lazyload' src='<?php  echo $announcements['icon']['url']; ?>' alt='announcements' width='20'
      height='20' />
    <div class="text" style='color: <?php  echo $announcements['txt_color']; ?>;'>
      <?php  echo $announcements['banner_text']; ?></div>
  </div>
</div>
<?php endif; ?>
