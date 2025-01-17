<script src="../static/script/popup_valid.js"></script>

<?php

session_start();

require_once "../static/script/modele.php";


try {
    if (!isset($_SESSION['user']) || !isset($_SESSION['pswrd'])) {
        throw new Exception("Utilisateur non connecté.");
    }

    $user = getUtilisateur($_SESSION['user'], $_SESSION['pswrd']);
    if (!$user) {
        throw new Exception("Aucun utilisateur trouvé.");
    }
} catch (Exception $e) {
    header("Location: home.php");
}

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['name'] ?? null;
    $prenom = $_POST['prenom'] ?? null;
    $email = $_POST['email'] ?? null;
    $mdp_actuel = $_POST['mdp'] ?? null;
    $mdp_nouveau = $_POST['NewMdp'] ?? null;
    $taille = $_POST['taille'] ?? null;
    $poids = $_POST['poids'] ?? null;
    $telephone = $_POST['telephone'] ?? null;
    $niveau = $_POST['lvl'] ?? null;

    if ($mdp_actuel && $email) {
        if (is_null($mdp_nouveau) || $mdp_nouveau === "") {
            try {
                updateUtilisateur($email, $mdp_actuel, $nom, $prenom, $telephone, $taille, $poids, null);
                if ($niveau != getLvl($email)){assignerNiveau(utilisateurExistant($email, $mdp_actuel), $niveau, date('Y-m-d H:i:s'));}
                
                echo '<p></p>';
                echo '<script>showPopup("Données enregistrées avec succès !", true);</script>';
            } catch (Exception $e) {
                echo '<p></p>';
                echo '<script>showPopup("Erreur lors de la mise à jour des données.", false);</script>';
            }
        } else {
            if ($mdp_actuel === $mdp_nouveau) {
                echo '<p></p>';
                echo '<script>showPopup("Veuillez choisir un mot de passe différent.", false);</script>';
            } else {
                try {
                    updateUtilisateur($email, $mdp_actuel, $nom, $prenom, $telephone, $taille, $poids, $mdp_nouveau);
                    if ($niveau != getLvl($email)){assignerNiveau(utilisateurExistant($email, $mdp_actuel), $niveau, date('Y-m-d H:i:s'));}
                    $_SESSION['pswrd'] = $mdp_nouveau;
                    echo '<p></p>';
                    echo '<script>showPopup("Données enregistrées avec succès !", true);</script>';
                } catch (Exception $e) {
                    echo '<p></p>';
                    echo '<script>showPopup("Erreur lors de la mise à jour des données.", false);</script>';
                }
            }
        }
    } else {
        echo '<p></p>';
        echo '<script>showPopup("Veuillez remplir tous les champs obligatoires.", false);</script>';
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
        <?php include "./navbar_admin.php"; ?>
    </aside>

    <main class="login-container">
        <form id="loginForm" method="POST">
            <h1>Modifier vos informations</h1>

            <div class="form-group">
                <label for="email">eMail *</label>
                <input type="email" id="username" name="email" readonly value="<?php echo htmlspecialchars($user['mail']); ?>" required>
            </div>

            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['nomPers']); ?>" required>
            </div>

            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($user['prenomPers']); ?>" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe actuel *</label>
                <input type="password" id="password" name="mdp" required>
            </div>
            
            <div class="form-group">
                <label for="NewPassword">Nouveau mot de passe</label>
                <input type="password" id="NewPassword" name="NewMdp">
            </div>

            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" id="telephone" name="telephone" value="<?php echo htmlspecialchars($user['tel']); ?>">
            </div>

            <div class="form-group">
                <label for="taille">Taille</label>
                <input type="number" id="taille" name="taille" value="<?php echo htmlspecialchars($user['taille']); ?>">
            </div>

            <div class="form-group">
                <label for="poids">Poids</label>
                <input type="number" id="poids" name="poids" value="<?php echo htmlspecialchars($user['poids']); ?>">
            </div>

            <?php if (isAdherent($user['mail'], $_SESSION['pswrd'])): ?>
                <div class="form-group">
                    <label for="lvl">Nouveau niveau atteint ?</label>
                    <select id="lvl" name="lvl">
                        <option value="1" <?php echo getLvl($user['idPers']) == 1 ? 'selected' : ''; ?>>Débutant</option>
                        <option value="2" <?php echo getLvl($user['idPers']) == 2 ? 'selected' : ''; ?>>Intermédiaire</option>
                        <option value="3" <?php echo getLvl($user['idPers']) == 3 ? 'selected' : ''; ?>>Expérimenté</option>
                    </select>
                </div>
            <?php endif; ?>

            <div class="form-group" id="btnform">
                <button type="submit">Enregistrer</button>
            </div>
        </form>
    </main>

</body>
</html>
