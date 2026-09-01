<?php
/*
 * Anthony Verlouw
 * 27-8-2026
 * eerste php bestand
 */

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/stylesheet.css">
    <title>Document</title>
</head>
<body>
<!--    laden van de code uit header.php-->
    <?php
        include "includes/header.php";
        include "includes/functions.php";
        ShowName("anthony");
        echo CalculateMonths(20, 100);
    ?>
    <main>
        <?php
        echo "<h1>hello world</h1>";

        echo "<p>test</p>";

        //variabele
        $schoolName = "KW1C";

        echo "mijn school is $schoolName";

        echo 6*6;
        ?>
    </main>
</body>
</html>

