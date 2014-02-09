<?php

  //Database Queries File
$database = 'RRHARDWOOD';
$db_username = 'root';
$db_password = 'K00ndamrei';
$server = 'localhost';
$dsn = "mysql:host=$server;dbname=$database";
try {
   $db = new PDO($dsn, $db_username, $db_password);
}
catch (PDOException $e) {
   $error_message = $e->getMessage();
}

$species = $_GET['species'];
$width = $_GET['width'];

function getProducts() {
   global $db;
   global $database;

   $sql ="select * from product as p "
      . "join grades as g on p.grade_id = g.id "
      . "join species as s on p.species_id = s.species_id "
      . "join mill as m on p.mill = m.mill_id";

   try {
      $stmt = $db->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      $stmt->closeCursor();
      return $result;
   }
   catch (PDOException $exc) {
      return '0';
   }
}

function filter($width, $species) {
   global $db;
   global $database;

   $sql ="select * from product as p "
      . "join grades as g on p.grade_id = g.id "
      . "join species as s on p.species_id = s.species_id "
      . "join mill as m on p.mill = m.mill_id "
      . "WHERE width = " . $width . " and p.species_id = " . $species;

   try {
      $stmt = $db->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      $stmt->closeCursor();
      return $result;
   }
   catch (PDOException $exc) {
      return '0';
   }
}



$products = getProducts();
if (isset($species) && isset($width)) {
   $filtered = filter($width, $species);
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
   <title>RR HARDWOOD PRODUCTS</title>
   </head>

   <body>
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
   foreach ($products as $w) {
   echo '<option value="' . $w['width'] . '">' . $w['width'] . '</option>';
      }
      ?>
      </select>
      <input type="submit" value="Get Products">
      </form>
   <table>
   <tr>
   <th>Width</th>
   <th>Grade</th>
   <th>Species</th>
   <th>Mill</th>
   <th>Base Price</th>
   <th>Sqft On Hand</th>
   <th>Sqft committed</th>
   </tr>
   <?php
   foreach ($filtered as $prod){
   echo '<tr><td>' . $prod['width'] . '</td><td>' . $prod['grade']
   . '</td><td>' . $prod['spec_ldec'] . '</td><td>' . $prod['short_desc']
   .  '</td><td>' . $prod['base_price'] . '</td><td>' . $prod['sq_ft']
   .  '</td><td>' . $prod['committed'] . '</td></tr>';
}

?>
   </table>
</body>
</html>