<?php
// Load values and assign defaults.
/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
// <?php echo $block['className'] this add additional css from gutember
$pageFields   = get_fields();
$headline     = $pageFields['headline'];
$client_info  = $pageFields['client_info'];
 ?>

<section class="block-case-study-headline ignore-container  <?php echo $block['className'] ?>">
  <div class='bg-red'>
    <div class="container">


      <div class="h-600  d-flex  d-inline-block justify-content-around align-items-start my-5 ">

        <div class="headline col-12 col-md-8 ">
          <?php echo $headline; ?>
        </div>

        <div class="list col-12 col-md-2  ">
          <div class="item d-flex flex-wrap">
            <span class="title col-12">CLIENTS</span>
            <span class="descrip mb-4"><?php echo $client_info['clients']; ?></span>
          </div>
          <div class="item d-flex flex-wrap">
            <span class="title col-12">duration</span>
            <span class="descrip mb-4"><?php echo $client_info['duration']; ?></span>
          </div>
          <div class="item d-flex flex-wrap">
            <span class="title col-12">team</span>
            <span class="descrip mb-4"><?php echo $client_info['team']; ?></span>
          </div>
        </div>

      </div>


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

.d-flex {
  display: flex;
  flex-direction: row;
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
