<?php
require("database/database.php");
session_start();
// if(isset($_FILES['profile-pic-file'])){}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://fonts.googleapis.com/css?family=PT Sans' rel='stylesheet'>
    <script src="menu.js"></script>
    <script src="wallet.js"></script>
    <script src="popup.js"></script>
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Changement de la photo de profil - Shizumi</title>
</head>
<body>
    <?php
// Vérifier si le formulaire a été soumis
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Vérifie si le fichier a été uploadé sans erreur.
    if(isset($_FILES["profile-pic"]) && $_FILES["profile-pic"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["profile-pic"]["name"];
        $filetype = $_FILES["profile-pic"]["type"];
        $filesize = $_FILES["profile-pic"]["size"];

        // Vérifie l'extension du fichier
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

        // Vérifie la taille du fichier - 5Mo maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Erreur: La taille du fichier est supérieure à la limite autorisée.");

        // Vérifie le type MIME du fichier
        if(in_array($filetype, $allowed)){
            // Génère un nom de fichier unique pour éviter les conflits à partir du nom d'origine
            $clientfilename = $_FILES["profile-pic"]["name"]; // ? Nom d'origine du fichier
            $filenumber = rand(1, 999999999); // ? Nombre aléatoire avant le hachage
            $serverfilename = sha1($filenumber) . "_" . $clientfilename; // ? On concatène le nom d'origine avec le hachage du normbre aléatoire pour renforcer les possibilités d'unicité
            $_FILES["profile-pic"]["name"] = $serverfilename; // ? On remplace le nom du fichier par le nouveau nom unique
            // Vérifie si le fichier existe avant de le télécharger.
            if(file_exists("../medias/" . $_FILES["profile-pic"]["name"])){
                echo $_FILES["profile-pic"]["name"] . " existe déjà.";
            } else{
                move_uploaded_file($_FILES["profile-pic"]["tmp_name"], "database/player/picture/" . $_FILES["profile-pic"]["name"]);
                echo "Votre fichier a été téléchargé avec succès.";
            }
            
        } else{
            echo "Erreur: Une erreur s'est produite lors de l'envoi de l'image.";
        }
    } else{
        echo "Erreur: " . $_FILES["profile-pic"]["error"];
    }
}
?>
</body>
</html>