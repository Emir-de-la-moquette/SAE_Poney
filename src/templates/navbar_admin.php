<?php 

session_start();

// Chemin vers la base de données SQLite
$db_path = "../data/data.sqlite";

// Se connecter à la base de données
try {

    $pdo = new PDO("sqlite:$db_path");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer un utilisateur (par exemple, le premier utilisateur)
    $query = "SELECT name, prenom FROM users WHERE email=\"".$_SESSION["user"]."\" and mdp=\"".$_SESSION["pswrd"]."\"";
    $stmt = $pdo->query($query);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérification de l'utilisateur
    if (!$user) {
        throw new Exception("Aucun utilisateur trouvé.");
    }
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}
?>

<heaed>
    <link rel="stylesheet" href="../static/styles/nav_admin.css">
</head>


<div class="logo">
    <img src="../static/images/logo-pony.png" alt="Logo">
</div>
<div class="admin-info">
    <h2>ADMIN</h2>
    <p><?php echo htmlspecialchars($user['name']); echo(" "); echo htmlspecialchars($user['prenom']);?></p>
</div>
<nav>
    <ul>
        <a href=''><li>Gestionnaire</li></a>
        <a href='./admin.php'><li>Plannings</li></a>
        <a href='./settings.php'><li>Paramètres</li></a>
        <a href='../static/script/logout.php'><li class="logout">Déconnexion</li></a>
    </ul>
</nav>
