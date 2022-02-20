<?php
// Load values and assign defaults.
/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();
$title      = $pageFields['title'];
$margen     = $pageFields['margen'];
$category   = $pageFields['category'];

 ?>


<section class="block_tech_stack tech_stack  bg-light <?php echo $block['className'].' '.$margen; ?>">
  <div class="container">
    <div class="row row-cols-3 my-5 py-5">

      <h2 class="tech_stack-title col-12 "><?php echo $title; ?></h2>

      <nav class="tech_stack-menu d-flex flex-column col-3  ">
        <?php 
            if( $category )
            {
              foreach( $category as $index =>$row ) {
                  $index = $index + 1;
                  $title = $row['category_title'];
                  echo '<button  data-cat="'. $index .'" class="tech_stack_btn m-0  text-start btn-'. strtolower($title) .'">'. $title .'</button>';
              }
          }
        ?>
      </nav>


      <?php 
            if( $category )
            {
              foreach( $category as $index => $logos ) {
               
                
                $logosObj = $logos['logos'];
                $title = $logos['category_title'];
                $index = $index + 1;
                $divStatus = $index === 1 ? "" : $index." d-none";

                echo ' <div class="tech_stack-logos align-content-center wrapper-'. $index .' flex-wrap flex-grow-1 row row-cols-2 row-cols-md-4 '.$divStatus.'    ">';
                foreach($logosObj as $logo ) {
                  echo "<figure class='col  m-0 p-0 flex-column justify-content-center'>";
                  echo '<div class="img"><img src="'.$logo['url'].'" alt="'.$logo['alt'].'"></div>';
                  echo "<figcaption class='text-truncate font-weight-light'>".$logo['title']."</figcaption>";
                  echo "</figure>";
             }
             echo '</div>';
        }
        }
        ?>


    </div>
  </div>
</section>


<?php
wp_enqueue_script('block_tech_stack',   $GLOBALS["THEME_MLM_PATH"].  '/dist/js/block_tech_stack.js?defer', array(), $GLOBALS['THEME_MLM_VER'], true );


if (is_admin() ) { ?>
<!-- Only show this to admin -->
<style type="text/css">
.tech_stack {
  width: 100%;
  min-height: 200px;
  background-color: #f3f3f3;
  padding: 20px;
  display: flex;
  flex-direction: row;
  gap: 10px;
}

.tech_stack .row {
  display: flex;
  flex-wrap: wrap;
}

.tech_stack-title {
  min-width: 100%;
}

.tech_stack-logos {
  max-width: 70%;
  padding-left: 10px;
  background: yellow;

}

.tech_stack-logos:nth-of-type(n+2) {
  display: none !important;
}

.tech_stack-menu {
  display: flex;
  flex-wrap: wrap;
  width: 30%;
}

.tech_stack-menu button {
  min-width: 100%;
}

</style>
<?php } ?>
