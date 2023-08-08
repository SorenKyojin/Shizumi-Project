<?php
include("database/database.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=PT Sans' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <script src="menu.js"></script>
    <script src="popup.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Menu - Shizumi</title>
</head>
<body id="mobile-menu-body">
    <header class="mobile-logo">
        <img src="img/shizumi-asaki.png" alt="Shizumi" class="logo-medium" onclick="history.back()">
    </header>
    <main id="mobile-menu">
        <div class="mob-menu-line">
            <a href="lottery.php" class="mob-menu-button">
                <img src="img/lottery-icon.png" alt="Loterie">
                <p class="desktop-only-element remove-margin">Loterie</p>
            </a>
            <a href="shop.php" class="mob-menu-button">
                <img src="img/shop-icon.png" alt="Boutique">
                <p class="desktop-only-element remove-margin">Boutique</p>
            </a>
            <a href="collection.php" class="mob-menu-button">
                <img src="img/hotel-icon.png" alt="Collection">
                <p class="desktop-only-element remove-margin">Collection</p>
            </a>
        </div>
        <div class="mob-menu-line">
            <a href="garden.php" class="mob-menu-button">
                <img src="img/garden-icon.png" alt="Jardin">
                <p class="desktop-only-element remove-margin">Jardin</p>
            </a>
            <a href="inventory.php" class="mob-menu-button">
                <img src="img/inventory-icon.png" alt="Inventaire">
                <p class="desktop-only-element remove-margin">Inventaire</p>
            </a>
            <a href="contact.php" class="mob-menu-button">
                <img src="img/contact.png" alt="Contact">
                <p class="desktop-only-element remove-margin">Contact</p>
            </a>
        </div>
        <div class="mob-menu-line">
            <a href="museum.php" class="mob-menu-button">
                <img src="img/museum-icon.png" alt="Musée">
                <p class="desktop-only-element remove-margin">Musée</p>
            </a>
            <a href="profile.php" class="mob-menu-button">
                <img src="img/default_profile_pics/<?php
                    try {
                        $cnn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
                        $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    } catch (PDOException $err) {
                        echo "Erreur de connexion à la base de données : " . $err->getMessage();
                    }
                    $email = $_SESSION['email'];
                    try {
                        // Prépare la requête SQL en utilisant un paramètre nommé :email
                        $sql = "SELECT default_profile_picture FROM users WHERE email = :email";

                        // Prépare la requête avec PDO
                        $query = $conn->prepare($sql);

                        // Exécute la requête en liant la valeur de l'e-mail
                        $query->execute(['email' => $email]);

                        // Récupère le résultat de la requête
                        $result = $query->fetch();
                        if ($result) {
                            $default_pfp = $result['default_profile_picture'];
                            echo $default_pfp;
                        }
                    } catch (PDOException $err) {
                        echo "Erreur : " . $err->getMessage();
                    }
                    ?>" class="profile-pic-small" alt="Profil">
                <p class="desktop-only-element remove-margin">Profil</p>
            </a>
            <?php
            include_once("database/database.php");
            $email = $_SESSION['email'];
            try {
                // Prépare la requête SQL en utilisant un paramètre nommé :email
                $sql = "SELECT admin FROM users WHERE email = :email";

                // Prépare la requête avec PDO
                $query = $conn->prepare($sql);

                // Exécute la requête en liant la valeur de l'e-mail
                $query->execute(['email' => $email]);

                // Récupère le résultat de la requête
                $result = $query->fetch();
                if ($result) {
                    $adminstate = $result['admin'];
                    if ($adminstate === 1) {
                        echo '
                        <a href="dev-menu.php" class="mob-menu-button">
                            <img src="img/dev-icon.png" alt="Menu Développeurs">
                            <p class="desktop-only-element remove-margin">Développeur</p>
                        </a>
                        ';
                    }
                }
            } catch (PDOException $err) {
                echo "Erreur : " . $err->getMessage();
            }
            ?>
        </div>
    </main>
    <div class="box-light box-padding-30"> <!-- Boîte d'astuces -->
        <!-- Dans le paragraphe devrait s'afficher des astuces aléatoires, écrites en JavaScript
        accompagnée d'une icône liée à l'astuce juste au dessus -->
        <img src="" alt="" id="tip-icon">
        <p id="tip-text"></p>
    </div>
</body>
</html>