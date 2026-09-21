<?php
//anthony verlouw
//21/09/2026
//bewerkpagina

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
<h1>
    Studenten update
</h1>
<?php
$ID = $_GET["studentID"];

require "../includes/db_functions.php";

StartConnection("studenten_informatie_db");

$query = "SELECT * FROM studenten_dataset_kw1c WHERE studentID = '$ID'";
$result = ExecuteSelectQuery($query);

foreach ($result as $col) {

    $studentID = $col['StudentID'];
    $voornaam = $col['Voornaam'];
    $achternaam = $col['Achternaam'];
    $geboortedatum = $col['Geboortedatum'];
    $geslacht = $col['Geslacht'];
    $email = $col['Email'];
    $studieRichting = $col['Studierichting'];
    $startjaar = $col['Startjaar'];
    $huidigjaar = $col['HuidigJaar'];
    $studieStatus = $col['StudieStatus'];
}
?>

<form method="POST" action="bewerk_pagina.php">
    <p>
        <label for="studentID">Student ID</label>
        <input name="studentID" type="text" value="<?php echo $studentID; ?>">
    </p>
    <p>
        <label>Voornaam</label>
        <input name="voornaam" type="text" value="<?php echo $voornaam; ?>">
    </p>
    <p>
        <label>Achternaam</label>
        <input name="achternaam" type="text" value="<?php echo $achternaam; ?>">
    </p>
    <p>
        <label>Geboortedatum</label>
        <input name="geboortedatum" type="date" value="<?php echo $geboortedatum; ?>">
    </p>
    <p>
        <label>Geslacht</label>
        <input name="geslacht" type="text" value="<?php echo $geslacht; ?>">
    </p>
    <p>
        <label>e-mail</label>
        <input name="email" type="text" value="<?php echo $email; ?>">
    </p>
    <p>
        <label>Studie richting</label>
        <input name="studierichting" type="text" value="<?php echo $studieRichting; ?>">
    </p>
    <p>
        <label>Start jaar</label>
        <input name="startjaar" type="text" value="<?php echo $startjaar; ?>">
    </p>
    <p>
        <label>Huidig jaar</label>
        <input name="huidigjaar" type="text" value="<?php echo $huidigjaar; ?>">
    </p>
    <p>
        <label>Studie status</label>
        <input name="studiestatus" type="text" value="<?php echo $studieStatus; ?>">
    </p>
    <input type="submit" name="Submit">
</form>

<?php
    if (isset($_POST['Submit'])) {
        $newStudentID = $_POST['studentID'];
        $newVoornaam = $_POST['voornaam'];
        $newAchternaam = $_POST['achternaam'];
        $newGeboortedatum = $_POST['geboortedatum'];
        $newGeslacht = $_POST['geslacht'];
        $newEmail = $_POST['email'];
        $newStudieRichting = $_POST['studierichting'];
        $newStartjaar = $_POST['startjaar'];
        $newHuidigjaar = $_POST['huidigjaar'];
        $newStudieStatus = $_POST['studiestatus'];

        $queryUpdate = "UPDATE studenten_dataset_kw1c SET `StudentID` = '$newStudentID', `Voornaam` = '$newVoornaam', `Achternaam` = '$newAchternaam', `Geboortedatum` = '$newGeboortedatum', `Geslacht` = '$newGeslacht', `Email` = '$newEmail',`Startjaar` = '$newStartjaar', `HuidigJaar` = '$newHuidigjaar', `StudieStatus` = '$newStudieStatus'";

        echo ExecuteQuery($queryUpdate);

    }
?>
</body>
</html>

