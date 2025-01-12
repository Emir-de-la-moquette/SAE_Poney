<?php
    require "../static/script/modele.php";
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
                        getMoniteur();
                        ?>
                    <button >Ajouter un moniteur +</button>
                </div>
            </section>

            <section class="section">
                <div class="table-container">
                    <h2>Gestion adhérents</h2>
                    <?php
                    getAdherent();
                    ?>
                    <button>Ajouter un adhérent +</button>
                </div>
            </section>

            <section class="section">
                <div class="table-container">
                    <h2>Gestion poneys</h2>
                    <?php
                    getPoneys();
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
