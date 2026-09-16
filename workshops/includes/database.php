<?php
$host = "localhost";
$dbname = "pokemondb";
$username = "root";
$password = "";

try {
    $connection = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $username,
        $password
    );

    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Databaseverbinding mislukt: " . $e->getMessage());
}
?>