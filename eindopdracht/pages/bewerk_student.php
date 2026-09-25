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

<form method="POST" action="bewerk_student.php">
    <p>
        <label for="studentId">Student ID</label>
        <input id="studentId" name="studentid" type="text" value="<?php echo $studentID; ?>">
    </p>
    <p>
        <label for="Voornaam">Voornaam</label>
        <input id="Voornaam" name="voornaam" type="text" value="<?php echo $voornaam; ?>">
    </p>
    <p>
        <label for="Achternaam">Achternaam</label>
        <input id="Achternaam" name="achternaam" type="text" value="<?php echo $achternaam; ?>">
    </p>
    <p>
        <label for="Geboortedatum">Geboortedatum</label>
        <input id="Geboortedatum" name="geboortedatum" type="date" value="<?php echo $geboortedatum; ?>">
    </p>
    <p>
        <label for="Geslacht">Geslacht</label>
        <input id="Geslacht" name="geslacht" type="text" value="<?php echo $geslacht; ?>">
    </p>
    <p>
        <label for="Email">e-mail</label>
        <input id="Email" name="email" type="text" value="<?php echo $email; ?>">
    </p>
    <p>
        <label for="Studierichting">Studie richting</label>
        <input id="Studierichting" name="studierichting" type="text" value="<?php echo $studieRichting; ?>">
    </p>
    <p>
        <label for="Startjaar">Start jaar</label>
        <input id="Startjaar" name="startjaar" type="text" value="<?php echo $startjaar; ?>">
    </p>
    <p>
        <label for="Huidigjaar">Huidig jaar</label>
        <input id="Huidigjaar" name="huidigjaar" type="text" value="<?php echo $huidigjaar; ?>">
    </p>
    <p>
        <label for="Studiestatus">Studie status</label>
        <input id="Studiestatus" name="studiestatus" type="text" value="<?php echo $studieStatus; ?>">
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

        $queryUpdate = "UPDATE studenten_dataset_kw1c SET `StudentID` = '$newStudentID', `Voornaam` = '$newVoornaam', `Achternaam` = '$newAchternaam', `Geboortedatum` = '$newGeboortedatum', `Geslacht` = '$newGeslacht', `Email` = '$newEmail',`Startjaar` = '$newStartjaar' ,`HuidigJaar` = '$newHuidigjaar', `StudieStatus` = '$newStudieStatus' WHERE `studentID` = '$ID' ";

        echo ExecuteQuery($queryUpdate);

    }
?>
</body>
</html>

