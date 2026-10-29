<?php
//anthony verlouw
//21/09/2026
//bewerkpagina

session_start();
?>
<!doctype html>
<html lang="en">
<?php

    include "../includes/header.php";

?>
<body>
<h1>
    Studenten update
</h1>
<?php
$ID = $_GET["studentID"];

require "../includes/db_functions.php";

StartConnection("studenten_informatie_db");

//deze if statement checkt of iemand de submit button klikt op de forum and
if (isset($_POST['Submit']))
{
    $newVoornaam = $_POST['voornaam'];
    $newAchternaam = $_POST['achternaam'];
    $newGeboortedatum = $_POST['geboortedatum'];
    $newGeslacht = $_POST['geslacht'];
    $newEmail = $_POST['email'];
    $newStudieRichting = $_POST['studierichting'];
    $newStartjaar = $_POST['startjaar'];
    $newHuidigjaar = $_POST['huidigjaar'];
    $newStudieStatus = $_POST['studiestatus'];

    $queryUpdate = "UPDATE studenten_dataset_kw1c SET `Voornaam` = '$newVoornaam', `Achternaam` = '$newAchternaam', `Geboortedatum` = '$newGeboortedatum', `Geslacht` = '$newGeslacht', `Email` = '$newEmail',`Studierichting` = '$newStudieRichting', `Startjaar` = '$newStartjaar' ,`HuidigJaar` = '$newHuidigjaar', `StudieStatus` = '$newStudieStatus' WHERE `studentID` = '$ID' ";

    ExecuteQuery($queryUpdate);

}

$query = "SELECT * FROM studenten_dataset_kw1c WHERE studentID = '$ID'";
$result = ExecuteSelectQuery($query);

foreach ($result as $col) {

    $studentID = $col['StudentID'];
    $voornaam = $col['Voornaam'];
    $achternaam = $col['Achternaam'];
    $geboortedatum = $col['Geboortedatum'];
    $geslacht = $col['Geslacht'];
    $email = $col['Email'];
    $studieRichting = $col['Studierichting'];
    $startjaar = $col['Startjaar'];
    $huidigjaar = $col['HuidigJaar'];
    $studieStatus = $col['StudieStatus'];
}

if (!isset($ID))
{
    header("Location: ../index.php");
    die();
}
?>

<form method="POST" action="bewerkStudent.php?studentID=<?php echo $ID;?>">
    <p>
        <label for="studentId">Student ID</label>
        <input id="studentId" name="studentid" type="text" value="<?php echo $studentID; ?>" readonly>
    </p>
    <p>
        <label for="Voornaam">Voornaam</label>
        <input id="Voornaam" name="voornaam" type="text" value="<?php echo $voornaam; ?>">
    </p>
    <p>
        <label for="Achternaam">Achternaam</label>
        <input id="Achternaam" name="achternaam" type="text" value="<?php echo $achternaam; ?>">
    </p>
    <p>
        <label for="Geboortedatum">Geboortedatum</label>
        <input id="Geboortedatum" name="geboortedatum" type="date" value="<?php echo $geboortedatum; ?>">
    </p>
    <p>
        <label for="Geslacht">Geslacht</label>
        <input id="Geslacht" name="geslacht" type="text" value="<?php echo $geslacht; ?>">
    </p>
    <p>
        <label for="Email">e-mail</label>
        <input id="Email" name="email" type="text" value="<?php echo $email; ?>">
    </p>
    <p>
        <label for="Studierichting">Studie richting</label>
        <select id="Studierichting" name="studierichting">
            <?php
            $queryStudie = "SELECT DISTINCT `Studierichting` FROM studenten_dataset_kw1c;";
            $resultStudie = ExecuteSelectQuery($queryStudie);

            foreach ($resultStudie as $option)
            {
                $richting = $option['Studierichting'];

                if ($richting == $studieRichting)
                {
                    $selected = "selected";
                }
                else
                {
                    $selected = "";
                }

                echo "<option value=\"$richting\" $selected>$richting</option>";
            }
            ?>
        </select>
    </p>
    <p>
        <label for="Startjaar">Start jaar</label>
        <input id="Startjaar" name="startjaar" type="text" value="<?php echo $startjaar; ?>">
    </p>
    <p>
        <label for="Huidigjaar">Huidig jaar</label>
        <input id="Huidigjaar" name="huidigjaar" type="text" value="<?php echo $huidigjaar; ?>">
    </p>
    <p>
        <label for="Studiestatus">Studie status</label>
        <select id="Studiestatus" name="studiestatus">
            <?php
            $queryStudie = "SELECT DISTINCT `StudieStatus`FROM studenten_dataset_kw1c";
            $resultStudie = ExecuteSelectQuery($queryStudie);

            foreach ($resultStudie as $option)
            {
                $status = $option['StudieStatus'];

                if ($status == $studieStatus)
                {
                    $selected = "selected";
                }
                else
                {
                    $selected = "";
                }

                echo "<option value=\"$status\" $selected>$status</option>";
            }
            ?>
        </select>
    </p>
    <input type="submit" name="Submit">
</form>
</body>
</html>

