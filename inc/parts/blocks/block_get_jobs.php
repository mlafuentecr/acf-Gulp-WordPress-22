<?php
/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields     = get_fields();
$header         = $pageFields['header']; 
$add_container  = $pageFields['add_container']; 
$jobNumber      = $pageFields['number_of_jobs_to_show']; 
$margen         = $pageFields['margen']; 
$bg_color       = $pageFields['background_color']; 

 ?>
<?php if ($add_container) {echo '<div class="container">';} ?>

<div data-jobs=<?php echo $jobNumber; ?> style="background-color: <?php echo $bg_color; ?>"
  class="block_jobs py-5  my-<?php echo $margen; ?>  minimize <?php echo $block['className']; ?>">
  <div class="container">
    <?php if ($header): ?> <header class="block_jobs_header col-12"><?php echo $header; ?></header> <?php endif; ?>
    <div class="row row-cols-2 g-3  block_jobs_rows">
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
