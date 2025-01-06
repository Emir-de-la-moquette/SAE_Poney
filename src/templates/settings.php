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
    print_r($user);

    // Vérification de l'utilisateur
    if (!$user) {
        throw new Exception("Aucun utilisateur trouvé.");
    }
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
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
                <label for="username">Mail</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>

            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
            </div>

            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($user['prenom']); ?>" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe Actuel</label>
                <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($user['mdp']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="NewPassword">Nouveau mot de passe</label>
                <input type="password" id="NewPassword" name="NewPassword">
            </div>

            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" id="telephone" name="telephone" value="<?php echo htmlspecialchars($user['telephone']); ?>" required>
            </div>

            <div class="form-group">
                <label for="taille">Taille</label>
                <input type="text" id="taille" name="taille" value="<?php echo htmlspecialchars($user['taille']); ?>" required>
            </div>

            <div class="form-group">
                <label for="poids">Poids</label>
                <input type="text" id="poids" name="poids" value="<?php echo htmlspecialchars($user['poids']); ?>" required>
            </div>

            <div class="form-group" id="btnform">
                <button type="submit">Enregistrer</button>
            </div>
        </form>
    </main>
</body>
</html>
