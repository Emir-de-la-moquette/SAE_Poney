<?php
// Fichier : pages/home.php
include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="../static/styles/home.css">
    <link rel="stylesheet" href="../static/styles/acceuil.css">
</head>
<body>
    <header></header>

    <div class="contenu-principal">
        <section class="hero">
            <img src="../static/images/poney1.jpg" alt="Panorama du club équestre" class="hero-image">
            <div class="hero-text">
                <h1>Bienvenue au Club Équestre Grand Galop</h1>
                <p>Plongez au cœur de la Sologne et découvrez notre passion pour les chevaux. Que vous soyez cavalier débutant ou confirmé, notre équipe vous accueille dans un cadre idyllique pour vivre des moments inoubliables.</p>
            </div>
        </section>

        <section class="about">
            <h2>Qui sommes-nous ?</h2>
            <p>Le club équestre Grand Galop est une institution familiale située au cœur de la Sologne. Avec plus de 20 ans d'expérience, nous proposons des activités adaptées à tous les âges et niveaux, dans une ambiance conviviale et chaleureuse.</p>
            <img src="../static/images/noequestrians.png" alt="Cheval au galop" class="about-image">
        </section>

        <section class="activities">
            <h2>Nos activités</h2>
            <div class="activities-list">
                <article class="activity">
                    <img src="../static/images/noequestrians.png" alt="Balade en forêt" class="activity-image">
                    <h3>Balades en forêt</h3>
                    <p>Explorez les magnifiques sentiers de la Sologne à cheval. Une expérience unique pour se reconnecter à la nature.</p>
                </article>
                <article class="activity">
                    <img src="../static/images/noequestrians.png" alt="Cours d'équitation" class="activity-image">
                    <h3>Cours d'équitation</h3>
                    <p>Apprenez ou perfectionnez vos compétences équestres avec nos moniteurs expérimentés.</p>
                </article>
                <article class="activity">
                    <img src="../static/images/noequestrians.png" alt="Stage pour enfants" class="activity-image">
                    <h3>Stages pour enfants</h3>
                    <p>Initiez vos enfants à l'équitation avec nos stages adaptés, alliant apprentissage et amusement.</p>
                </article>
            </div>
        </section>
    </div>

    <?php
        include('footer.php');
    ?>

    <script src="../static/scripts/language.js"></script>
    <script src="../static/scripts/accessibility.js"></script>
</body>
</html>
