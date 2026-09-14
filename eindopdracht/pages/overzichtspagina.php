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
    require "../includes/database.php";
    $sql = "SELECT * FROM studenten_dataset_kw1c";
    $result = $connection->query($sql);

    foreach ($result as $student) {
        echo $student["COL 2"] . " " . $student["COL 3"] . "<br>";
    }
?>
</body>
<?php
    include "../includes/footer.php";
?>
</html>
