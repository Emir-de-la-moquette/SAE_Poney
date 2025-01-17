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
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    // Récupérer les informations de l'utilisateur via la fonction du modèle
    $user = getUserByID($id);
    if (!$user) {
        throw new Exception("Aucun utilisateur trouvé.");
    }
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}


// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['name'] ?? null;
    $prenom = $_POST['prenom'] ?? null;
    $email = $_POST['email'] ?? null;
    $mdp = $_POST['mdp'] ?? null;
    $NEWmdp = $_POST['NewMdp'] ?? null;
    $taille = $_POST['taille'] ?? null;
    $poids = $_POST['poids'] ?? null;
    $tele = $_POST['telephone'] ?? null;

    // Validation de base
    if ($mdp && $email) {
        if (is_null($NEWmdp) or $NEWmdp == ""){
            try {
                // Insérer les données dans la table "users"
                updateUtilisateur($email,$mdp,$nom,$prenom,$tele,$taille,$poids);

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
                    updateUtilisateur($email,$mdp,$nom,$prenom,$tele,$taille,$poids,$NEWmdp);
    
                } catch (Exception $e) {
                    echo 'Erreur : ' . $e->getMessage();
                } 
            }
        }
    } else {
        echo "<p></p>";
        echo '<script>   console.log(typeof showPopup); showPopup("Veuillez remplir tout les champs obligatoire !", false);   </script>';
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
                <label for="email">eMail *</label>
                <input type="email" id="username" name="email" readonly="readonly" value="<?php echo htmlspecialchars($user['mail']) ?? 'nullvalue'; ?>" required>
            </div>

            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['nomPers']) ?? 'nullvalue'; ?>" required>
            </div>

            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($user['prenomPers']) ?? 'nullvalue'; ?>" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe Actuel *</label>
                <input type="password" id="password" name="mdp" readonly="readonly" value="<?php echo htmlspecialchars($user['mdp']) ?? 'nullvalue'; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="NewPassword">Nouveau mot de passe</label>
                <input type="password" id="NewPassword" name="NewMdp">
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" id="telephone" name="telephone" value="<?php echo htmlspecialchars($user['tel']) ?? 'nullvalue'; ?>">
            </div>

            <div class="form-group">
                <label for="taille">Taille</label>
                <input type="number" id="taille" name="taille" value="<?php echo htmlspecialchars($user['taille']) ?? 'nullvalue'; ?>">
            </div>

            <div class="form-group">
                <label for="poids">Poids</label>
                <input type="number" id="poids" name="poids" value="<?php echo htmlspecialchars($user['poids']) ?? 'nullvalue'; ?>">
            </div>
            <?php
            if (isAdherentMail($user["mail"]) ){
                echo '<div class="form-group">';
                echo    '<label for="lvl">Niveau</label>';
                echo    '<select id="lvl" name="lvl">';
                echo        '<option value="1">debutant</option>';
                echo        '<option value="2">intermediaire</option>';
                echo        '<option value="3">experimenté</option>';
                echo    '</select>';
                echo '</div>';}
            ?>

            <div class="form-group" id="btnform">
                <button type="submit">Enregistrer</button>
            </div>
        </form>
    </main>
</body>
</html>
