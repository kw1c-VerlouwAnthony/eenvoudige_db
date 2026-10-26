<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/eenvoudige_db/eindopdracht/styles/stylesheet.css">
    <title>Document</title>
</head>
<ul>
    <li><a href="/eenvoudige_db/eindopdracht/index.php">Home</a> </li>
    <li><a href="/eenvoudige_db/eindopdracht/pages/overzichtspagina.php">Overzicht</a></li>
    <?php

    if (!isset($_SESSION['ingelogd']))
    {
        echo "<li>" . "<a href='/eenvoudige_db/eindopdracht/pages/inlogPagina.php'>" . "Login" . "</a>" . "</li>";
    }
    else
    {
        echo "<li>" . "<a href='/eenvoudige_db/eindopdracht/pages/logoutPagina.php'>" . "Logout" . "</a>" . "</li>";
    }
    ?>
</ul>
