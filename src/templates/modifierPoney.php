<script src="../static/script/popup_valid.js"></script>

<?php

session_start();

// Chemin vers la base de données SQLite
$db_path = "../data/data.sqlite";

require_once "../static/script/modele.php"; // Inclure le fichier contenant les fonctions liées à MySQL

// Se connecter à la base de données
try {
    // Vérifier si l'utilisateur est connecté
    if (!isset($_GET['id'])) {
        throw new Exception("Utilisateur non connecté.");
    }
    $id = $_GET['id'];
    // Récupérer les informations de l'utilisateur via la fonction du modèle
    $user = getPoneyByNom($id);
    if (!$user) {
        throw new Exception("Aucun utilisateur trouvé.");
    }
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}


// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nomPoney = $_POST['name'] ?? null;
    $tailleMin = $_POST['taille'] ?? null;
    $PoidsMax = $_POST['poids'] ?? null;

    // Validation de base
    if (is_null($NEWmdp) or $NEWmdp == ""){
        try {
            // Insérer les données dans la table "users"
            updatePoney($nomPoney,$tailleMin,$PoidsMax);

            echo "<p></p>";
            echo '<script>   console.log(typeof showPopup); showPopup("données enregistrer avec succès !", true);   </script>';
            $_SESSION["name"] = $nom;
            $_SESSION["prenom"] = $prenom;
            $_SESSION["telephone"] = $tele;
            $_SESSION["taille"] = $taille;
            $_SESSION["poids"] = $poids;
            header("./setting.php");

        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
    else {
        if ($NEWmdp == $mdp) {
            echo "<p></p>";
            echo '<script>   console.log(typeof showPopup); showPopup("Merci de mettre un mot de passe different !", false);   </script>';
        }
        else{
            try {
                // Insérer les données dans la table "users"
                updatePoney($nomPoney,$tailleMin,$PoidsMax);

            } catch (Exception $e) {
                echo 'Erreur : ' . $e->getMessage();
            } 
        }
    }
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/styles/settings.css">
    <link rel="stylesheet" href="../static/styles/popup_valid.css">
    <title>Paramètres</title>
</head>
<body>

    <aside class="sidebar">
            <?php include "./navbar_admin.php" ?>
        </aside>
    <main class="login-container">
        <form id="loginForm" method="POST">
            <h1>Modifier vos informations</h1>


            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" readonly="readonly" value="<?php echo htmlspecialchars($user['nomPoney']) ?? 'nullvalue'; ?>">
            </div>

            <div class="form-group">
                <label for="taille">Taille minimalle</label>
                <input type="number" id="taille" name="taille" value="<?php echo htmlspecialchars($user['tailleMin']) ?? 'nullvalue'; ?>">
            </div>

            <div class="form-group">
                <label for="poids">Poids maximal</label>
                <input type="number" id="poids" name="poids" value="<?php echo htmlspecialchars($user['poidsMax']) ?? 'nullvalue'; ?>">
            </div>
            
            <div class="form-group" id="btnform">
                <button type="submit">Enregistrer</button>
            </div>
        </form>
    </main>
</body>
</html>
