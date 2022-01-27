<?php
// Load values and assign defaults.
/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();
$block_underline_text = $pageFields['block_text_underline'];
 ?>

<section class="block_text_underline <?php echo $block['className'] ?>">
  <?php echo $block_underline_text; ?>
</section>




<?php if (is_admin() ) { ?>
<!-- Only show this to admin -->
<style type="text/css">
.block_text_underline {
  width: 100%;
  min-height: 200px;
  background-color: #f3f3f3;
  padding: 20px;
  display: flex;
  flex-direction: row;
  gap: 10px;
}

.rs_underline {
  text-decoration: underline;
}

</style>
<?php } ?>
