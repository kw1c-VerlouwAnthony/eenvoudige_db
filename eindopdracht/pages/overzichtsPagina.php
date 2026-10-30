<?php
//anthony verlouw
//14/09/2026
//overzichtsPagina.php
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
    ?>

    <!-- Dit fieldset bevat het formulier waarmee je studenten kunt filteren -->
    <fieldset>
        <legend>
            Filter
        </legend>

        <!-- Met dit formulier kan de gebruiker zoeken naar studenten -->
        <form method="get">
            <p>
                <!-- Hier kan de gebruiker een naam invullen om op te zoeken -->
                <label>Zoeken</label>
                <input type="text" name="search">
            </p>
            <p>
                <!-- Hier kan de gebruiker een studierichting kiezen -->
                <label>Studierichting</label>
                <select name="searchStudie">
                    <!-- Met deze optie worden alle studierichtingen getoond -->
                    <option>All</option>
                    <?php
                    // Deze query haalt alle verschillende studierichtingen op uit de database
                    $queryStudie = "SELECT DISTINCT `Studierichting` FROM studenten_dataset_kw1c;";
                    $resultStudie = ExecuteSelectQuery($queryStudie);

                    // Met deze foreach lopen we door alle opgehaalde studierichtingen heen
                    foreach ($resultStudie as $option)
                    {
                        // Hier wordt elke studierichting toegevoegd als optie aan het keuzemenu
                        echo "<option>" . $option['Studierichting'] . "</option>";
                    }
                    ?>
                </select>
            </p>

            <!-- Met deze knop wordt het zoekformulier verstuurd -->
            <input type="submit" value="Zoeken..">
        </form>
    </fieldset>

    <table border="1">
        <?php
        // Hier worden de ingevulde zoekgegevens uit de URL opgehaald
        if (isset($_GET["search"])) {
            // De ingevulde zoekterm wordt opgeslagen in een variabele
            $search = $_GET["search"];

            // Laat zien waar de gebruiker op heeft gezocht
            echo "<h3>U heeft gezocht op: $search</h3>";
        } else {
            // Als er geen zoekterm is ingevuld blijft de zoekterm leeg
            $search = "";
        }

        // Controleren of er een studierichting is gekozen en of deze niet op All staat
        if (isset($_GET["searchStudie"]) && $_GET["searchStudie"] != 'All') {
            // De gekozen studierichting wordt opgeslagen
            $inputStudie = $_GET["searchStudie"];

            // Deze query zoekt naar studenten met de gekozen studierichting en de ingevulde zoekterm
            $query = "SELECT * FROM studenten_dataset_kw1c WHERE `Studierichting` = '$inputStudie' AND CONCAT(Voornaam, ' ', Achternaam) LIKE '%$search%'";
        } else {

            // Als er geen specifieke studierichting is gekozen, wordt alleen op de naam gezocht
            $query = "SELECT * FROM studenten_dataset_kw1c WHERE CONCAT(Voornaam, ' ', Achternaam) LIKE '%$search%'";
        }

        // De query uitvoeren en de gevonden studenten opslaan
        $resultQuery = ExecuteSelectQuery($query);

        // Controleren of de gebruiker is ingelogd
        if(isset($_SESSION['ingelogd']))
        {
            // De kolomnamen van de tabel worden weergegeven
            echo "<tr>";
            echo "<td>" . "StudentID" . "</td>";
            echo "<td>" . "Voornaam" . "</td>";
            echo "<td>" . "Achternaam" . "</td>";
            echo "<td>" . "Geboortedatum" . "</td>";
            echo "<td>" . "Geslacht" . "</td>";
            echo "<td>" . "Email" . "</td>";
            echo "<td>" . "Studierichting" . "</td>";
            echo "<td>" . "Startjaar" . "</td>";
            echo "<td>" . "HuidigJaar" . "</td>";
            echo "<td>" . "StudieStatus" . "</td>";

            // Met deze link kan een nieuwe student worden toegevoegd
            echo "<td>" . "<a href='toevoegenStudent.php'>" . "Toevoegen" . "</a>" . "</td>";
            echo "</tr>";

            // Met deze foreach lopen we door alle gevonden studenten heen
            foreach ($resultQuery as $col)
            {
                // Voor elke gevonden student wordt een nieuwe tabelrij aangemaakt
                echo "<tr>";

                // De gegevens van de student worden opgeslagen in aparte variabelen
                $studentID = $col['StudentID'];

                // Hier worden de gegevens van de student in de tabel geplaatst
                echo "<td>" . $col["StudentID"] . "</td>";
                echo "<td>" . $col["Voornaam"] . "</td>";
                echo "<td>" . $col["Achternaam"] . "</td>";
                echo "<td>" . $col["Geboortedatum"] . "</td>";
                echo "<td>" . $col["Geslacht"] . "</td>";
                echo "<td>" . $col["Email"] . "</td>";
                echo "<td>" . $col["Studierichting"] . "</td>";
                echo "<td>" . $col["Startjaar"] . "</td>";
                echo "<td>" . $col["HuidigJaar"] . "</td>";
                echo "<td>" . $col["StudieStatus"] . "</td>";

                // Met deze link kan de gebruiker de gegevens van de student aanpassen
                echo "<td>" . "<a href='bewerkStudent.php?studentID=$studentID'>Bewerken</a>" . "</td>";

                // Met deze link kan de gebruiker de student verwijderen
                echo "<td>" . "<a href='verwijderStudent.php?studentID=$studentID'>Verwijderen</a>" . "</td>";

                // Hier wordt de tabelrij afgesloten
                echo "</tr>";
            }
        }
        else
        {
            // Als de gebruiker niet is ingelogd worden alleen deze kolomnamen getoond
            echo "<tr>";
            echo "<td>" . "StudentID" . "</td>";
            echo "<td>" . "Voornaam" . "</td>";
            echo "<td>" . "Achternaam" . "</td>";
            echo "<td>" . "Studierichting" . "</td>";
            echo "</tr>";

            // Met deze foreach lopen we door alle gevonden studenten heen
            foreach ($resultQuery as $col)
            {
                // Voor elke gevonden student wordt een nieuwe tabelrij aangemaakt
                echo "<tr>";

                // Hier worden de gegevens van de student in de tabel geplaatst
                echo "<td>" . $col["StudentID"] . "</td>";
                echo "<td>" . $col["Voornaam"] . "</td>";
                echo "<td>" . $col["Achternaam"] . "</td>";
                echo "<td>" . $col["Studierichting"] . "</td>";

                // Hier wordt de tabelrij afgesloten
                echo "</tr>";
            }
        }
        ?>
    </table>
</main>
</body>
<?php
// Hier wordt de footer toegevoegd aan de pagina
include "../includes/footer.php";
?>
</html>
