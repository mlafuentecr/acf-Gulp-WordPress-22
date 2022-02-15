<?php 


  /*---------------------------------------------------------*/
  /*  ACF Page our-value
  /*---------------------------------------------------------*/
  $pageFields   = get_fields('option');
  $testimonials = $pageFields['testimonial'];
  $title        = $pageFields['testimonial_title'];
 

  function printJustText($obj){

    echo  '<div class="row text-wrap">';
      echo  '<div class="col-12 ">
      <div class="col-12 content">'. $obj['content'] .'</div>
      <div class="col-12 author">'. $obj['author'] .'</div>
      <div class="col-12 position">'. $obj['position'] .'</div>
      </div>';

    echo  '</div>';
  }
  function printvideo_Text($obj){
  
    echo  '<div class="row image_text">';
      echo  '<div class="col-12 col-md-6">';
      echo  '<iframe width="100%" height="375" src="https://www.youtube.com/embed/'.$obj['video'].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
      echo  '</div>';
      echo  '<div class="col-12 col-md-6 mt-3 mt-md-0">
      <div class="col-12 content">'. $obj['content'] .'</div>
      <div class="col-12 author">'. $obj['author'] .'</div>
      <div class="col-12 position">'. $obj['position'] .'</div>
      </div>';
    echo  '</div>';
    
  }
  function printimage_Text($obj){

    echo  '<div class="row image_text">';
      echo  '<div class="col-12 col-md-6 text-center">';
      echo  '<img class="m-auto" src="'. $obj['image']['url'] .'" alt="'. $obj['title'] .'"  >';
      echo  '</div>';
      echo  '<div class="col-12 col-md-6 mt-3 mt-md-0">
      <div class="col-12 content">'. $obj['content'] .'</div>
      <div class="col-12 author">'. $obj['author'] .'</div>
      <div class="col-12 position">'. $obj['position'] .'</div>
      </div>';
    echo  '</div>';

  }
  function checkActive($index){
    return $index === 1 ? 'active' : ' ';
  }

?>
<!-- carousel-fade-->
<section class="our-work_testimonials">
  <div id="testimonials" class="carousel slide carousel-fade " data-bs-ride="carousel">
    <div class="carousel-inner ">
      <?php 
   
   if( $testimonials ) {
      
      $total = count($testimonials);
     
       foreach( $testimonials as $index => $testimonial ) {
         
           $type      = $testimonial['type'];
           $bg_color  = $testimonial['background_color'];
           $video     = $testimonial['video'];
           $image     = $testimonial['image'];
           $content   = $testimonial['content'];
           $author    = $testimonial['author'];
           $position  = $testimonial['position'];
           $text_color  = $testimonial['text_color'];
          
           $index++;

          
            echo "<div style='background-color:".$bg_color."' class='carousel-item ". checkActive($index) . " '>";
            echo "<div class='container '> ";
            echo "<div class='mt-5' style='color: ".$text_color."!important;'> ";
            echo '<span class="title"> What our clients have to say </span>';
            echo "<div class='slideNumber'> " .  $index.' - '. $total  .  "</div>";
          
              if($type === 'text'){ 
                printJustText($testimonial);
              }elseif($type === 'video and text'){
              printvideo_Text($testimonial);
              }else{
                printimage_Text($testimonial);
              }

          echo '</div>';
          echo '</div>';
          echo '</div>';

         
       }

   }
  ?>

    </div>
    <div class="buttons">
      <button class="carousel-control-prev" type="button" data-bs-target="#testimonials" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#testimonials" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</section>
