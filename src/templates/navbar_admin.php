<?php 

session_start();

// Chemin vers la base de données SQLite
$db_path = "../data/data.sqlite";

// Se connecter à la base de données
try {

    $pdo = new PDO("sqlite:$db_path");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer un utilisateur (par exemple, le premier utilisateur)
    $query = "SELECT name, prenom, role FROM users WHERE email=\"".$_SESSION["user"]."\" and mdp=\"".$_SESSION["pswrd"]."\"";
    $stmt = $pdo->query($query);
    $userNAV = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérification de l'utilisateur
    if (!$userNAV) {
        throw new Exception("Aucun utilisateur trouvé.");
    }
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}
?>

<head>
    <link rel="stylesheet" href="../static/styles/nav_admin.css">
</head>


<div class="logo">
    <img src="../static/images/logo-pony.png" alt="Logo">
</div>
<div class="admin-info">
<?php if ($userNAV['role'] == "A") {
            echo "<h2>ADMIN</h2>";
        }
        else if ($userNAV['role'] == "E") {
            echo "<h2>ENCADRANT</h2>";
        }
        else {
            echo "<h2>CLIENT</h2>";
        }
        ?>
    <p><?php echo htmlspecialchars($userNAV['name']); echo(" "); echo htmlspecialchars($userNAV['prenom']);?></p>
</div>
<nav>
    <ul>
        <?php if ($userNAV['role'] == "A") {
        echo "<a href='./admin.php'><li>Gestionnaire</li></a>";
        echo "<a href='./admin.php'><li>Plannings</li></a>";
        }
        else if ($userNAV['role'] == "E") {
            echo "<a href='./admin.php'><li>Informations</li></a>";
            echo "<a href='./admin.php'><li>Plannings</li></a>";
        }
        else {
            echo "<a href='./infoclient.php'><li>Informations du compte</li></a>";
            echo "<a href='./admin.php'><li>Planning</li></a>";
        }
        ?>
        <a href='./settings.php'><li>Paramètres</li></a>
        <a href='../static/script/logout.php'><li class="logout">Déconnexion</li></a>
    </ul>
</nav>
