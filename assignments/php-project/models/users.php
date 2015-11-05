<?php
session_start();
require "db.php";
require 'password.php';

function createUser() {
//get form variables
$username = $_POST["username"];
$password = password_hash($_POST["password"],PASSWORD_DEFAULT);
$password_confirm = password_hash($_POST["password_confirm"],PASSWORD_DEFAULT);
//connect and insert into db
try {	
	$sql = "INSERT INTO users VALUES (null, :username, :password, '2')";

	global $db;
	$statement = $db->prepare($sql);
    $statement->bindValue(':username',$username);
    $statement->bindValue(':password',$password);
    $statement->execute();
    $statement->closeCursor();
} catch (PDOException $ex) {
   echo 'Error!: ' . $ex->getMessage();
   die(); 
}

header("location: index.php?action=login");
}

function signIn() {
//get form variables
	$username = $_POST["username"];
	//connect and insert into db
	try {	
		$sql = "SELECT password FROM users WHERE username = :username";

		global $db;
		$statement = $db->prepare($sql);
	    $statement->bindValue(':username',$username);
	    $statement->execute();
	    $hash = $statement->fetch();
	    $statement->closeCursor();
	} catch (PDOException $ex) {
	   echo 'Error!: ' . $ex->getMessage();
	   die(); 
	}

	if (password_verify($_POST["password"], $hash[0])) {
	    $_SESSION['login_user'] = $username;
	    $_SESSION['loggedIn'] = "true";
	    header("location: index.php");
	} else {
	    header("location:index.php?action=login");
	}
}

?>