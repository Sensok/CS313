<?php
include ('sqlfunc.php');

session_start();

if (isset($_GET['action'])) {
	$action = $_GET['action'];
} elseif (isset($_POST['action'])) {
	$action = $_POST['action'];
}
switch ($action) {
	case 'signin':
		$user = $_POST['user'];
		$password = hashPass($user, $_POST['password']);
		$userID = checkUser($user, $password);
        $userType = getUserType($user);
		if (!empty($userID))
        {        
            createSession($userID[0][0]);
            if($userType[0][0] == 1){
                header("Location: admin.php");
			 exit;
            }
            else{
                header("Location: search.php");
                    exit;
		          }	
        }
        else{
               header("Location: index.php?action=signout");
                    exit;
        }
		break;
	case 'signup':
		$user = $_POST['user'];
		$password = hashPass($user, $_POST['pass1']);
        $isAdmin = isAdmin($_POST['passCode']);
        echo $isAdmin;
		if (!empty($user) && !empty($password) && $isAdmin == 1) {
			$lastID = insertUser($user, $password, $isAdmin);
			createSession($lastID);
			header("Location: admin.php");
			exit;
		}
        else if (!empty($user) && !empty($password)) {
			$lastID = insertUser($user, $password, 2);
			createSession($lastID);
			header("Location: search.php");
			exit;
		}
		break;
	case 'signout':
		$_SESSION['loggedin'] = false;
		unset($_SESSION['loggedin']);
		session_destroy();
		header("Location: index.php");
		break;
	default:
		if (!isset($_SESSION['loggedin'])) {
			include('sign_in.php');
			exit;
		}
}
?>