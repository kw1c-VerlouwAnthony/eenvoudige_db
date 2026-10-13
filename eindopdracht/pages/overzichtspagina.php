<?php
//anthony verlouw
//14/09/2026
//overzichtspagina.php
session_start();
?>
<!doctype html>
<html lang="en">
<?php
    include "../includes/header.php";
?>
<body>
<?php
    require "../includes/db_functions.php";
    StartConnection("studenten_informatie_db");
?>
<form action="" method="get">
</form>
    <table border="1">
        <?php

        $query = "SELECT * FROM studenten_dataset_kw1c ORDER BY `StudentID` ASC";
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
            echo "<td>" . "<a href='toevoegen_student.php'>" . "Toevoegen" . "</a>" . "</td>";
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
                echo "<td>" . "<a href='bewerk_student.php?studentID=$studentID'>Bewerken</a>" . "</td>";
                echo "<td>" . "<a href='verwijder_student.php?studentID=$studentID'>Verwijderen</a>" . "</td>";

                echo "</tr>";
            }
        }
        else
        {
            echo "<tr>";
            echo "<td>" . "StudentID" . "</td>";
            echo "<td>" . "Voornaam" . "</td>";
            echo "<td>" . "Achternaam" . "</td>";
            echo "</tr>";
                foreach ($resultQuery as $col)
                {
                    echo "<tr>";

                    $studentID = $col['StudentID'];
                    $voornaam = $col['Voornaam'];
                    $achternaam = $col['Achternaam'];


                    echo "<td>" . $col["StudentID"] . "</td>";
                    echo "<td>" . $col["Voornaam"] . "</td>";
                    echo "<td>" . $col["Achternaam"] . "</td>";
                    echo "</tr>";
                }
        }
        ?>
    </table>
</body>
<?php
    include "../includes/footer.php";
?>
</html>