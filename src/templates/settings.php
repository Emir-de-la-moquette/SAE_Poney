<?php

session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === false) {
    header("Location: admin.php");
    exit();
}

// Chemin vers la base de données SQLite
$db_path = "../data/data.sqlite";

// Se connecter à la base de données
try {

    $pdo = new PDO("sqlite:$db_path");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer un utilisateur (par exemple, le premier utilisateur)
    $query = "SELECT * FROM users WHERE email=\"".$_SESSION["user"]."\" and mdp=\"".$_SESSION["pswrd"]."\"";
    $stmt = $pdo->query($query);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérification de l'utilisateur
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

    // Validation de base
    if ($nom && $email) {
        try {
            // Insérer les données dans la table "users"
            $stmt = $pdo->prepare('UPDATE users SET name=:name, prenom=:prenom WHERE email=:email AND mdp=:mdp');
            $stmt->bindParam(':name', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':mdp', $mdp);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            
            echo "Informations enregistrées avec succès !";
            header("./setting.php");

        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/styles/settings.css">
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
                <label for="email">Mail</label>
                <input type="text" id="username" name="email" value="<?php echo htmlspecialchars($user['email']) ?? 'nullvalue'; ?>" required>
            </div>

            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']) ?? 'nullvalue'; ?>" required>
            </div>

            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($user['prenom']) ?? 'nullvalue'; ?>" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe Actuel</label>
                <input type="password" id="password" name="mdp" value="<?php echo htmlspecialchars($user['mdp']) ?? 'nullvalue'; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="NewPassword">Nouveau mot de passe</label>
                <input type="password" id="NewPassword" name="NewMdp">
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" id="telephone" name="telephone" value="<?php echo htmlspecialchars($user['telephone']) ?? 'nullvalue'; ?>" required>
            </div>

            <div class="form-group">
                <label for="taille">Taille</label>
                <input type="text" id="taille" name="taille" value="<?php echo htmlspecialchars($user['taille']) ?? 'nullvalue'; ?>" required>
            </div>

            <div class="form-group">
                <label for="poids">Poids</label>
                <input type="text" id="poids" name="poids" value="<?php echo htmlspecialchars($user['poids']) ?? 'nullvalue'; ?>" required>
            </div>

            <div class="form-group" id="btnform">
                <button type="submit">Enregistrer</button>
            </div>
        </form>
    </main>
</body>
</html>
