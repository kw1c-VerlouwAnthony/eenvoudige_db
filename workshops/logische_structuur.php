
<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        echo "nuts";

        //3 variabele naam, leeftijd, ben ik student ja of nee

        $name = "Anthony";
        $age = 20;
        $student = true;
        $drivingAge = 18;
        //volle zin var
        echo "Ik ben $name, ik ben $age jaar oud en ik ben een $student.";
        $hasLiscence = false;

        //maak een check die controleert 18 jaar of ouder bent. ik mag auto rijden en anders ik mag geen autorijden

    if ($age >= $drivingAge and $hasLiscence == true)
        {
            echo "ik mag autorijden en ben 20";
        }
    elseif($age >= $drivingAge && $hasLiscence == false)
    {
        echo "ik mag geen autorijen en ben 20";
    }
        else
        {
            echo "ik mag geen autorijden en ben 20";
        }
    ?>
</body>
</html>
