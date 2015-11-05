<?php
session_start();
if($_SESSION['loggedIn']=="true"){
	$log = "<a href='index.php?action=logout'>Log Out</a>";
} else {
	$log = "<a href='index.php?action=login'>Log In</a>";
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cats on Things</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">

	</head>
	<body>
		<main>
		<header>
			<nav>
				<ul>
					<li><a href="index.php?action=home">Home</a></li>
					<li><a href="index.php?action=artwork&amp;dspl=all">Artwork</a></li>
					<li><a href="index.php?action=contact">Contact</a></li>
					<li><?php echo $log ?></li>
				</ul>
			</nav>
		</header>
		