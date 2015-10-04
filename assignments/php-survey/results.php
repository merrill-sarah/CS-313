<?php
session_start();

$data = json_decode(file_get_contents('data.json'), true);
?>
<!DOCTYPE html>
<html>
	<h1>Results</h1>
	<?php 
		if ($_SESSION["name"] != null)
		{
			echo "<label>Name: </label>" . $_SESSION["name"]."<br>";
		}
	?>
	<label>Number of Participants:</label>
	<?php 
		echo count($data["name"]);
	?>
	<br><br>

	<h2>Harry Potter House</h2>
	<label>Your choice: </label><?php echo$_SESSION["hpHouse"]?><br>
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

			echo "<ul>"
				. "<li>Gryffindor: " . round((float)($gCount/$l) * 100 ) . '%</li>'
				. "<li>Ravenclaw: " . round((float)($rCount/$l) * 100 ) . '%</li>'
				. "<li>Hufflepuff: " . round((float)($hCount/$l) * 100 ) . '%</li>'
				. "<li>Slytherin: " . round((float)($sCount/$l) * 100 ) . '%</li>'
				. "</ul>";
		}

	?>
	<br><br>

	<h2>Cats or Dogs</h2>
	<label>Your choice: </label><?php echo $_SESSION["animal"]?><br>
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

			echo "<ul>"
				. "<li>Cats: " . round((float)($cCount/$l) * 100 ) . '%</li>'
				. "<li>Dogs: " . round((float)($dCount/$l) * 100 ) . '%</li>'
				. "</ul>";
		}

	?>
	<br><br>

	<h2>Spice Level</h2>
	<label>Your choice: </label><?php echo $_SESSION["spice"]?><br>	
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

			echo "<ul>"
				. "<li>1: " . round((float)($oneCount/$l) * 100 ) . '%</li>'
				. "<li>2: " . round((float)($twoCount/$l) * 100 ) . '%</li>'
				. "<li>3: " . round((float)($threeCount/$l) * 100 ) . '%</li>'
				. "<li>4: " . round((float)($fourCount/$l) * 100 ) . '%</li>'
				. "<li>5: " . round((float)($fiveCount/$l) * 100 ) . '%</li>'
				. "<li>6: " . round((float)($sixCount/$l) * 100 ) . '%</li>'
				. "<li>7: " . round((float)($sevenCount/$l) * 100 ) . '%</li>'
				. "<li>8: " . round((float)($eightCount/$l) * 100 ) . '%</li>'
				. "<li>9: " . round((float)($nineCount/$l) * 100 ) . '%</li>'
				. "<li>10: " . round((float)($tenCount/$l) * 100 ) . '%</li>'
				. "</ul>";
		}

	?>
	<br><br>

</html>