<?php
//anthony verlouw
//25/09/2026
//toevoegen pagina
//maakt sessie aan
session_start();
?>

<!doctype html>
<html lang="en">
<?php
// Hier wordt de header toegevoegd aan de pagina
include "../includes/header.php";
?>
<body>
<main>
    <?php
    // Hier worden de database functies ingeladen
    require "../includes/db_functions.php";

    // Verbinding maken met de database
    StartConnection("studenten_informatie_db");

    // Deze if controleert of er op de submit knop is geklikt
    if (isset($_POST["Submit"])) {

        // Hier worden alle ingevulde gegevens uit het formulier opgehaald
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

        // Deze query voegt een nieuwe student toe aan de database
        // De eerste regel geeft aan in welke kolommen de gegevens komen
        // De VALUES geven aan welke gegevens in die kolommen worden geplaatst
        $query = "INSERT INTO studenten_dataset_kw1c (`StudentID`, `Voornaam`, `Achternaam`, `Geboortedatum`, `Geslacht`, `Email`, `Studierichting`, `Startjaar`, `HuidigJaar`, `StudieStatus`)
            VALUES ($newStudentID, '$newVoornaam', '$newAchternaam', '$newGeboortedatum', '$newGeslacht', '$newEmail', '$newStudieRichting', '$newStartjaar', '$newHuidigjaar', '$newStudieStatus')";

        // Hier wordt de query uitgevoerd zodat de student daadwerkelijk wordt toegevoegd
        // Het aantal aangepaste rijen wordt opgeslagen in rowsAffected
        $rowsAffected = ExecuteQuery($query);

        // Controleren of er een rij is toegevoegd aan de database
        if ($rowsAffected > 0) {
            // Als er een rij is toegevoegd wordt dit bericht getoond
            echo "student toegevoegd";
        } else {
            // Als er niks is toegevoegd wordt dit bericht getoond
            echo "iets is mis gegaan";
        }

    }
    ?>

    <h1>
        Student Toevoegen
    </h1>

    <!-- Dit formulier wordt gebruikt om een nieuwe student in te vullen -->
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
                // Deze query haalt alle verschillende studierichtingen uit de database op
                $queryStudie = "SELECT DISTINCT `Studierichting` FROM studenten_dataset_kw1c;";
                $resultStudie = ExecuteSelectQuery($queryStudie);

                // Met deze foreach lopen we door alle opgehaalde studierichtingen heen
                foreach ($resultStudie as $option)
                {
                    // Hier wordt elke studierichting als optie toegevoegd aan het keuzemenu
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
                // Deze query haalt alle verschillende studiestatussen uit de database op
                $queryStudie = "SELECT DISTINCT `StudieStatus` FROM studenten_dataset_kw1c;";
                $resultStudie = ExecuteSelectQuery($queryStudie);

                // Met deze foreach lopen we door alle opgehaalde studiestatussen heen
                foreach ($resultStudie as $option)
                {
                    // Hier wordt elke studiestatus als optie toegevoegd aan het keuzemenu
                    echo "<option>" . $option['StudieStatus'] . "</option>";
                }
                ?>
            </select>
        </p>

        <!-- Met deze knop kan het formulier verstuurd worden -->
        <input type="submit" name="Submit">
    </form>
</main>
</body>
<?php
// Hier wordt de footer toegevoegd aan de pagina
include "../includes/footer.php";
?>
</html>
