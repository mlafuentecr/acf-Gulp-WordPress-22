<?php 
  //LOGO
  $custom_logo_id = get_theme_mod( 'custom_logo' );
  $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>
 
 
<nav class="navbar navbar-expand-lg navbar-top bg-danger navbar-light ">
<div class="container">

<a class="navbar-brand" href="/"><img src="<?php echo $image[0]; ?>" alt="director.cr logo" width='auto' height='85' ></a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-top" aria-controls="navbar-top" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<?php get_template_part('inc/template-parts/content', 'menuPrimary'); ?>

</div>
</nav>
