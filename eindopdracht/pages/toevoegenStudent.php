<?php
//anthony verlouw
//25/09/2026
//toevoegen pagina
?>

<!doctype html>
<html lang="en">
<?php
    include "../includes/header.php";
?>
<body>
<main>
    <?php
    require "../includes/db_functions.php";

    StartConnection("studenten_informatie_db");
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
<h1>
    Student Toevoegen
</h1>
<form method="POST" action="toevoegenStudent.php">
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
        <select id="Studierichting" name="studierichting">
            <?php
            //Inladen van alle unieke type 1 uit de database.
            $queryStudie = "SELECT DISTINCT `Studierichting` FROM studenten_dataset_kw1c;";
            $resultStudie = ExecuteSelectQuery($queryStudie);

            foreach ($resultStudie as $option)
            {
                echo "<option>" . $option['Studierichting'] . "</option>";
            }
            ?>
        </select>
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
        <select id="Studiestatus" name="studiestatus">
            <?php
            //Inladen van alle unieke type 1 uit de database.
            $queryStudie = "SELECT DISTINCT `StudieStatus` FROM studenten_dataset_kw1c;";
            $resultStudie = ExecuteSelectQuery($queryStudie);

            foreach ($resultStudie as $option)
            {
                echo "<option>" . $option['StudieStatus'] . "</option>";
            }
            ?>
        </select>
    </p>
    <input type="submit" name="Submit">
</form>
</main>
</body>
<?php
include "../includes/footer.php";
?>
</html>

