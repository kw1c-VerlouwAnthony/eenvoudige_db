<?php
//anthony verlouw
//22/09/2206
//verwijder pagina

session_start();
?>

<!doctype html>
<html lang="en">
<?php
    include "../includes/header.php";
?>
<body>
<?php
$ID = $_GET["studentID"];

require "../includes/db_functions.php";

StartConnection("studenten_informatie_db");

$queryDelete = "DELETE FROM `studenten_dataset_kw1c` WHERE studentID = '$ID'";
$deleteResult = ExecuteQuery($queryDelete);

$rowsAffected = $deleteResult;
if ($rowsAffected > 0)
{
    echo "De studenten informatie is verwijderd!";
}
else
{
    echo "De studenten informatie is niet verwijderd!";
}

if (!isset($ID))
{
    header("Location: ../index.php");
    die();
}
?>
</body>
</html>
