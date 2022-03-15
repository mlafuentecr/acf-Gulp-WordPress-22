<?php
/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageField      = get_fields();
$header         = $pageField['header_jobs']; 
$add_container  = $pageField['add_container']; 
$jobNumber      = $pageField['number_of_jobs_to_show'] ?: 6; 
$margen         = $pageField['margen'] ?: 0; 
$bg_color       = $pageField['join_a_team_bg'] ?: '#ff918e';
$text_color     = $pageField['join_a_team_text_color'] ?: 'black';

 ?>
<?php if ($add_container) {echo '<div class="container">';} ?>

<div id="positions" data-jobs=<?php echo $jobNumber; ?> style="background-color: <?php echo $bg_color; ?>; "
  class="block_jobs <?php echo $text_color; ?> py-5  my-<?php echo $margen; ?>  minimize <?php echo $block['className']; ?>">
  <div class="container">
    <?php if ($header): ?>
    <header class="block_jobs_header col-12">
      <?php echo $header; ?>
    </header>
    <?php endif; ?>
    <div class="row row-cols-2 g-3  block_jobs_rows <?php echo $text_color; ?>">
      Loading... Jobs
    </div>
  </div>
</div>

<?php if ($add_container){ echo '</div>';} ?>




<?php 

if (!is_admin() ) {
  // Enqueue block editor styles
}

wp_enqueue_script('block_jobs',   $GLOBALS["THEME_MLM_PATH"].  '/dist/js/block_jobs.js?defer', array(), $GLOBALS['THEME_MLM_VER'], true );


 if (is_admin() ) { ?>
<!-- Only show this to admin -->
<style type="text/css">
.block_jobs {
  margin: 10px;
  padding: 10px;
  background-color: gray;
  min-height: 100px;
}

</style>
<?php } ?>
