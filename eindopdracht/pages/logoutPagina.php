
<?php
// maakt sessie aan
session_start();
// verneitigd sessie
session_destroy();
// De gebruiker wordt teruggestuurd naar de inlogpagina
header('Location: inlogPagina.php');
// Hiermee wordt de rest van de code gestopt
exit;
?>