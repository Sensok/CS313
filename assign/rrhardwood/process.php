<?php

$action = $_POST['action'];

switch ($action) {

   case 'new-product':

      $species=$_POST['species'];
      $grade=$_POST['grade'];
      $mill=$_POST['mill'];
      $width=$_POST['width'];
      $basep=$_POST['basep'];
      $amt=$_POST['amt'];
      if(isset($species,$mill,$width,$amt,$basep,$grade))
      {
         insertProduct($species,$grade,$mill,$width,$basep,$amt);
      }
      break;
   case 'update-product':
      $prod_id=$_POST['prod_id'];
      $basep=$_POST['basep'];
      $amt=$_POST['amt'];
      $comm=$_POST['comm'];
      if(isset($amt,$comm,$basep,$prod_id))
      {
         updateProduct($amt,$basep,$prod_id,$comm);
      }
      break;
   case 'remove-product':
      $prod_id=$_POST['prod_id'];
      if(isset($prod_id))
      {
         removeProduct($prod_id);
      }
      break;

   case 'new-mill':
      $short=$_POST['short'];
      $long=$_POST['long'];
      if(isset($short,$long))
      {
         addMill($short,$long);
      }
      break;
   case 'new-width':
      $short=$_POST['short'];
      if(isset($short))
      {
         addWidth($short);
      }
      break;
   case 'new-species':
      $short=$_POST['short'];
      $long=$_POST['long'];
      if(isset($short,$long))
      {
         addSpecies($short,$long);
      }
      break;
}
?>