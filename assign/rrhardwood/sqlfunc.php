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



function getWidths(){
   global $db;
   global $database;

   $sql ="select mWidth, id from widths";

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
function getMills(){
   global $db;
   global $database;

   $sql ="select mill_id, short_desc from mill";

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


function getSpecies() {
   global $db;
   global $database;

   $sql ="select spec_ldec, species_id from species";

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
function getGrades() {
   global $db;
   global $database;

   $sql ="select id,grade from grades";

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
      . "join widths as w on p.width = w.id "
      . "WHERE w.id = " . $width . " and p.species_id = " . $species;
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

function insertProduct($species,$grade,$mill,$width,$basep,$amt) {
   global $db;
   global $database;
   $sql = "INSERT INTO product (width,grade_id,species_id,mill" .
      ",base_price,sq_ft,committed) VALUES (:species, :grade,:mill,:width," .
      ":basep,:amt,0)";
   try {
      $stmt = $db->prepare($sql);
      $stmt->bindValue(':species', $species);
      $stmt->bindValue(':grade', $grade);
      $stmt->bindValue(':mill', $mill);
      $stmt->bindValue(':width', $width);
      $stmt->bindValue(':basep', $basep);
      $stmt->bindValue(':amt', $amt);

      $stmt->execute();
      $stmt -> closeCursor();
   }
   catch (PDOException $exc) {
      return '0';
   }
}
function updateProduct($amt,$basep,$prod_id,$comm){
   global $db;
   global $database;
   $sql = "update product SET base_price = :basep," .
      "sq_ft = :amt, committed = :comm where prod_id = :prod_id";

   try {
      $stmt = $db->prepare($sql);
      $stmt->bindValue(':prod_id', $prod_id);
      $stmt->bindValue(':basep', $basep);
      $stmt->bindValue(':amt', $amt);
      $stmt->bindValue(':comm', $comm);

      $stmt->execute();
      $stmt -> closeCursor();
   }
   catch (PDOException $exc) {
      return '0';
   }
}

function removeProduct($prod_id){
   global $db;
   global $database;
   $sql = "delete from product where prod_id = :prod_id";
   $sql2 = "alter table product auto_increment 1";

   try {
      $stmt = $db->prepare($sql);
      $stmt->bindValue(':prod_id', $prod_id);
      $stmt->execute();
      $stmt -> closeCursor();
   }
   catch (PDOException $exc) {
      return '0';
   }
   try {
      $stmt = $db->prepare($sql2);
      $stmt->bindValue(':prod_id', $prod_id);
      $stmt->execute();
      $stmt -> closeCursor();
   }
   catch (PDOException $exc) {
      return '0';
   }
}


function addMill($short,$long){
   global $db;
   global $database;
   $sql = "INSERT INTO mill (short_desc,description)" .
      "VALUES (:short,:long)";
   try {
      $stmt = $db->prepare($sql);
      $stmt->bindValue(':short', $short);
      $stmt->bindValue(':long', $long);

      $stmt->execute();
      $stmt -> closeCursor();
   }
   catch (PDOException $exc) {
      return '0';
   }
}

function addSpecies($short,$long){
   global $db;
   global $database;
   $sql = "INSERT INTO species (spec_dec, spec_ldec)" .
      "VALUES (:short,:long)";
   try {
      $stmt = $db->prepare($sql);
      $stmt->bindValue(':short', $short);
      $stmt->bindValue(':long', $long);

      $stmt->execute();
      $stmt -> closeCursor();
   }
   catch (PDOException $exc) {
      return '0';
   }
}

function addWidth($short){
   global $db;
   global $database;
   $sql = "INSERT INTO widths (mWidth)" .
      "VALUES (:short)";
   try {
      $stmt = $db->prepare($sql);
      $stmt->bindValue(':short', $short);
      $stmt->execute();
      $stmt -> closeCursor();
   }
   catch (PDOException $exc) {
      return '0';
   }
}

function hashPass($username, $password) {
	$salt = md5($username);
	$password = hash('sha512', $password . $salt);
	return $password;
}

function isAdmin($passCode){
    if ($passCode == "5125jazgio"){
        return 1;
    }
    else
    {
        return 2;
    }
}

function insertUser($user, $password, $isAdmin) {
	global $db;
	global $database;
	$sql = "INSERT INTO users (usr_name, password, usr_type) VALUES (:user, :password, :isAdmin)";
	try {
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':user', $user);
		$stmt->bindValue(':password', $password);
        $stmt->bindValue(':isAdmin', $isAdmin);
		$stmt->execute();
		$lastID = $db->lastInsertId();
		$stmt->closeCursor();
		return $lastID;
	}
	catch (PDOException $exc) {
		return '0';
	}
}
function createSession($lastID) {
	session_start();
	$_SESSION['loggedin'] = true;
	$_SESSION['userID'] = $lastID;
}
function checkUser($user, $password) {
	global $db;
	global $database;
	$sql = "SELECT usr_id FROM users WHERE usr_name = :user AND password = :password";
	try {
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':user', $user);
		$stmt->bindValue(':password', $password);
		$stmt->execute();
		$result = $stmt->fetchAll();
		$stmt->closeCursor();
		return $result;
	}
	catch (PDOException $exc) {
		return '0';
	}
}
function getUsername($userID) {
	global $db;
	global $database;
	$sql = "SELECT usr_name FROM users WHERE usr_id = :userID";
	try {
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':userID', $userID);
		$stmt->execute();
		$result = $stmt->fetchAll();
		$stmt->closeCursor();
		return $result;
	}
	catch (PDOException $exc) {
		return '0';
	}
}
function getUserType($user){
    global $db;
	global $database;
	$sql = "SELECT usr_type FROM users WHERE usr_name = :user";
	try {
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':user', $user);
		$stmt->execute();
		$result = $stmt->fetchAll();
		$stmt->closeCursor();
		return $result;
	}
	catch (PDOException $exc) {
		return '0';
	}
}

?>
