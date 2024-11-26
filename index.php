<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'Model/Connection.php';
require_once 'Model/User.php';
require_once 'Model/UserManager.php';

// Création de la connexion
$connection = new Connection();
$userManager = new UserManager($connection->getDb());

// Si on a un ID dans l'URL, c'est une modification
if (isset($_GET['id'])) {
    $userToEdit = $userManager->findOne($_GET['id']);
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new User();
    $user->hydrate($_POST);
    
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Modification d'un utilisateur existant
        $userManager->update($user);
        $message = "Utilisateur modifié avec succès!";
    } else {
        // Création d'un nouvel utilisateur
        $userManager->create($user);
        $message = "Utilisateur créé avec succès!";
    }
}

// Liste des utilisateurs avec liens de modification
$users = $userManager->findAll();

// Maintenant on inclut la vue
include 'View/form.php';
?>