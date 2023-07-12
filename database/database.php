<?php
$db_host = "localhost";
$db_name = "shizumi";
$db_user = "root";
$db_pass = "";
// Connexion à la base de données
$conn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

// Vérification de la connexion à la base de données
// if ($conn->connect_error) {
//     echo("Échec de la connexion à la base de données : " . $conn->connect_error);
//     exit();
// }

// Méthode PDO
// $conn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);

?>
