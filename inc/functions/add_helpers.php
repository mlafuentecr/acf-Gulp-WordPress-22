<?php

//GET THE LIST OF CATEGORIES OF A POST
function ListOfCats( $post_id ){

  $post_categories = wp_get_post_categories( $post_id, array( 'fields' => 'names' ) );
  if( $post_categories ){ // Always Check before loop!
      foreach($post_categories as $name){
          echo $name;
      }
  }
}

//Random Name
function random_string($length) {
  $key = '';
  $keys = array_merge(range(0, 9), range('a', 'z'));

  for ($i = 0; $i < $length; $i++) {
      $key .= $keys[array_rand($keys)];
  }

  return $key;
}


//CUSTOM BREADCRUMB
function newBreadcrumbBuyer(){
  //News & Publications
$titleNewsandpubli = get_the_title( 249 ) ?? '';
$LinkNewsandpub = get_permalink( 249 ) ?? '';
//Online Buyers
$onlineBuyer = get_the_title( 936854 ) ?? '';
$onlineBuyerlink = get_permalink( 936854 ) ?? '';
$currentTitle = esc_html( get_the_title() ) ?? '';
  echo "
  <div class='the_breadcrumb new_breadCrumb flex-grow-1 d-flex flex-wrap align-items-center '>
  <div id='crumbs' class='breadCrumb  d-flex flex-wrap'>
    <a class='breadCrumb__home' href='/'>Home</a> 
    <span class='mx-1'> \ </span> 
    <a href='$LinkNewsandpub'>$titleNewsandpubli</a>
    <span class='mx-1'> \ </span> 
    <a href='$onlineBuyerlink'>$onlineBuyer</a> 
    <span class='mx-1'> \ </span> 
    <span class='current'>$currentTitle</span>
  </div>
  </div>";
}

///CUSTOM BREADCRUMB FOR Video Library
function newBreadcrumbVideo(){

  //News & Publications
$titleTrainingEducation = get_the_title( 530 ) ?? '';
$LinkTrainingEducation = get_permalink( 530 ) ?? '';
//Online Buyers
$videoLibrary = get_the_title( 744 ) ?? '';
$videoLibraryLink = get_permalink( 744 ) ?? '';
$currentTitle = esc_html( get_the_title() ) ?? '';

  echo "
  <div class='the_breadcrumb new_breadCrumb flex-grow-1 d-flex flex-wrap align-items-center '>
  <div id='crumbs' class='breadCrumb  d-flex flex-wrap'>
    <a class='breadCrumb__home' href='/'>Home</a> 
    <span class='mx-1'> \ </span> 
    <a href='$LinkTrainingEducation'>$titleTrainingEducation</a>
    <span class='mx-1'> \ </span> 
    <a href='$videoLibraryLink'>$videoLibrary</a> 
    <span class='mx-1'> \ </span> 
    <span class='current'>$currentTitle</span>
  </div>
  </div>";
}