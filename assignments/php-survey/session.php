    <?php 
    session_start();

	        $_SESSION["name"] = $_POST["name"];

	         $_SESSION["hpHouse"] = $_POST["hpHouse"];

	        $_SESSION["animal"] = $_POST["animal"];

	        $_SESSION["spice"] = $_POST["spice"];

/*	        
	        $tempArray = $_POST["placesVisited"];
	        echo "You Visited: <br>";
	        for ($x = 0; $x < count($tempArray); $x++) {
	            echo $tempArray[$x] . "<br>";
	        }
	        */

	        $data = json_decode(file_get_contents('data.json'), true);

	        array_push($data["name"],$_POST["name"]);
	        array_push($data["hpHouse"],$_POST["hpHouse"]);
	        array_push($data["animal"],$_POST["animal"]);
	        array_push($data["spice"],$_POST["spice"]);

	        file_put_contents("data.json",json_encode($data));

	        $_SESSION["submitted"]=true;

	        header("Location: results.php"); /* Redirect browser */
			exit();
    ?>  
