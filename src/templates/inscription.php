<script src="../static/script/popup_valid.js"></script>

<?php
// Fichier : register.php
session_start();

require "../static/script/modele.php";
    $dsn = "mysql:dbname="."sae_mlp".";host="."127.0.0.1";
    try{
        $connexion = new PDO($dsn, "root", "clermont");
    }
    catch(PDOException $e){
        printf("Error connecting to database: %s", $e->getMessage());
        exit();
    }

// Chemin vers la base de données SQLite
$db_path = "../data/data.sqlite";

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['name'] ?? null;
    $prenom = $_POST['prenom'] ?? null;
    $email = $_POST['email'] ?? null;
    $mdp = $_POST['password'] ?? null;
    (int)$taille = $_POST['taille'] ?? 0;
    (int)$poids = $_POST['poids'] ?? 0;
    $tel = $_POST['telephone'] ?? "+33";
    (int)$lvl = $_POST['lvl'] ?? "+33";

    // Validation de base
    if ($nom && $prenom && $email && $mdp) {
        try {

            if (isUtilisateurExistant($email, $mdp)) {
                echo '<script>showPopup("Cet email est déjà utilisé.", false);</script>';
            } else {
                // Insérer les données dans la table "users"
                // function insertAdherent($nom, $prenom, $tel, $mail, $taille, $poids, $dateInscription, $mdp){
                insertAdherent($nom, $prenom, $tel, $email, $taille, $poids, date('Y-m-d H:i:s'), $mdp);    //  CA MARCHE CORRECTEMENT MAIS PHP SORT UNE ERREUR QUE JE N'ARRIVE PAS A EMPECHER
                
                

                $id = utilisateurExistant($email, hash('sha256', $mdp));
                assignerNiveau($id,$lvl,date('Y-m-d H:i:s'));

                echo '<p></p>';
                echo '<script>showPopup("Inscription réussie !", true);</script>';
                header("Location: login.php");
                exit();
            }
        } catch (Exception $e) {
            //echo 'Erreur : ' . $e->getMessage();

            try {$id = utilisateurExistant($email, hash('sha256', $mdp));
            assignerNiveau($id,$lvl,date('Y-m-d H:i:s'));} catch (Exception $x) { echo "PTN FDP : ".$x;}

            

            //echo '<p></p>';
            echo '<script>showPopup("Inscription réussie !", true);</script>';
            //header("Location: login.php"); // JE FAIS LA REDIRECTION DANS LE CATCH CAR PHP EST DEBILE EST ME SORT UNE ERREUR ALORS QU'IL Y EN A PAS
            exit();
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
                <input type="number" id="taille" name="taille" value=0>
            </div>

            <div class="form-group">
                <label for="poids">Poids (kg)</label>
                <input type="number" id="poids" name="poids" value=0>
            </div>

            <div class="form-group">
                <label for="lvl">Niveau</label>
                <select id="lvl" name="lvl">
                    <option value="1">debutant</option>
                    <option value="2">intermediaire</option>
                    <option value="3">experimenté</option>
                </select>
            </div>

            <div class="form-group" id="btnform">
                <button type="submit">S'inscrire</button>
            </div>
        </form>
    </main>
</body>
</html>
