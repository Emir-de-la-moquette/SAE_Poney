<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/styles/home.css">
    <title>Document</title>
</head>
<body>
    <aside class="sidebar">
        <?php include "./navbar_admin.php" ?>
    </aside>
    <main>
        <div class="content">
            <h1> Cours : <?php ?></h1>
            <h2> Séance de <?php ?></h2>
            <div>
                <h3> Encadrant : <?php ?></h3>
                <div>
                <h3> Participant :</h3>
                    <ul>
                        <?php
                        $lesPersonnes = [['mail'=>'','nom'=>'Richard','prenom'=>'Baptiste']];
                        foreach ($lesPersonnes as $personne) {
                            echo "<li>".$personne['nom']." ".$personne['prenom']."</li>";
                        }
                        ?>
                    </ul>
                    <?php if(count($lesPersonnes)==10){echo "<p>Le cours est complé</p>";}?>
                </div>
            </div>
            <?php if(count($lesPersonnes)<10 && !in_array($lesPersonnes,$_SESSION['user'])){
                echo "<a href='/src/templates/reservation.php?id=%s'>Réserver</a>";
            }
            ?>
        </div>
    </main>
</body>
</html>
