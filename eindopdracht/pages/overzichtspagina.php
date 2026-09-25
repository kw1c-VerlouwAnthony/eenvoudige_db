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
        <tr>
            <th>
                StudentID
            </th>
            <th>
                Voornaam
            </th>
            <th>
                Achternaam
            </th>
            <th>
                Geboortedatum
            </th>
            <th>
                Geslacht
            </th>
            <th>
                Email
            </th>
            <th>
                Studierichting
            </th>
            <th>
                Startjaar
            </th>
            <th>
                HuidigJaar
            </th>
            <th>
                StudieStatus
            </th>
            <th>
                <a href="toevoegen_student.php">Toevoegen</a>
            </th>
        </tr>
        <?php

        $query = "SELECT * FROM studenten_dataset_kw1c ORDER BY `StudentID` ASC";
        $resultQuery = ExecuteSelectQuery($query);


    foreach ($resultQuery as $col) {
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
            echo "<td>" ."<a href='verwijder_student.php?studentID=$studentID'>Verwijderen</a>" . "</td>";

        echo "</tr>";
    }
    ?>
    </table>
</body>
<?php
    include "../includes/footer.php";
?>
</html>
