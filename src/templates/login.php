<?php
// Start session
session_start();

// Check if user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: welcome.php");
    exit();
}

// Handle login errors
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Dummy credentials for demonstration
    $validUsername = "feur";
    $validPassword = "feur";

    // Get submitted data
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $validUsername && $password === $validPassword) {
        // Set session and redirect
        $_SESSION['loggedin'] = true;
        header("Location: admin.php");
        exit();
    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrect.";
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

        <a href=""> <p>Mot de passe oublié ?</p> </a>
    </main>
</body>
</html>
