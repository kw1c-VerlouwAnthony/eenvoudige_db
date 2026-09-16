<?php
/*
 * Author: Remco Evers
 * Date: 7-9-26
 * Homepage Pokedex
 */

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Pokedex</title>
    </head>
    <body>
        <header>
            <h1>Overzicht Pokemons</h1>
        </header>
        <main>
            <!-- Alle pokemons worden hier ingeladen -->
            <?php
                include "includes/db_functions.php";

                //Verbinden met de database pokemon
                StartConnection("pokemondb");

                $query = "SELECT * FROM pokemon;";

                $results = ExecuteSelectQuery($query);

                //var_dump($results);

                foreach($results as $pokemon)
                {
                    echo $pokemon["name"];
                    echo $pokemon["picture"];
                    echo "<br><br>";
                }










            ?>

        </main>

    </body>
</html>


