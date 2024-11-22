<?php
// Afficher les erreurs PHP (utile pour le débogage)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Test de PHP
echo "<h1>Test PHP</h1>";
echo "PHP fonctionne !<br>";
echo "Version PHP : " . phpversion() . "<br><br>";

// Test de MySQL
try {
    $conn = new PDO("mysql:host=localhost", "root", "");
    echo "Connexion MySQL réussie !";
} catch(PDOException $e) {
    echo "Erreur de connexion MySQL : " . $e->getMessage();
}
?>
