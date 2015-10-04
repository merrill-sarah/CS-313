<?php
session_start();

$data = json_decode(file_get_contents('data.json'), true);


?>
<!DOCTYPE html>
<html>
	<head>
		<title>Survey Results</title>
		<link rel="stylesheet" type="text/css" href="../../css/stylesheet.css">
	</head>
<body id="results">
	<h1>Survey Results</h1>

	<div>
	<?php 
		if ($_SESSION["submitted"] != null)
		{
			echo "<label>Name: </label>" . $_SESSION["name"]."<br>";
		}
	?>
	<label>Number of Participants:</label>
	<?php 
		echo count($data["name"]);
	?>

	<h2>Harry Potter House</h2>
	<label>Results: </label>
	<?php
		$l = count($data["hpHouse"]);
		foreach($data["hpHouse"] as $value)
		{
			switch ($value)
			{
				case "Gryffindor":
					$gCount = $gCount + 1;
					break;
				case "Ravenclaw":
					$rCount = $rCount + 1;
					break;
				case "Hufflepuff":
					$hCount = $hCount + 1;
					break;
				case "Slytherin":
					$sCount = $sCount + 1;
					break;
			}
		}

		$gPercent = round((float)($gCount/$l) * 100 );
		$rPercent = round((float)($rCount/$l) * 100 );
		$hPercent = round((float)($hCount/$l) * 100 );
		$sPercent = round((float)($sCount/$l) * 100 );

		$gDisplay = "<li>Gryffindor: ".$gPercent. "%</li>";
		$rDisplay = "<li>Ravenclaw: ".$rPercent. "%</li>";
		$hDisplay = "<li>Hufflepuff: ".$hPercent. "%</li>";
		$sDisplay = "<li>Slytherin: ".$sPercent. "%</li>";

		switch ($_SESSION["hpHouse"]) 
		{
			case "Gryffindor":
				$gDisplay = "<li><b>Gryffindor: </b>".$gPercent. "%</li>";
				break;
			case "Ravenclaw":
				$rDisplay = "<li><b>Ravenclaw: </b>".$rPercent. "%</li>";
				break;
			case "Hufflepuff":
				$hDisplay = "<li><b>Hufflepuff: </b>".$hPercent. "%</li>";
				break;
			case "Slytherin":
				$sDisplay = "<li><b>Slytherin: </b>".$sPercent. "%</li>";
				break;
		}
		
		echo "<ul>"
				.$gDisplay.$rDisplay.$hDisplay.$sDisplay
			. "</ul>";

	?>

	<h2>Cats or Dogs</h2>
	<label>Results: </label>
	<?php
		$l = count($data["animal"]);
		foreach($data["animal"] as $value)
		{
			switch ($value)
			{
				case "Cats":
					$cCount = $cCount + 1;
					break;
				case "Dogs":
					$dCount = $dCount + 1;
					break;
			}
		}

		$cPercent = round((float)($cCount/$l) * 100 );
		$dPercent = round((float)($dCount/$l) * 100 );

		$cDisplay = "<li>Cats: ".$cPercent. "%</li>";
		$dDisplay = "<li>Dogs: ".$dPercent. "%</li>";

		switch ($_SESSION["animal"]) 
		{
			case "Cats":
				$cDisplay = "<li><b>Cats: </b>".$cPercent. "%</li>";
				break;
			case "Dogs":
				$dDisplay = "<li><b>Dogs: </b>".$dPercent. "%</li>";
				break;
		}
		
		echo "<ul>"
				.$cDisplay.$dDisplay
			. "</ul>";

	?>

	<h2>Spice Level</h2>
	<?php 
		if ($_SESSION["submitted"] != null)
		{
			echo "<label>Your choice: </label>".$_SESSION["spice"]."<br>";
		}
	?>	
	<label>Results: </label>
	<?php
		$l = count($data["spice"]);
		foreach($data["spice"] as $value)
		{
			switch ($value)
			{
				case 1:
					$oneCount = $oneCount + 1;
					break;
				case 2:
					$twoCount = $twoCount + 1;
					break;
				case 3:
					$threeCount = $threeCount + 1;
					break;
				case 4:
					$fourCount = $fourCount + 1;
					break;
				case 5:
					$fiveCount = $fiveCount + 1;
					break;
				case 6:
					$sixCount = $sixCount + 1;
					break;
				case 7:
					$sevenCount = $sevenCount + 1;
					break;
				case 8:
					$eightCount = $eightCount + 1;
					break;
				case 9:
					$nineCount = $nineCount + 1;
					break;
				case 10:
					$tenCount = $tenCount + 1;
					break;
			}
		}

		$onePercent = round((float)($oneCount/$l) * 100 );
		$twoPercent = round((float)($twoCount/$l) * 100 );
		$threePercent = round((float)($threeCount/$l) * 100 );
		$fourPercent = round((float)($fourCount/$l) * 100 );
		$fivePercent = round((float)($fiveCount/$l) * 100 );
		$sixPercent = round((float)($sixCount/$l) * 100 );
		$sevenPercent = round((float)($sevenCount/$l) * 100 );
		$eightPercent = round((float)($eightCount/$l) * 100 );
		$ninePercent = round((float)($nineCount/$l) * 100 );
		$tenPercent = round((float)($tenCount/$l) * 100 );

		$oneDisplay = "<li>1: " . $onePercent . '%</li>';
		$twoDisplay = "<li>2: " . $twoPercent . '%</li>';
		$threeDisplay = "<li>3: " . $threePercent . '%</li>';
		$fourDisplay = "<li>4: " . $fourPercent . '%</li>';
		$fiveDisplay = "<li>5: " . $fivePercent . '%</li>';
		$sixDisplay = "<li>6: " . $sixPercent . '%</li>';
		$sevenDisplay = "<li>7: " . $sevenPercent . '%</li>';
		$eightDisplay = "<li>8: " . $eightPercent . '%</li>';
		$nineDisplay = "<li>9: " . $ninePercent . '%</li>';
		$tenDisplay = "<li>10: " . $tenPercent . '%</li>';

		switch ($_SESSION["spice"])
			{
				case 1:
					$oneDisplay = "<li><b>1: </b>" . $onePercent . '%</li>';
					break;
				case 2:
					$twoDisplay = "<li><b>2: </b>" . $twoPercent . '%</li>';
					break;
				case 3:
					$threeDisplay = "<li><b>3: </b>" . $threePercent . '%</li>';
					break;
				case 4:
					$fourDisplay = "<li><b>4: </b>" . $fourPercent . '%</li>';
					break;
				case 5:
					$fiveDisplay = "<li><b>5: </b>" . $fivePercent . '%</li>';
					break;
				case 6:
					$sixDisplay = "<li><b>6: </b>" . $sixPercent . '%</li>';
					break;
				case 7:
					$sevenDisplay = "<li><b>7: </b>" . $sevenPercent . '%</li>';
					break;
				case 8:
					$eightDisplay = "<li><b>8: </b>" . $eightPercent . '%</li>';
					break;
				case 9:
					$nineDisplay = "<li><b>9: </b>" . $ninePercent . '%</li>';
					break;
				case 10:
					$tenDisplay = "<li><b>10: </b>" . $tenPercent . '%</li>';
					break;
			}

		echo "<ul>"
			. $oneDisplay.$twoDisplay.$threeDisplay.$fourDisplay.$fiveDisplay.$sixDisplay.$sevenDisplay.$eightDisplay.$nineDisplay.$tenDisplay
			. "</ul>";

	?>
	</div>
</body>
</html>