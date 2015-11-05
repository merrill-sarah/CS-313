<?php
session_start();
require "db.php";

function itemDisplay($id){

	try {	
		$sql = "SELECT * FROM items WHERE item_id = :id";

		global $db;
		$statement = $db->prepare($sql);
		$statement->bindValue(':id',$id);
	    $statement->execute();
	    $item=$statement->fetch();
	    $statement->closeCursor();
	} catch (PDOException $ex) {
	   echo 'Error!: ' . $ex->getMessage();
	   die(); 
	}

	$itemDspl = itemView($item);
	//$commentDspl = commentView($item[id]);
	$display = $itemDspl . $commentDspl;

	return $display;
}

function itemView($item){
	$display = "<div id='main'>"
				. "<h2>" . $item[title] . "</h2>"
				. "<img src='files/" . $item[image] . ".jpg' alt='" . $item[image] . "'>"
				. "<p>" . $item[description] . "</p>"
			  . "</div>";

	return $display;
}

function commentView($id){
	try {	
		$sql = "SELECT * FROM comments WHERE item_id = :id";

		global $db;
		$statement = $db->prepare($sql);
		$statement->bindValue(':id',$id);
	    $statement->execute();
	    $item=$statement->fetch();
	    $statement->closeCursor();
	} catch (PDOException $ex) {
	   echo 'Error!: ' . $ex->getMessage();
	   die(); 
	}

	return $display;

}

function submitComment(){

}