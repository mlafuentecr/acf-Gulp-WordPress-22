<?php 

  /*---------------------------------------------------------*/
  /*  ACF Page our-value
  /*---------------------------------------------------------*/
  $pageFields                 = get_fields();
  $description                = $pageFields['description'];
  $slider_size                = $pageFields['slider_size'];
  $slider                     = $pageFields['slider'];
  $GLOBALS['slider_subtitle'] = $pageFields['title'];

?>


<!-- carousel-fade-->
<section class="block_slider testimonial">


  <div id="carouseTestimonial" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">

      <?php 
   
   if( $slider ) {
   
      $total = count($slider);
     
       foreach( $slider as $index => $testimonial ) {
         
           $type      = $testimonial['type'];
           $bg_color  = $testimonial['background_color'] ?: 'black';
           $video     = $testimonial['video'];
           $image     = $testimonial['image'];
           $content   = $testimonial['content'];
           $author    = $testimonial['author'];
           $position  = $testimonial['position'];
           $text_color = $testimonial['text_color'];
           $reverse   = $testimonial['direcction'];
           $obj       = $testimonial;
           $index++;

           $state = $index === 1 ? "carousel-item active" : "carousel-item";
            
            echo " <div class='".$state." ' style='min-height:".$slider_size."px;  background-color:".$bg_color.";' >";
            echo "<div class='container '> ";
            echo "<div class='mt-5' style='color: ".$text_color."!important;'> ";
            echo '<span class="title" style="color: '.$text_color.'" > '. $GLOBALS['slider_subtitle']  .' </span>';
            echo "<div class='slideNumber'> " .  $index.' - '. $total  .  "</div>";
          
              if($type === 'text'){ 
                echo  '<div class="row text-wrap"  style="color: '.$text_color.'" >';
                echo  '<div class="col-12 ">
                <div class="col-12 content">'. $obj['content'] .'</div>
                <div class="col-12 author">'. $obj['author'] .'</div>
                <div class="col-12 position">'. $obj['position'] .'</div>
                </div>';
              echo  '</div>';

              }elseif($type === 'video and text'){
               
                echo  '<div class="row image_text  '.$reverse.' ">';

                echo  '<div class="col-12 col-md-6">';
                echo  '<iframe title="youtube video" width="100%" height="375" src="https://www.youtube.com/embed/'.$obj['video'].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                echo  '</div>';
                
                echo  '<div class="col-12 col-md-6 mt-3 mt-md-0 mb-4 mb-md-0 ">
                <div class="col-12 content">'. $obj['content'] .'</div>
                <div class="col-12 author">'. $obj['author'] .'</div>
                <div class="col-12 position">'. $obj['position'] .'</div>
                </div>';

              echo  '</div>';

              }else{
               
                echo  '<div class="row image_text '.$reverse.'">';
                
                echo  '<div class="col-12 col-md-6 text-center">';
                echo  '<img class="m-auto" src="'. $obj['image']['url'] .'" alt="'. $obj['image']['title'] .'"  >';
                echo  '</div>';

                echo  '<div class="col-12 col-md-6 mt-3 mt-md-0 mb-4 mb-md-0  ">
                <div class="col-12 content">'. $obj['content'] .'</div>
                <div class="col-12 author">'. $obj['author'] .'</div>
                <div class="col-12 position">'. $obj['position'] .'</div>
                </div>';

                echo  '</div>';

              }

          echo '</div>';
          echo '</div>';
          echo '</div>';

         
       }

   }
  ?>

    </div>
    <div class="container bg-light">
      <div class="  buttons col-4 m-0 d-flex ">
        <div class="col-6 m-auto position-relative">
          <button class="carousel-control-prev" type="button" data-bs-target="#carouseTestimonial" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouseTestimonial" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>




<?php if (is_admin() ) { ?>
<!-- Only show this to admin -->
<style type="text/css">
.slider-wrap {
  margin: 10px;
  padding: 10px;
  background-color: gray;
  min-height: 100px;
}

.container {
  padding: 20px;
}

.row {
  display: flex;
}

.row .col-6 {
  width: 50% !important;
}

.row .col-6 img {
  width: 100%;
  height: auto;
}

</style>
<?php } ?>
