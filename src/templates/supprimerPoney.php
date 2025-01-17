<?php
require_once "../static/script/modele.php"; // Inclure le fichier contenant les fonctions liées à MySQL
try {
    // Vérifier si l'utilisateur est connecté
    if (!isset($_GET['id'])) {
        throw new Exception("Utilisateur non connecté.");
    }
    $id = $_GET['id'];
    // Récupérer les informations de l'utilisateur via la fonction du modèle
    $user = getPoneyByNom($id);
    if (!$user) {
        throw new Exception("Aucun utilisateur trouvé.");
    }
    deletePoney($nomPoney);
    header("Location: ./admin.php");
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}
?>