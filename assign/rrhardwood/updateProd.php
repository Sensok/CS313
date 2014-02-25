<?php
session_start();
include('sqlfunc.php');
include('process.php');
$products = getSpecies();
$widths = getWidths();
$mills = getMills();
$grade = getGrades();
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
            Product ID: <input type="text" name="prod_id"/><br/>
            Amount On Hand: <input type="text" name="amt"/><br/>
            Base Price: <input type="text" name="basep"/><br/>
            Amount Commited: <input type="text" name="comm"/>
            <input type="hidden" name="action" value="update-product">
            <input type="submit" value="Update Product">
        </form>
    </div>
</body>
</html>

