<script src="../static/script/popup_valid.js"></script>

<?php
// Fichier : register.php
session_start();

// Chemin vers la base de données SQLite
$db_path = "../data/data.sqlite";

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['name'] ?? null;
    $prenom = $_POST['prenom'] ?? null;
    $email = $_POST['email'] ?? null;
    $mdp = $_POST['password'] ?? null;
    $taille = $_POST['taille'] ?? null;
    $poids = $_POST['poids'] ?? null;
    $tele = $_POST['telephone'] ?? null;

    // Validation de base
    if ($nom && $prenom && $email && $mdp) {
        try {
            // Se connecter à la base de données
            $pdo = new PDO("sqlite:$db_path");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Vérifier si l'utilisateur existe déjà
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $userExists = $stmt->fetchColumn();

            if ($userExists) {
                echo '<script>showPopup("Cet email est déjà utilisé.", false);</script>';
            } else {
                // Insérer les données dans la table "users"
                $stmt = $pdo->prepare('INSERT INTO users (name, prenom, email, mdp, taille, poids, telephone, role) 
                                       VALUES (:name, :prenom, :email, :password, :taille, :poids, :telephone, :role)');
                $stmt->bindParam(':name', $nom);
                $stmt->bindParam(':prenom', $prenom);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $mdp);
                $stmt->bindParam(':taille', $taille);
                $stmt->bindParam(':poids', $poids);
                $stmt->bindParam(':telephone', $tele);
                $stmt->bindParam(':telephone', "C");
                $stmt->execute();

                echo '<script>showPopup("Inscription réussie !", true);</script>';
                header("Location: login.php");
                exit();
            }
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    } else {
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
    <title>Inscription</title>
</head>
<body>
    <main class="login-container">
        <form id="registerForm" method="POST">
            <h1>Inscription</h1>

            <div class="form-group">
                <label for="name">Nom *</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="prenom">Prénom *</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>

            <div class="form-group">
                <label for="email">eMail *</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe *</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" id="telephone" name="telephone">
            </div>

            <div class="form-group">
                <label for="taille">Taille (cm)</label>
                <input type="number" id="taille" name="taille">
            </div>

            <div class="form-group">
                <label for="poids">Poids (kg)</label>
                <input type="number" id="poids" name="poids">
            </div>

            <div class="form-group" id="btnform">
                <button type="submit">S'inscrire</button>
            </div>
        </form>
    </main>
</body>
</html>
