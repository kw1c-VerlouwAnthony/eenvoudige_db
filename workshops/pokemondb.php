<?php
//include datanase in de file
include "includes/db_functions.php";
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
StartConnection("pokemondb");
$query = "SELECT * FROM pokemon;";

$results = ExecuteSelectQuery($query);

//var_dump($results);

foreach($results as $pokemon)
{
    echo $pokemon["name"];
    echo $pokemon["picture"];
    echo "<br><br>";
}
?>
    <form method="get">
        <p>
            <select name="searchType1">
                <option>
                    all
                </option>

                <?php
                    //inladen alle unieke type1s uit een dtaabse
//                query voor unieke type1 the vinden uit de pokemon tabel
                    $queryType1 = "SELECT * DISTINCT type1 FROM pokemon";
//                    stuurt de query naar de database hoort ook een functie die ik niet heb
                    $resultType1 = $connection->query($queryType1);

//                    voor elke resultaat maakt hij een optie type 1
                    foreach ($resultType1 as $type1) {
                        echo "<option>" . $type1['type1'] . "</option>";
                    }
                ?>
            </select>
        </p>
    </form>
<?php

    if (isset($_GET["search"])) {
        $search = $_GET["search"];
        echo "<h3> heeft gezocht op: $search </h3>";
    }
    else
    {
        $search = "";
    }

    echo "<section>";

//    checked of searchtype1 waar is en niet gelijk is aan all
    if (isset($_GET["searchType1"]) && $_GET["searchType1"] != "all") {
//        variabele aanmak om het makkelijker te maken
        $inputType1 = $_GET["searchType1"];
//        query om alle pokemon the selecteren waar type 1 de specifieke type is die is geselecteerd
        $query = "SELECT * FROM pokemon WHERE type1 = '$inputType1'";
    }
    else
    {
//        als het wel gelijk is aan all vindt hij de pokemon het meest dichtbij de search
        $query = "SELECT * FROM pokemon WHERE name LIKE = '%$search%'";
    }
?>
</body>
</html>
