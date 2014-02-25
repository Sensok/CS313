<?php
include('sqlfunc.php');
session_start();
if (!isset($_SESSION['loggedin'])) {
	header("Location: index.php?action=signout");
	exit;
}
$products = getSpecies();
$widths = getWidths();
if (isset($species) && isset($width)) {
   $filtered = filter($width, $species);
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
        <div id="pages">
        
 
   <form action="search.php">
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
      <input type="submit" value="Get Products">
      </form>
   <table>
   <tr>
   <th>Prod ID</th>
   <th>Width (in)</th>
   <th>Grade</th>
   <th>Species</th>
   <th>Mill</th>
   <th>Base Price</th>
   <th>Sqft On Hand</th>
   <th>Sqft committed</th>
   </tr>
   <?php
   foreach ($filtered as $prod){
   echo '<tr><td>' . $prod['prod_id'] . '</td><td>'
   . $prod['mWidth'] . '</td><td>' . $prod['grade']
   . '</td><td>' . $prod['spec_ldec'] . '</td><td>' . $prod['short_desc']
   .  '</td><td>' . $prod['base_price'] . '</td><td>' . $prod['sq_ft']
   .  '</td><td>' . $prod['committed'] . '</td></tr>';
}

?>
   </table>
    </div>
</body>
</html>