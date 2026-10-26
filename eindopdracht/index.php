<?php
//Anthony Verlouw
//01/09/2026
//IHOS25S3A
session_start();
?>
<!DOCTYPE html> <html lang="nl">
<?php
include "includes/header.php";
?>
<body>

<main class="homepage">

    <section class="welcome"> <h1>Welkom bij het Studenten Informatie Systeem</h1>

        <p> Op deze website kun je studentgegevens bekijken en beheren. </p>

        <a href="pages/overzichtsPagina.php" class="button"> Bekijk studenten </a> </section>

    <section class="homepage-content">

        <article class="home-card"> <h2>Studentenoverzicht</h2>

            <p> Bekijk studentgegevens, waaronder namen, geboortedatums, studierichtingen en studiejaren. </p>

            <a href="pages/overzichtsPagina.php" class="button"> Naar overzicht </a> </article>

        <article class="home-card"> <h2>Studentgegevens beheren</h2>

            <p> Log in om studentgegevens toe te voegen, te bewerken of te verwijderen. </p>

            <a href="pages/inlogPagina.php" class="button"> Inloggen </a> </article>

    </section>

</main>

<?php
include "includes/footer.php";
?>

</body> </html>
