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
    <title>Préférences - Shizumi</title>
</head>
<body>
    <header class="global-header">
        <div class="header-left">
            <div class="menutooltip">
                <a href="menu.php"><img src="img/shizumi-asaki.png" alt="Shizumi" class="logo-small"></a>
                <span class="menutooltiptext">Cliquez pour ouvrir le menu</span>
            </div>
            <div>
                <p class="page-desc">
                    Modifiez votre profil, et ajustez vos préférences.
                </p>
                <p class="workinprogress">Cette page est utilisée à des fins expérimentales. Celle-ci sert uniquement à avoir un rendu visuel du site avec le HTML et le CSS.</p>
            </div>
        </div>
        <div class="header-right">
            <div>
                <p class="page-name">Préférences</p>
                <p class="page-level">UID: <?php 
                    try {
                        $cnn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
                        $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    } catch (PDOException $err) {
                        echo "Erreur de connexion à la base de données : " . $err->getMessage();
                    }
                    $email = $_SESSION['email'];
                    try {
                        // Prépare la requête SQL en utilisant un paramètre nommé :email
                        $sql = "SELECT id FROM users WHERE email = :email";

                        // Prépare la requête avec PDO
                        $query = $conn->prepare($sql);

                        // Exécute la requête en liant la valeur de l'e-mail
                        $query->execute(['email' => $email]);

                        // Récupère le résultat de la requête
                        $result = $query->fetch();
                        if ($result) {
                            $userID = $result['id'];
                            echo $userID;
                        } else {
                            echo "0";
                        }
                    } catch (PDOException $err) {
                        echo "Erreur : " . $err->getMessage();
                    }
                    ?></p>
                <!-- On affiche l'UID unique de l'utilisateur. Celui-ci n'est pas modifiable, et sert à stocker la collection de l'utilisateur (et essentiellement ses informations) -->
            </div>
            <!-- Icône de la page -->
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
                        } else {
                            echo "Indiquez votre nom d'utilisateur";
                        }
                    } catch (PDOException $err) {
                        echo "Erreur : " . $err->getMessage();
                    }
                    ?>" class="profile-pic-medium">
        </div>
    </header>
    <main id="profile-container">
        <div class="box profile-box">
            <div class="profile-left">
                <form>
                    <label for="change-username">Nom d'utilisateur</label>
                    <input type="text" name="username" id="change-username" class="field" placeholder="
                    <?php 
                    try {
                        $cnn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
                        $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    } catch (PDOException $err) {
                        echo "Erreur de connexion à la base de données : " . $err->getMessage();
                    }
                    $email = $_SESSION['email'];
                    try {
                        // Prépare la requête SQL en utilisant un paramètre nommé :email
                        $sql = "SELECT username FROM users WHERE email = :email";

                        // Prépare la requête avec PDO
                        $query = $conn->prepare($sql);

                        // Exécute la requête en liant la valeur de l'e-mail
                        $query->execute(['email' => $email]);

                        // Récupère le résultat de la requête
                        $result = $query->fetch();
                        if ($result) {
                            $username = $result['username'];
                            echo $username;
                        } else {
                            echo "Indiquez votre nom d'utilisateur";
                        }
                    } catch (PDOException $err) {
                        echo "Erreur : " . $err->getMessage();
                    }
                    ?>">
                    <label for="change-first-name">Prénom</label>
                    <input type="text" name="first-name" id="change-first-name" class="field">
                    <label for="change-email">Email</label>
                    <input type="email" name="email" id="change-email" class="field">
                    <div class="switch-group">
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                        </label>
                        <p>Autoriser les personnages issus de contenus pour adultes</p>
                    </div>
                    <div class="switch-group">
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>
                        <p>Waifus / Personnages féminins</p>
                    </div>
                    <div class="switch-group">
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                        </label>
                        <p>Husbandos / Personnages masculins</p>
                    </div>
                    <div class="switch-group">
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>
                        <p>Célébrités et personnes réelles</p>
                    </div>
                    <div class="switch-group">
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                        </label>
                        <p>Utiliser ma photo à la place du logo Shizumi pour le menu</p>
                    </div>
                </form>
            </div>
            <div class="profile-right">
                <h4>Photo de profil</h4>
                <div id="flex-profile-right">
                    <div><img src="img/default_profile_pics/<?php
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
                        } else {
                            echo "Indiquez votre nom d'utilisateur";
                        }
                    } catch (PDOException $err) {
                        echo "Erreur : " . $err->getMessage();
                    }
                    ?>" alt="Photo de profil par défaut" class="profile-pic-big"></div>
                    <div class="box-light change-profile-picture" style="margin-bottom: 15px;">
                        <p style="margin: 15px;">Le changement de photo de profil n'est pas encore disponible.</p>
                    </div>
                </div>
                <div class="flex-profile-buttons">
                    <button class="disable-list">Désactiver une série</button>
                </div>
            </div>
        </div>
    </main>
</body>
</html>