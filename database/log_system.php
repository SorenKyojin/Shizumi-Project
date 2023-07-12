<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "shizumi");

// Vérification de la connexion à la base de données
if ($conn->connect_error) {
    echo("Échec de la connexion à la base de données : " . $conn->connect_error);
    exit();
}
?>
