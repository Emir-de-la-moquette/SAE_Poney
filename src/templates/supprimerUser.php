<?php
require_once "../static/script/modele.php";
try {
    // Vérifier si l'utilisateur est connecté
    if (!isset($_GET['id'])) {
        throw new Exception("Utilisateur non connecté.");
    }
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    // Récupérer les informations de l'utilisateur via la fonction du modèle
    $user = getUserByID($id);
    if (!$user) {
        throw new Exception("Aucun utilisateur trouvé.");
    }
    deletePersonne($id);
    header("Location: ./admin.php");
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}
?>