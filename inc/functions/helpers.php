<?php 
//RETURN POST DATE IN FORMAT
function getDatex($date){
  return $date;
}
//Block industries
function removeSpace($item){
  $item  =  strtolower(str_replace(" ","_", $item));
  return  str_replace("_&_","_", $item);
 }
