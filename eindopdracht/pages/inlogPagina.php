<?php
//anthony verlouw
//13/09/2025
//inlogPagina.php
session_start();

require "../includes/db_functions.php";
StartConnection("users");

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = $_POST['email'];
    $password = $_POST['wachtwoord'];

    $queryLogin = "SELECT * FROM userdata WHERE email = '$email' AND PASSWORD = '$password'";
    $resultLogin = ExecuteSelectQuery($queryLogin);


        if ($resultLogin > 0)
        {
            $_SESSION['ingelogd'] = true;
            echo "je bent ingelogd";
        }
        else
        {
            echo "deze gebruiker bestaat niet";
        }

}
?>
<!doctype html>
<html lang="nl">
<?php
include "../includes/header.php";
?>
<body>
    <main class="login-container">
        <h1>Inloggen</h1>

        <form action="inlogPagina.php" method="post">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="wachtwoord">Wachtwoord</label>
            <input type="password" id="wachtwoord" name="wachtwoord" required>

            <input type="submit" value="Inloggen">
        </form>
    </main>
</body>
<?php
    include "../includes/footer.php";
?>
</html>
