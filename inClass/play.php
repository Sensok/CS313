<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$database = 'cheeseburger';
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

function getScriptures() {
   global $db;
   global $database;
   $sql = "SELECT * FROM actor";
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

$scriptures = getScriptures();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
   <title>Scriptures</title>
   </head>

   <body>
   <?php
   echo '<form action="scriptures-stretch.php"><select name="scriptures">';
foreach ($scriptures as $book) {
   echo '<option value="' . $book['name'] . '">' . $book['name'] . '</option>';
}
?>
</body>
</html>