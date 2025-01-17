<?php require_once "../static/script/modele.php" ;
    $info = getInfoSeance($_GET['id']);
    $participants = getParticipants($_GET['id']);
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/styles/home.css">
    <link rel="stylesheet" href="../static/styles/seance.css">
    <title>Document</title>
</head>
<body>
    <aside class="sidebar">
        <?php include "./navbar_admin.php" ?>
    </aside>
    <main>
        <div class="content">
            <h1> <?php echo $info['nomCours']; ?></h1>
            <h2> <?php echo $info['intitule']; ?></h2>
            <div>
                <h3> Encadrant : <?php echo $info['prenomPers']." ".$info['nomPers']; ?></h3>
                <div>
                <h3> Participant :</h3>
                    <ul>
                        <?php
                        foreach ($participants as $participant) {
                            echo "<li>".$participant['nom']." ".$participant['prenom']."</li>";
                        }
                        ?>
                    </ul>
                    <?php if(count($participants)==10){echo "<p>Le cours est complé</p>";}?>
                </div>
            </div>
            <?php if(count($participants)<=10){
                printf("<a href='/src/templates/reservation.php?id=%s'>Réserver</a>",$_GET['id']);
            }
            ?>
        </div>
    </main>
</body>
</html>
