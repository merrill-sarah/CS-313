<?php
session_start();
require "db.php";

function display($dspl){
	$display = "<div id='main'>";

	switch ($dspl){
		case "all":
			$items = displayAll();
			break;
		case "cat":
			$items = byCategory();
			break;
	}


	foreach ($items as $item){
		$display = $display . "<div class='item'><a href='?action=item&amp;id=".$item[item_id] . "'>"
							. $item[title]."</a><img src='files/" . $item[image] . "-t.jpg' alt='" . $item[image] . "'></div>";
	}

	$display = $display . "</div>";
	return $display;
}


function displayAll(){
	try {	
		$sql = "SELECT * FROM items";

		global $db;
		$statement = $db->prepare($sql);
	    $statement->execute();
	    $items=$statement->fetchAll();
	    $statement->closeCursor();
	} catch (PDOException $ex) {
	   echo 'Error!: ' . $ex->getMessage();
	   die(); 
	}

	return $items;
	
}

function byCategory(){
	$category = filter_input(INPUT_GET,'cat',FILTER_SANITIZE_STRING);
	$catItems = array();


	try {	
		$sql = "SELECT category_id FROM categories WHERE category_name = :category";

		global $db;
		$statement = $db->prepare($sql);
		$statement->bindValue(':category',$category);
	    $statement->execute();
	    $ids=$statement->fetchAll();
	    $statement->closeCursor();
	} catch (PDOException $ex) {
	   echo 'Error!: ' . $ex->getMessage();
	   die(); 
	}

	foreach ($ids as $id){
		$catId = $id[category_id];
	}


	try {	
		$sql = "SELECT item_id FROM category_relational WHERE category_id = :category_id";

		global $db;
		$statement = $db->prepare($sql);
		$statement->bindValue(':category_id', $catId);
	    $statement->execute();
	    $ids=$statement->fetchAll();
	    $statement->closeCursor();
	} catch (PDOException $ex) {
	   echo 'Error!: ' . $ex->getMessage();
	   die(); 
	}

	foreach ($ids as $id){

			try {	
			$sql = "SELECT * FROM items WHERE item_id = :item_id";

			global $db;
			$statement = $db->prepare($sql);
			$statement->bindValue(':item_id', $id[0]);
		    $statement->execute();
		    $items=$statement->fetchAll();
		    $statement->closeCursor();
		} catch (PDOException $ex) {
		   echo 'Error!: ' . $ex->getMessage();
		   die(); 
		}

		foreach($items as $item){
			array_push($catItems, $item);
		}
	}

	return $catItems;
}

function catNav(){
	try {	
		$sql = "SELECT category_name FROM categories";

		global $db;
		$statement = $db->prepare($sql);
	    $statement->execute();
	    $navItems=$statement->fetchAll();
	    $statement->closeCursor();
	} catch (PDOException $ex) {
	   echo 'Error!: ' . $ex->getMessage();
	   die(); 
	}

	$catNav = "";
	foreach ($navItems as $item){
		$catNav = $catNav . "<li><a href='?action=artwork&amp;dspl=cat&amp;cat=" . $item[category_name] . "'>" . $item[category_name] . "</a></li>"; 
	}

	return $catNav;
}