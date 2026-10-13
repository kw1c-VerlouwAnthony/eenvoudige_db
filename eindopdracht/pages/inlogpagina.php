<?php
//anthony verlouw
//13/09/2025
//inlogpagina.php
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
<form action="inlogpagina.php" method="post">
    Email <input type="text" id="email" name="email"><br>
    Wachtwoord <input type="text" id="wachtwoord" name="wachtwoord"><br>
    <input type="submit">
</form>
</body>
<?php
    include "../includes/footer.php";
?>
</html>
