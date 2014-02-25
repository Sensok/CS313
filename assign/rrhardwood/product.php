<?php

include('sqlfunc.php');

include('process.php');

$products = getSpecies();

$widths = getWidths();

$mills = getMills();

$grade = getGrades();
session_start();
$name = getUsername($_SESSION['userID']);
$userType = getUserType($name[0][0]);
if (!isset($_SESSION['loggedin'])) {
	header("Location: index.php?action=signout");
	exit;
}

if ($userType[0][0] > 1){
	header("Location: error.php");
	exit;
}
?>

<html>
<head>
<meta charset="UTF-8">
   <title>RR HARDWOOD PRODUCTS</title>
    <link rel="stylesheet" type="text/css" href="rrhardwood.css" />
   </head>

<body id="background">
  
    <div id="top">
        <ul>
            <li><a href="index.php?action=signout">Sign Out</a></li>
            <li><a href="http://www.randrhardwood.com">Home</a></li>
        </ul>
    </div>
    
    <div id="menu">
        <ul>
            <li><a href="product.php">Add Product</a></li>
            <li><a href="mill.php">Add Mill</a></li>
            <li><a href="species.php">Add Species</a></li>
            <li><a href="widths.php">Add Width</a></li>
            <li> <a href="updateProd.php">Update Product</a></li>
            <li> <a href="removeProd.php">Remove Product</a></li>
            <li> <a href="searchAdmin.php">Search For Product</a></li>
        </ul>
    </div>
    <div id="pages">
   <form method="post">
      <select name="species">
      <?php
   foreach ($products as $s) {
   echo '<option value="' . $s['species_id'] . '">' . $s['spec_ldec'] . '</option>';
      }
      ?>
      </select>
      <select name="width">
      <?php
   foreach ($widths as $w) {
   echo '<option value="' . $w['id'] . '">' . $w['mWidth'] . '</option>';
      }
      ?>
      </select>
   <select name="mill">
   <?php
   foreach ($mills as $m) {
   echo '<option  value="' . $m['mill_id'] . '">' . $m['short_desc'] . '</option>';
   }
   ?>
    </select>
   <select name="grade">
   <?php
   foreach ($grade as $g) {
   echo '<option value="' . $g['id'] . '">' . $g['grade'] . '</option>';
   }
   ?>
    </select>

    Amount Ordered: <input type="text" name="amt"/>
    Base Price: <input type="text" name="basep"/>
    <input type="hidden" name="action" value="new-product">
   <input type="submit" value="Insert Product">
   </form>
</div>
</body>
</html>