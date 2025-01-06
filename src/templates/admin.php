<?php
    $dsn = "mysql:dbname="."DBchaloine".";host="."servinfo-maria";
    try{
        $connexion = new PDO($dsn, "chaloine", "chaloine");
    }
    catch(PDOException $e){
        printf("Error connecting to database: %s", $e->getMessage());
        exit();
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des ressources internes</title>
    <link rel="stylesheet" href="../static/styles/admin.css">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="logo">
                <img src="../static/images/logo-pony.png" alt="Logo">
            </div>
            <div class="admin-info">
                <h2>ADMIN</h2>
                <p>Jeanne Huller</p>
            </div>
            <nav>
                <ul>
                    <a href=''><li>Gestionnaire</li></a>
                    <a href='../static/script/logout.php'><li>Plannings</li></a>
                    <a href='../static/script/logout.php'><li>Paramètres</li></a>
                    <a href='../static/script/logout.php'><li class="logout">Déconnexion</li></a>
                </ul>
            </nav>
        </aside>
        <main>
            <div class="titreAdmin"><h1>Gestion des ressources internes</h1></div>
            
            <section class="section">
                <div class="table-container">
                    <h2>Gestion moniteurs</h2>
                        <?php
                        $sql = "SELECT * FROM PERSONNE NATURAL JOIN ENCADRANT where idPers = idEnc order by nomPers";
                        if (!$connexion->query($sql)){
                            echo "Error: %s\n";
                        }
                        else{
                            $result = $connexion->query($sql);
                            echo "<table border='1'>";
                            echo "<tr><th>Nom</th><th>Prénom</th></tr>";
                            foreach($result as $row){
                                echo "<tr>";
                                echo "<td>".$row['nomPers']."</td>";
                                echo "<td>".$row['prenomPers']."</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        }
                        ?>
                    <button>Ajouter un moniteur +</button>
                </div>
            </section>

            <section class="section">
                <div class="table-container">
                    <h2>Gestion adhérents</h2>
                    <?php
                    $sql = "SELECT * FROM PERSONNE NATURAL JOIN CLIENT where idPers = idCli order by nomPers";
                    if (!$connexion->query($sql)){
                        echo "Error: %s\n";
                    }
                    else{
                        $result = $connexion->query($sql);
                        echo "<table border='1'>";
                        echo "<tr><th>Nom</th><th>Prénom</th><th>Tel</th><th>Mail</th><th>Taille</th><th>Poids</th></tr>";
                        foreach($result as $row){
                            echo "<tr>";
                            echo "<td>".$row['nomPers']."</td>";
                            echo "<td>".$row['prenomPers']."</td>";
                            echo "<td>".$row['tel']."</td>";
                            echo "<td>".$row['mail']."</td>";
                            echo "<td>".$row['taille']."</td>";
                            echo "<td>".$row['poids']."</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                    ?>
                    <button>Ajouter un adhérent +</button>
                </div>
            </section>

            <section class="section">
                <div class="table-container">
                    <h2>Gestion poneys</h2>
                    <?php
                    $sql = "SELECT * FROM PONEY order by nomRace";
                    if (!$connexion->query($sql)){
                        echo "Error: %s\n";
                    }
                    else{
                        $result = $connexion->query($sql);
                        echo "<table border='1'>";
                        echo "<tr><th>Race</th><th>Nom</th><th>Poids maximal</th><th>Taille Mininimale</th></tr>";
                        foreach($result as $row){
                            echo "<tr>";
                            echo "<td>".$row['nomRace']."</td>";
                            echo "<td>".$row['nomPoney']."</td>";
                            echo "<td>".$row['poidsMax']."</td>";
                            echo "<td>".$row['tailleMin']."</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                    ?>
                    <button>Ajouter un poney +</button>
                </div>
            </section>
        </main>
    </div>
    <?php
        include('footer.php');
    ?>
</body>
</html>
