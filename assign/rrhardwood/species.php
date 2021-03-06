<?php
session_start();
include('sqlfunc.php');
include('process.php');
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
            Species Short Desc(i.e. RO): <input type="text" name="short"/><br/>
            Species Long Desc.: <textarea  name="long"/></textarea>
        
            <input type="hidden" name="action" value="new-species">
            <input type="submit" value="Add Species">
      </form>

    </body>
</html>