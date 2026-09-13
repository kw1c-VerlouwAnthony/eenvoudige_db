<?php
//Anthony Verlouw
//01/09/2026
//IHOS25S3A
session_start();
$_SESSION["voornaam"] = "Jan";
$_SESSION["achternaam"] = "Jansen";
echo "Welkom " . $_SESSION["voornaam"];
?>
<!doctype html>
<html lang="en">
    <?php
        include "includes/header.php";
    ?>
<body>
    <form action="pages/result.php" method="post">
        Nuts status <input type="text" name="status"><br>
        <input type="submit">
    </form>
</body>
    <?php
        include "includes/footer.php";
    ?>
</html>
