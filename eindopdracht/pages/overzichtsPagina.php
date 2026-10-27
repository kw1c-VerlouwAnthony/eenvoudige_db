<?php
//anthony verlouw
//14/09/2026
//overzichtsPagina.php
session_start();
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
    ?>
    <fieldset>
        <legend>
            Filter
        </legend>
        <form method="get">
            <p>
                <label>Zoeken</label>
                <input type="text" name="search">
            </p>
            <p>
                <label>Type 1</label>
                <select name="searchStudie">
                    <option>All</option>
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
            <input type="submit" value="Zoeken..">
        </form>
    </fieldset>
    <table border="1">
            <?php
            //Ophalen van de gegevens uit de URL
            if (isset($_GET["search"])) {
                $search = $_GET["search"];
                echo "<h3>U heeft gezocht op: $search</h3>";
            } else {
                $search = "";
            }

            if (isset($_GET["searchStudie"]) && $_GET["searchStudie"] != 'All') {
                $inputStudie = $_GET["searchStudie"];
                $query = "SELECT * FROM studenten_dataset_kw1c WHERE `Studierichting` = '$inputStudie' AND CONCAT(Voornaam, ' ', Achternaam) LIKE '%$search%'";
            } else {

                $query = "SELECT * FROM studenten_dataset_kw1c WHERE CONCAT(Voornaam, ' ', Achternaam) LIKE '%$search%'";
            }


            $resultQuery = ExecuteSelectQuery($query);

            if(isset($_SESSION['ingelogd']))
            {
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
                echo "<td>" . "<a href='toevoegenStudent.php'>" . "Toevoegen" . "</a>" . "</td>";
                echo "</tr>";

                foreach ($resultQuery as $col)
                {

                    echo "<tr>";

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
                    echo "<td>" . "<a href='bewerkStudent.php?studentID=$studentID'>Bewerken</a>" . "</td>";
                    echo "<td>" . "<a href='verwijderStudent.php?studentID=$studentID'>Verwijderen</a>" . "</td>";

                    echo "</tr>";
                }
            }
            else
            {
                echo "<tr>";
                echo "<td>" . "StudentID" . "</td>";
                echo "<td>" . "Voornaam" . "</td>";
                echo "<td>" . "Achternaam" . "</td>";
                echo "<td>" . "Studierichting" . "</td>";
                echo "</tr>";
                    foreach ($resultQuery as $col)
                    {
                        echo "<tr>";

                        $studentID = $col['StudentID'];
                        $voornaam = $col['Voornaam'];
                        $achternaam = $col['Achternaam'];
                        $studieRichting = $col['Studierichting'];


                        echo "<td>" . $col["StudentID"] . "</td>";
                        echo "<td>" . $col["Voornaam"] . "</td>";
                        echo "<td>" . $col["Achternaam"] . "</td>";
                        echo "<td>" . $col["Studierichting"] . "</td>";
                        echo "</tr>";
                    }
            }
            ?>
    </table>
</main>
</body>
<?php
    include "../includes/footer.php";
?>
</html>