<?php
// Load values and assign defaults.
/*-----------------------------------------------------------------------------------*/
/*  ACF
/*-----------------------------------------------------------------------------------*/
 $pageFields  = get_fields();
 $title       = $pageFields['title'] ?: 'Add title click the pencil';
 $description = $pageFields['description'] ?: 'Add description';
 $ind_row     = $pageFields['industry'];

 function removeSpace($item){
  
  $item  =  strtolower(str_replace(" ","_", $item));
  return  str_replace("_&_","_", $item);
 }
 ?>

<section class="industries_we_serve" tabindex='0'>
  <div class="container">
    <div class="row industries_we_serve_wrapper">

      <header class="row">
        <h2 class="col-12 col-md-4  p-2">
          <?php echo $title; ?>
        </h2>
        <div class="col  col-xl-6 p-2  text-white d-flex  justify-content-start align-items-center">
          <?php echo $description; ?>
        </div>
      </header>

      <div class="industries_we_serve_main_content  ">
        <?php 
          if(  $ind_row  ) {
            foreach( $ind_row as $row ) {
                //var_dump($row);
                echo '<div class=" col '. removeSpace($row['industry_name']) .' industries_we_serve_item p-3 ">';
                  echo '<h3>'.$row['industry_name'].'</h3>';
                  echo '<div class="industries_we_serve_item_projects ">';
                  echo  '<p>'.$row['project_names'].'</p>';
                  echo '<a class="rs_link_underline d-md-flex" href="'. $row['cta']['url'] .'" target="'. $row['cta']['target'] .'" rel="noopener noreferrer">'. $row['cta']['title'] .'</a>';
                  echo '</div>';
                echo '</div>';
            }
        }
      ?>
      </div>

    </div>
  </div>
</section>









<?php if (is_admin() ) { ?>
<!-- Only show this to admin -->
<style type="text/css">
.industries_we_serve {
  margin: 10px;
  padding: 10px;
  background-color: gray;
  min-height: 100px;

}

.industries_we_serve .industries_we_serve_wrapper {
  display: flex;
  background: green;
  flex-wrap: wrap;
  min-width: 100%;
}

.industries_we_serve header {
  display: flex;
  background: red;

}


.industries_we_serve header h2,
.industries_we_serve header p {
  width: 50%;
}

.industries_we_serve_main_content {
  display: flex;
  background: green;
  min-width: 100%;
}

.industries_we_serve_item {
  width: 50%;
  max-width: 45%;
}

</style>
<?php } ?>
