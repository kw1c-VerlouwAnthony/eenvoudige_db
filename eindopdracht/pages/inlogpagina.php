<?php
//anthony verlouw
//13/09/2025
//inlogpagina.php
session_start();
?>
<!doctype html>
<html lang="nl">
<?php
include "../includes/header.php";
?>
<body>
<form action="" method="post">
    Gebruikersnaam <input type="text" id="gebruikersnaam" name="gebruikersnaam"><br>
    Wachtwoord <input type="text" id="wachtwoord" name="wachtwoord"><br>
    <input type="submit">
</form>
</body>
<?php
include "../includes/footer.php";
?>
</html>
