<?php
//anthony verlouw
//25/09/2026
//toevoegen pagina
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
    Student Toevoegen
</h1>
<form method="POST" action="toevoegen_student.php">
    <p>
        <label for="studentId">Student ID</label>
        <input id="studentId" name="studentid" type="text">
    </p>
    <p>
        <label for="Voornaam">Voornaam</label>
        <input id="Voornaam" name="voornaam" type="text">
    </p>
    <p>
        <label for="Achternaam">Achternaam</label>
        <input id="Achternaam" name="achternaam" type="text">
    </p>
    <p>
        <label for="Geboortedatum">Geboortedatum</label>
        <input id="Geboortedatum" name="geboortedatum" type="date">
    </p>
    <p>
        <label for="Geslacht">Geslacht</label>
        <input id="Geslacht" name="geslacht" type="text">
    </p>
    <p>
        <label for="Email">e-mail</label>
        <input id="Email" name="email" type="text">
    </p>
    <p>
        <label for="Studierichting">Studie richting</label>
        <input id="Studierichting" name="studierichting" type="text">
    </p>
    <p>
        <label for="Startjaar">Start jaar</label>
        <input id="Startjaar" name="startjaar" type="text">
    </p>
    <p>
        <label for="Huidigjaar">Huidig jaar</label>
        <input id="Huidigjaar" name="huidigjaar" type="text">
    </p>
    <p>
        <label for="Studiestatus">Studie status</label>
        <input id="Studiestatus" name="studiestatus" type="text">
    </p>
    <input type="submit" name="Submit">
</form>
<?php
if (isset($_POST["Submit"])) {
    $newStudentID = $_POST['studentid'];
    $newVoornaam = $_POST['voornaam'];
    $newAchternaam = $_POST['achternaam'];
    $newGeboortedatum = $_POST['geboortedatum'];
    $newGeslacht = $_POST['geslacht'];
    $newEmail = $_POST['email'];
    $newStudieRichting = $_POST['studierichting'];
    $newStartjaar = $_POST['startjaar'];
    $newHuidigjaar = $_POST['huidigjaar'];
    $newStudieStatus = $_POST['studiestatus'];

    require "../includes/db_functions.php";

    StartConnection("studenten_informatie_db");

    //query schrijven om een student toe te voegen

    $query = "INSERT INTO studenten_dataset_kw1c (`StudentID`, `Voornaam`, `Achternaam`, `Geboortedatum`, `Geslacht`, `Email`, `Studierichting`, `Startjaar`, `HuidigJaar`, `StudieStatus`)
        VALUES ($newStudentID, '$newVoornaam', '$newAchternaam', '$newGeboortedatum', '$newGeslacht', '$newEmail', '$newStudieRichting', '$newStartjaar', '$newHuidigjaar', '$newStudieStatus')";

    //daadwerkelijk toevoegen aan de database
    $rowsAffected = ExecuteQuery($query);
    if ($rowsAffected > 0) {
        echo "student toegevoegd";
    } else {
        echo "iets is mis gegaan";
    }

}
?>
</body>
</html>

