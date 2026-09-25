<?php
//anthony verlouw
//14/09/2026
//functions.php

function LoginCheck()
{
    if (!isset($_SESSION['ingelogd'])) {
        header("Location: index.php");
        exit();
    }
}


function verwijderStudent()
{
    $ID = $_GET["studentID"];
    $query = "DELETE FROM studenten_dataset_kw1c WHERE studentID = '$ID'";
}
