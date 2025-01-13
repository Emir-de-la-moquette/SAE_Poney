<?php

// Start session
session_start();

// Check if user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: admin.php");
    exit();
}

// Handle login errors
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get submitted data
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    
    // Chemin vers la base de données SQLite
    $db_path = "../data/data.sqlite";

    try {
        $pdo = new PDO("sqlite:$db_path");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupérer un utilisateur (par exemple, le premier utilisateur)
        $query = "SELECT * FROM users WHERE email=:email and mdp=:mdp";
        $stmt = $pdo->query($query);
        $stmt->bindParam(':mdp', $password);
        $stmt->bindParam(':email', $username);
        $stmt->execute();
        $userExists = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userExists) {
            // Set session and redirect
            $_SESSION['loggedin'] = true;
            $_SESSION['user'] = $username;
            $_SESSION['pswrd'] = $password;
            if ($userExists['role'] == 'A'){header("Location: admin.php");}
            else if ($userExists['role'] == 'E'){header("Location: admin.php");}
            else {header("Location: infoClient.php");}
            exit();
        } else {
            throw new Exception("Nom d'utilisateur ou mot de passe incorrect.");
        }
    } catch (Exception $e) {
        die("Erreur : " . $e->getMessage());
    }
    
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/styles/login.css">
    <title>Connexion</title>
</head>
<body>
    <main class="login-container">
        <form id="loginForm" method="POST">
            <h1>Connexion</h1>

            <!-- Display error message if any -->
            <?php if ($error): ?>
                <p id="error-message" class="error-message"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>

            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group" id="btnform">
                <button type="submit">Se connecter</button>
            </div>

        </form>
        <div class="barreB"></div>

        <a href="./inscription.php"> <p>Pas de compte ? S'inscrire -></p> </a>
    </main>
</body>
</html>
