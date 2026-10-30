<?php
//anthony verlouw
//13/09/2025
//inlogPagina.php
session_start();

    // Hier worden de database functies ingeladen
    require "../includes/db_functions.php";

    // Verbinding maken met de database users
    StartConnection("users");

    // Controleren of de pagina gegevens heeft ontvangen via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // Hier worden het ingevulde e-mailadres en wachtwoord opgehaald
        $email = $_POST['email'];
        $password = $_POST['wachtwoord'];

        // Deze query controleert of het e-mailadres en wachtwoord in de database staan
        $queryLogin = "SELECT * FROM userdata WHERE email = '$email' AND PASSWORD = '$password'";

        // De query uitvoeren en het resultaat opslaan
        $resultLogin = ExecuteSelectQuery($queryLogin);

        // Controleren of er een resultaat is gevonden in de database
        if (isset($resultLogin[0]))
        {
            // Als er een resultaat is gevonden wordt de gebruiker ingelogd
            // De sessie wordt op true gezet zodat de website weet dat de gebruiker is ingelogd
            $_SESSION['ingelogd'] = true;

            // Bericht laten zien dat de gebruiker is ingelogd
            echo "Je bent ingelogd";
        }
        else
        {
            // Als er geen resultaat is gevonden zijn het e-mailadres of wachtwoord verkeerd
            echo "Onjuist e-mailadres of wachtwoord";
        }

    }
?>

<!doctype html>
<html lang="nl">
    <?php
        // Hier wordt de header toegevoegd aan de pagina
        include "../includes/header.php";
    ?>
<body>
    <main class="login-container">
        <h1>Inloggen</h1>

        <!-- Dit formulier wordt gebruikt om in te loggen -->
        <form action="inlogPagina.php" method="post">

            <!-- Hier kan de gebruiker zijn e-mailadres invullen -->
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <!-- Hier kan de gebruiker zijn wachtwoord invullen -->
            <label for="wachtwoord">Wachtwoord</label>
            <input type="password" id="wachtwoord" name="wachtwoord" required>

            <!-- Met deze knop worden de ingevulde gegevens verstuurd -->
            <input type="submit" value="Inloggen">
        </form>
    </main>
</body>
    <?php
        // Hier wordt de footer toegevoegd aan de pagina
        include "../includes/footer.php";
    ?>
</html>

