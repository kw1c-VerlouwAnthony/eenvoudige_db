<?php
session_start();
session_destroy();
header('Location: inlogPagina.php');
exit;