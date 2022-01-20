<?php
// Load values and assign defaults.
/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();
$headline = $pageFields['headline'];
$client_info = $pageFields['client_info'];
 ?>

<section class="block-case-study-headline d-flex flex-wrap">
  <div class="headline col-12 col-md-10 ">
    <?php echo $headline; ?>
  </div>
  <div class="col-12 col-md-2 ">
    <div class="item">
      <span class="title">CLIENTS</span>
      <span class="descrip"><?php echo $client_info['clients']; ?></span>
    </div>
    <div class="item">
      <span class="title">duration</span>
      <span class="descrip"><?php echo $client_info['duration']; ?></span>
    </div>
    <div class="item">
      <span class="title">team</span>
      <span class="descrip"><?php echo $client_info['team']; ?></span>
    </div>
  </div>
</section>




<?php if (is_admin() ) { ?>
<!-- Only show this to admin -->
<style type="text/css">
.block-case-study-headline {
  width: 100%;
  background-color: #f3f3f3;
  padding: 20px;
  display: flex;
  flex-direction: row;
  gap: 10px;
}

.block-case-study-headline div:nth-child(1) {
  background-color: white;
  flex: 7;
  padding: 5px;
  font-size: 36px;
  font-weight: 500;
}

.block-case-study-headline div:nth-child(2) {
  background-color: white;
  flex: 3;
  padding: 5px;
}

.item {
  display: flex;
  flex-direction: column;
}

.item .title {
  min-width: 100%;
  text-transform: uppercase;
  font-size: 21px;
}

.item .descrip {
  min-width: 100%;
  text-transform: capitalize;
  font-size: 18px;
}

</style>
<?php } ?>
