<?php
session_start();
/*
if ($_SESSION["submitted"]==true)
{
    header("Location: results.php");
    exit();
}
*/
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Sarah's Survey</title>
        <link rel="stylesheet" type="text/css" href="../../css/stylesheet.css">

    </head>
<body id="survey">
    <h1>PHP Survey</h1>

    <form action="session.php" method="post">
        <label>Name:</label> <input type="text" name="name"><br><br>
        <label>Harry Potter House:</label> <br>
        <input type="radio" name="hpHouse" value="Gryffindor">Gryffindor <br>
        <input type="radio" name="hpHouse" value="Ravenclaw">Ravenclaw <br>
        <input type="radio" name="hpHouse" value="Hufflepuff">Hufflepuff <br>
        <input type="radio" name="hpHouse" value="Slytherin">Slytherin<br><br>
        
        <label>Cats or dogs?</label><br>
        <input type="radio" name="animal" value="Cats">Cats<br>
        <input type="radio" name="animal" value="Dogs">Dogs<br><br>

        <label>On a scale of 1 to 10, how spicy do you like your Thai food?</label> <br>
        <input type="radio" name="spice" value="1">1 <br>
        <input type="radio" name="spice" value="2">2 <br>
        <input type="radio" name="spice" value="3">3 <br>
        <input type="radio" name="spice" value="4">4 <br>
        <input type="radio" name="spice" value="5">5 <br>
        <input type="radio" name="spice" value="6">6 <br>
        <input type="radio" name="spice" value="7">7 <br>
        <input type="radio" name="spice" value="8">8 <br>
        <input type="radio" name="spice" value="9">9 <br>
        <input type="radio" name="spice" value="10">10 <br><br>

<!--
        <label>This is just a placeholder</label><br>
        <input type="checkbox" name="placesVisited[]" value="North America">North America<br>
        <input type="checkbox" name="placesVisited[]" value="South America">South America<br>
        <input type="checkbox" name="placesVisited[]" value="Europe">Europe<br>
        <input type="checkbox" name="placesVisited[]" value="Africa">Africa<br>
        <input type="checkbox" name="placesVisited[]" value="Australia">Australia<br>
        <input type="checkbox" name="placesVisited[]" value="Antarctica">Antarctica<br><br>
-->
        
        <button type="submit">SUBMIT</button>
    </form>

    <a href="results.php">View Results</a>

</body>
</html>
