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
    <?php
        $search = S
    ?>
</form>
<table border="1">
<?php

    $query = "SELECT * FROM studenten_dataset_kw1c";
    $resultQuery = ExecuteSelectQuery($query);


foreach ($resultQuery as $row) {
    echo "<tr>";

    echo "<td>" . $row["COL 1"] . "</td>";
    echo "<td>" . $row["COL 2"] . "</td>";
    echo "<td>" . $row["COL 3"] . "</td>";
    echo "<td>" . $row["COL 4"] . "</td>";
    echo "<td>" . $row["COL 5"] . "</td>";
    echo "<td>" . $row["COL 6"] . "</td>";
    echo "<td>" . $row["COL 7"] . "</td>";
    echo "<td>" . $row["COL 8"] . "</td>";
    echo "<td>" . $row["COL 9"] . "</td>";
    echo "<td>" . $row["COL 10"] . "</td>";
    echo "<td>" ."<a href='inlogpagina.php'>Verwijderen</a>" . "</td>";

    echo "</tr>";
}
?>
</table>
</body>
<?php
    include "../includes/footer.php";
?>
</html>
