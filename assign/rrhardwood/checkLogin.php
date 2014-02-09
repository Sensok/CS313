<?php
$login=array_values($_POST);
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

function getUsers() {
   global $db;
   global $database;
   global $login;
   $sql = "SELECT * FROM users where usr_name ='" . $login[0] . "'";
   echo $sql;
   try {
      echo "hi1";
      $stmt = $db->prepare($sql);
      echo "hi2";
      $stmt->execute();
      echo "hi3";
      $result = $stmt->fetchAll();
      echo $result['usr_name'];
      echo "hi4";
      $stmt->closeCursor();

      echo $result['usr_name'];
      return $result;
   }
   catch (PDOException $exc) {
      return '0';
   }
}
$user=getUsers();
function checkUser() {
   global $user;
   global $login;
   echo $login[0];
   echo $login[1];
   echo $user['usr_name'];
   echo $user['password'];
   if($user['usr_name'] == $login[0]
      && $user['password'] == $login[1])
   {
      return true;
   }
   else
      return false;
}
echo "POOP1";
$check=checkUser();
echo "POOP1";
if($check)
{
   echo "POOP STAINS";
}
else
{
   echo "HI YALL";
}
?>