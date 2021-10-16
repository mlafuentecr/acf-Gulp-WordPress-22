       <!-- footer -->

       <?php     
/*-----------------------------------------------------------------------------------*/
/*  ACF footer
/*-----------------------------------------------------------------------------------*/

$logo     = get_field('footer_logo', 'options');
$size      = 'full'; // (thumbnail, medium, large, full or custom size)
$social = get_field('social', 'options');

?>
       <!-- menu Primary list DESKTOP-->
       <?php //get_template_part( '/inc/parts/menu','secundary'); ?>




       </main>
       <footer>
         <!-- footer -->
         <section class="footer footer-ver2">
           <div class="container">


             <div class="first-level">

               <!-- LOGO -->
               <div class="menu logo col-12 col-md-2">
                 <img class='lazyload' src='<?php echo $logo['url']; ?>' alt='' width='128' height='auto' />
               </div>

               <!-- 1Menus -->
               <?php
                  if( have_rows('menus', 'options') ):
                  while( have_rows('menus', 'options') ) : the_row();
                    $title = get_sub_field('title');
                    $menus = get_sub_field('menu');
                  ?>
               <!-- 2Menus -->
               <div class="menu  ">
                 <h3><?php echo $title; ?></h3>

                 <?php
                    if( $menus)
                    {
                      echo '<ul class="menus">';
                      foreach(  $menus as $row ) {
                          $link = $row['link'];
                          if($row['link']):
                          echo '<li class="menuItem">';
                              echo '<a target="'.$link["target"].'" href="'.$link["url"].'">'.$link["title"].'</a>';
                          echo '</li>';
                          endif;
                      }
                      echo '</ul>';
                    }
                  ?>
               </div>

               <?php
                    endwhile;
                    else :
                  endif;
                  ?>
               <?php get_template_part( '/inc/parts/btn-request-demo' );  ?>
             </div>

             <div class="second-level mt-5 ">
               <div class="container m-0 p-0 ">
                 <!-- copyright -->
                 <div class="copyright">
                   <span>&copy; Copyright <?php echo date('Y'); ?> Laika Inc.</span>

                   <!-- Links -->
                   <?php if (have_rows('legal_link_repeater', 'options')): ?>
                   <ul class="links">
                     <?php while (have_rows('legal_link_repeater', 'options')): the_row(); 
                        $link = get_sub_field('link'); 
                    ?>
                     <li>
                       <a rel="noopener" href="<?php echo $link['url']; ?>"
                         target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>

                     </li>
                     <?php endwhile; ?>
                   </ul>
                   <?php endif; ?>
                 </div>
                 <div class="social">
                   <?php
                    if($social)
                    {
                      echo '<ul class="social-icons">';
                      foreach(  $social as $row ) {
                         
                          $link = $row['link'];
                          $name = $row['social'];



                          if($row['link']):
                          
                          echo '<li>';
                              echo '<a class="linkSocial '.$name.'"  target="'.$link["target"].'" href="'.$link["url"].'"></a>';
                          echo '</li>';
                          endif;
                      }
                      echo '</ul>';
                    }
                  ?>
                 </div>
               </div>
             </div>

           </div>
         </section>

       </footer>
       </div>

       <?php wp_footer(); ?>
       <!-- Start of HubSpot Embed Code -->
       <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/7851520.js"></script>
       <!-- End of HubSpot Embed Code -->

       </body>

       </html>
