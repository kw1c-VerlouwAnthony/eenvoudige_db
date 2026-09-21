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
<h1>
    pokemon updaten
</h1>
<?php
$id = $_GET["pokemonID"];
echo $id;

require "includes/db_functions.php";

StartConnection("pokemondb");

$query = "SELECT * FROM pokemon WHERE number = '$id'";
?>
</body>
</html>
