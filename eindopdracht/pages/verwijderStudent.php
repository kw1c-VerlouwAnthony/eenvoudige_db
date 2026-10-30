<?php
//anthony verlouw
//22/09/2206
//verwijder pagina
session_start();
?>

<!doctype html>
<html lang="en">
<?php
// Hier wordt de header toegevoegd aan de pagina
include "../includes/header.php";
?>
<body>
<?php
    // Hier wordt het studentID opgehaald uit de URL
    $ID = $_GET["studentID"];

    // Hier worden de database functies ingeladen
    require "../includes/db_functions.php";

    // Verbinding maken met de database
    StartConnection("studenten_informatie_db");

    // Deze query verwijdert de student met het opgegeven studentID uit de database
    $queryDelete = "DELETE FROM `studenten_dataset_kw1c` WHERE studentID = '$ID'";

    // Hier wordt de delete query uitgevoerd
    $deleteResult = ExecuteQuery($queryDelete);

    // Het resultaat van de delete query wordt opgeslagen in rowsAffected
    // Dit geeft aan hoeveel rijen er zijn aangepast
    $rowsAffected = $deleteResult;

    // Controleren of er daadwerkelijk een student is verwijderd
    if ($rowsAffected > 0)
    {
        // Als er een student is verwijderd wordt dit bericht getoond
        echo "De studenten informatie is verwijderd!";
    }
    else
    {
        // Als er geen student is verwijderd wordt dit bericht getoond
        echo "De studenten informatie is niet verwijderd!";
    }

    // Controleren of er een studentID aanwezig is
    if (!isset($ID))
    {
        // Als er geen ID is wordt de gebruiker teruggestuurd naar de index pagina
        header("Location: ../index.php");

        // Hier wordt de rest van de code gestopt
        die();
    }
    ?>
</body>
</html>

