<?php
//Anthony Verlouw
//01/09/2026
//IHOS25S3A
session_start();
?>

<!doctype html>
<html lang="en">
<?php
// Hier wordt de header toegevoegd aan de pagina
include "includes/header.php";
?>
<body>
<main class="homepage">
    <!-- Dit is de hoofdtitel van de homepagina -->
    <h1>
        Welkom bij het Studenten Database Info
    </h1>
    <!-- Titel van het onderdeel over het studentenoverzicht -->
    <h2>
        Studentenoverzicht
    </h2>
    <!-- Korte uitleg over welke studentgegevens bekeken kunnen worden -->
    <p>
        Bekijk studentgegevens, waaronder namen, geboortedatums, studierichtingen en studiejaren.
    </p>
    <!-- Met deze link kan de gebruiker naar de overzichtspagina gaan -->
    <a href="pages/overzichtsPagina.php" class="button">
        Naar overzicht
    </a>
    <!-- Titel van het onderdeel over het beheren van studentgegevens -->
    <h2>
        Studentgegevens beheren
    </h2>
    <!-- Hier wordt uitgelegd dat inloggen nodig is om studentgegevens te beheren -->
    <p>
        Log in om studentgegevens toe te voegen, te bewerken of te verwijderen.
    </p>
    <!-- Met deze link kan de gebruiker naar de inlogpagina gaan -->
    <a href="pages/inlogPagina.php" class="button">
        Inloggen
    </a>
</main>
<?php
// Hier wordt de footer onderaan de pagina toegevoegd
include "includes/footer.php";
?>
</body>
</html>
