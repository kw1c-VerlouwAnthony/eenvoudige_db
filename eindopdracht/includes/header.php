<head>
    <!-- Hier wordt aangegeven welke tekenset de website gebruikt -->
    <meta charset="UTF-8">
    <!-- Hiermee wordt de website goed weergegeven op verschillende schermformaten, zoals telefoons en computers -->
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- Hiermee wordt het CSS bestand ingeladen voor de opmaak van de website -->
    <link rel="stylesheet" href="/eenvoudige_db/eindopdracht/styles/stylesheet.css">
    <!-- Dit is de titel die bovenaan het browsertabblad wordt weergegeven -->
    <title>Document</title>
</head>

<!-- Dit is het navigatiemenu van de website -->
<ul>
    <!-- Met deze link kan de gebruiker naar de homepagina gaan -->
    <li><a href="/eenvoudige_db/eindopdracht/index.php">Home</a> </li>
    <!-- Met deze link kan de gebruiker naar de overzichtspagina gaan -->
    <li><a href="/eenvoudige_db/eindopdracht/pages/overzichtsPagina.php">Overzicht</a></li>
    <?php
    // Controleren of de gebruiker niet is ingelogd
    if (!isset($_SESSION['ingelogd']))
    {
        // Als de gebruiker niet is ingelogd wordt de login link getoond
        echo "<li>" . "<a href='/eenvoudige_db/eindopdracht/pages/inlogPagina.php'>" . "Login" . "</a>" . "</li>";
    }
    else
    {
        // Als de gebruiker wel is ingelogd wordt de logout link getoond
        echo "<li>" . "<a href='/eenvoudige_db/eindopdracht/pages/logoutPagina.php'>" . "Logout" . "</a>" . "</li>";
    }
    ?>
</ul>
