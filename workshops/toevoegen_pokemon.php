<?php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="styles/stylesheet.css">
</head>
<body>
<h1>pokemon toevoegen</h1>
<a href="pokemondb.php">Home</a>
<!--formuulier toe te voegen met meerdere velden en een toevoeg knop-->
<form name="toevoegenPokemon" action="toevoegen_pokemon.php" method="POST">
    <p>
    Naam Pokemon <input name="naamPokemon" type="text"><br>
    </p>
    <p>
        Nummer Pokemon <input name="nummerPokemon" type="text"><br>
    </p>
    <p>
        Type 1 Pokemon <input name="type1Pokemon" type="text"><br>
    </p>
    <p>
        Type 2 Pokemon <input name="type2Pokemon" type="text"><br>
    </p>
    <p>
        Ability Pokemon <input name="abilityPokemon" type="text"><br>
    </p>
    <p>
        Species Pokemon <input name="speciesPokemon" type="text"><br>
    </p>
    <p>
        Picture Pokemon <input name="picturePokemon" type="text"><br>
    </p>
    <input type="submit" value="Submit" name="add"/>
</form>
</body>
</html>
<?php
//check controleert of formuliet verzonden is
if (isset($_POST["add"]))
{
     $pokemonName = $_POST["naamPokemon"];
     $pokemonNummer = $_POST["nummerPokemon"];
     $pokemonType1 = $_POST["type1Pokemon"];
     $pokemonType2 = $_POST["type2Pokemon"];
     $pokemonAbility = $_POST["abilityPokemon"];
     $pokemonSpecies = $_POST["speciesPokemon"];
     $pokemonPicture = $_POST["picturePokemon"];

    //database functies aanroepen
    require "includes/db_functions.php";

    //verbinding maken met database
    StartConnection("pokemondb");

    //query schrijven om een pokemon toe te voegen

    $query = "INSERT INTO pokemon (`name`, `number`, `type1`, `type2`, `ability`, `species`, `picture`)
    VALUES ('$pokemonName', $pokemonNummer, '$pokemonType1', '$pokemonType2', '$pokemonAbility', '$pokemonSpecies', '$pokemonPicture')";

    //daadwerkelijk toevoegen aan de database
    $rowsAffected = ExecuteQuery($query);
    if ($rowsAffected > 0)
    {
        echo "pokemon toegevoegd";
    }
    else
    {
        echo "iets is mis gegaan";
    }



}
//ophalen gegevens uit formulier
?>