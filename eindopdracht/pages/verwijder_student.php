<?php
//anthony verlouw
//22/09/2206
//verwijder pagina

session_start();
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
