<?php
//anthony verlouw
//21/09/2026
//bewerkpagina

//maakt een session aan
session_start();
?>
<!doctype html>
<html lang="en">
<?php
    // Hier wordt de header toegevoegd aan de pagina
    include "../includes/header.php";
?>
<body>
<h1>
    Studenten update
</h1>
<?php
    // studentID uit de URL halen
    $ID = $_GET["studentID"];

    // de database functies toevoegen
    require "../includes/db_functions.php";

    // verbinding maken met de database
    StartConnection("studenten_informatie_db");

    // deze if kijkt of er op de submit knop is geklikt
    if (isset($_POST['Submit']))
    {
        // Hier halen we alle ingevulde gegevens uit het formulier
        $newVoornaam = $_POST['voornaam'];
        $newAchternaam = $_POST['achternaam'];
        $newGeboortedatum = $_POST['geboortedatum'];
        $newGeslacht = $_POST['geslacht'];
        $newEmail = $_POST['email'];
        $newStudieRichting = $_POST['studierichting'];
        $newStartjaar = $_POST['startjaar'];
        $newHuidigjaar = $_POST['huidigjaar'];
        $newStudieStatus = $_POST['studiestatus'];

        // doet gegevens aanpassen in databse
        $queryUpdate = "UPDATE studenten_dataset_kw1c SET `Voornaam` = '$newVoornaam', `Achternaam` = '$newAchternaam', `Geboortedatum` = '$newGeboortedatum', `Geslacht` = '$newGeslacht', `Email` = '$newEmail',`Studierichting` = '$newStudieRichting', `Startjaar` = '$newStartjaar' ,`HuidigJaar` = '$newHuidigjaar', `StudieStatus` = '$newStudieStatus' WHERE `studentID` = '$ID' ";

        //de update query uitgevoerd
        ExecuteQuery($queryUpdate);

    }

    // deze query haalt de gegevens op van de student met het juiste ID
    $query = "SELECT * FROM studenten_dataset_kw1c WHERE studentID = '$ID'";
    $result = ExecuteSelectQuery($query);

    // deze foreach halen we de gegevens op
    foreach ($result as $col) {

        //de gegevens opgeslagen in variabelen
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

    //als er geen ID is ingevuld wordt de gebruiker teruggestuurd naar de index pagina
    if (!isset($ID))
    {
        header("Location: ../index.php");
        die();
    }
?>

<!--  formulier laat de gegevens van de student zien en maakt het mogelijk om ze aan te passen -->
<form method="POST" action="bewerkStudent.php?studentID=<?php echo $ID;?>">
    <p>
        <!-- Het student ID kan niet aangepast worden -->
        <label for="studentId">Student ID</label>
        <input id="studentId" name="studentid" type="text" value="<?php echo $studentID; ?>" readonly>
    </p>
    <p>
        <!-- Hier kan de voornaam aangepast worden -->
        <label for="Voornaam">Voornaam</label>
        <input id="Voornaam" name="voornaam" type="text" value="<?php echo $voornaam; ?>">
    </p>
    <p>
        <!-- Hier kan de achternaam aangepast worden -->
        <label for="Achternaam">Achternaam</label>
        <input id="Achternaam" name="achternaam" type="text" value="<?php echo $achternaam; ?>">
    </p>
    <p>
        <!-- Hier kan de geboortedatum aangepast worden -->
        <label for="Geboortedatum">Geboortedatum</label>
        <input id="Geboortedatum" name="geboortedatum" type="date" value="<?php echo $geboortedatum; ?>">
    </p>
    <p>
        <!-- Hier kan het geslacht aangepast worden -->
        <label for="Geslacht">Geslacht</label>
        <input id="Geslacht" name="geslacht" type="text" value="<?php echo $geslacht; ?>">
    </p>
    <p>
        <!-- Hier kan het e-mailadres aangepast worden -->
        <label for="Email">e-mail</label>
        <input id="Email" name="email" type="text" value="<?php echo $email; ?>">
    </p>
    <p>
        <!-- Hier kan de studierichting gekozen worden -->
        <label for="Studierichting">Studie richting</label>
        <select id="Studierichting" name="studierichting">
            <?php
                //  query haalt alle studierichtingen op uit de database
                $queryStudie = "SELECT DISTINCT `Studierichting` FROM studenten_dataset_kw1c;";
                $resultStudie = ExecuteSelectQuery($queryStudie);

                // Met deze foreach maken we voor elke studierichting een optie aan
                foreach ($resultStudie as $option)
                {
                    $richting = $option['Studierichting'];

                    // Als de richting hetzelfde is als de huidige studierichting wordt deze geselecteerd
                    if ($richting == $studieRichting)
                    {
                        $selected = "selected";
                    }
                    else
                    {
                        // Anders wordt deze optie niet geselecteerd
                        $selected = "";
                    }

                    // Hier wordt de optie toegevoegd aan het select menu
                    echo "<option value=\"$richting\" $selected>$richting</option>";
                }
            ?>
        </select>
    </p>
    <p>
        <!-- Hier kan het startjaar aangepast worden -->
        <label for="Startjaar">Start jaar</label>
        <input id="Startjaar" name="startjaar" type="text" value="<?php echo $startjaar; ?>">
    </p>
    <p>
        <!-- Hier kan het huidige studiejaar aangepast worden -->
        <label for="Huidigjaar">Huidig jaar</label>
        <input id="Huidigjaar" name="huidigjaar" type="text" value="<?php echo $huidigjaar; ?>">
    </p>
    <p>
        <!-- Hier kan de studie status gekozen worden -->
        <label for="Studiestatus">Studie status</label>
        <select id="Studiestatus" name="studiestatus">
            <?php
                // Deze query haalt alle verschillende studiestatussen op uit de database
                $queryStudie = "SELECT DISTINCT `StudieStatus`FROM studenten_dataset_kw1c";
                $resultStudie = ExecuteSelectQuery($queryStudie);

                // Met deze foreach maken we voor elke status een optie aan
                foreach ($resultStudie as $option)
                {
                    $status = $option['StudieStatus'];

                    // Als de status overeenkomt met de huidige status wordt deze geselecteerd
                    if ($status == $studieStatus)
                    {
                        $selected = "selected";
                    }
                    else
                    {
                        // Anders blijft de optie niet geselecteerd
                        $selected = "";
                    }

                    // Hier wordt de status toegevoegd aan het select menu
                    echo "<option value=\"$status\" $selected>$status</option>";
                }
            ?>
        </select>
    </p>

    <!-- Met deze knop kunnen de aangepaste gegevens opgeslagen worden -->
    <input type="submit" name="Submit">
</form>
</body>
</html>


