<?php
//ANTHONY Verlouw
//21/9/2026
//update pokemon
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$id = $_GET["pokemonID"];

require "includes/db_functions.php";

StartConnection("pokemondb");

$query = "SELECT * FROM pokemon WHERE number = '$id'";
$result = ExecuteSelectQuery($query);

$pokemon = $result[0];

if (isset($_POST["addUpdate"]))
{
    $pokemonName = $_POST["naamPokemon"];
    $pokemonNummer = $_POST["nummerPokemon"];
    $pokemonType1 = $_POST["type1Pokemon"];
    $pokemonType2 = $_POST["type2Pokemon"];
    $pokemonAbility = $_POST["abilityPokemon"];
    $pokemonSpecies = $_POST["speciesPokemon"];
    $pokemonPicture = $_POST["picturePokemon"];

    $updateQuery = "UPDATE pokemon SET `name` = '$pokemonName', `number` = '$pokemonNummer', `type1` = '$pokemonType1', `type2` = '$pokemonType2', `ability` = '$pokemonAbility', `species` = '$pokemonSpecies', `picture` = '$pokemonPicture' WHERE `number` = '$id'";

    $rowsAffected = ExecuteQuery($updateQuery);
    if ($rowsAffected > 0)
    {
        echo "het is gelukt";
    }
    else
    {
        echo " het is niet gelukt";
    }
}

if (!isset($id))
{
    header("Location: pokemondb.php");
    die();
}
?>
<h1>
    pokemon updaten
</h1>

<a href="pokemondb.php">Home</a>
<form name="toevoegenPokemon" action="updaten_pokemon.php?pokemonID=<?php echo $id ?>" method="POST">
    <p>
        Naam Pokemon <input name="naamPokemon" type="text" value="<?php echo $pokemon["name"]?>"><br>
    </p>
    <p>
        Nummer Pokemon <input name="nummerPokemon"  readonly type="text" value="<?php echo $pokemon["number"]?>"><br>
    </p>
    <p>
        Type 1 Pokemon <input name="type1Pokemon" type="text" value="<?php echo $pokemon["type1"]?>"><br>
    </p>
    <p>
        Type 2 Pokemon <input name="type2Pokemon" type="text" value="<?php echo $pokemon["type2"]?>"><br>
    </p>
    <p>
        Ability Pokemon <input name="abilityPokemon" type="text" value="<?php echo $pokemon["ability"]?>"><br>
    </p>
    <p>
        Species Pokemon <input name="speciesPokemon" type="text" value="<?php echo $pokemon["species"]?>"><br>
    </p>
    <p>
        Picture Pokemon <input name="picturePokemon" type="text" value="<?php echo $pokemon["picture"]?>"><br>
    </p>
    <input type="submit" value="update" name="addUpdate"/>
</form>



</body>
</html>
