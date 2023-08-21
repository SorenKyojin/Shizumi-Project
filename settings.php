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
                        // Prepare SQL request with :email parameter
                        $sql = "SELECT id FROM users WHERE email = :email";

                        // Prepare the request with PDO protocol
                        $query = $conn->prepare($sql);

                        // Execute the request, with the value of email
                        $query->execute(['email' => $email]);

                        // Get the result of the request
                        $result = $query->fetch();
                        if ($result) {
                            $userID = $result['id'];
                            echo $userID;
                            $_SESSION['useruniqueid'] = $userID;
                        } else {
                            echo "0";
                        }
                    } catch (PDOException $err) {
                        echo "Erreur : " . $err->getMessage();
                    }
                    ?></p>
                <!-- We show player's UUID. It can't be modified, and is used to store everything the player owns in a JSON file (and some informations, like the wallet) -->
            </div>
            <!-- Profile picture -->
            <div class="profiletooltip">
                <a href="profile.php">
                    <img src="database/players/picture/<?php
                    try {
                        $cnn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
                        $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    } catch (PDOException $err) {
                        echo "Erreur de connexion à la base de données : " . $err->getMessage();
                    }
                    $email = $_SESSION['email'];
                    try {
                        // Prepare SQL request with :email parameter
                        $sql = "SELECT profile_picture FROM users WHERE email = :email";

                        // Prepare the request with PDO protocol
                        $query = $conn->prepare($sql);

                        // Execute the request, with the value of email
                        $query->execute(['email' => $email]);

                        // Get the result of the request
                        $result = $query->fetch();
                        if ($result) {
                            $profile_pic = $result['profile_picture'];
                            echo $profile_pic;
                        } else {
                            echo "Indiquez votre nom d'utilisateur";
                        }
                    } catch (PDOException $err) {
                        echo "Erreur : " . $err->getMessage();
                    }
                    ?>" class="profile-pic-medium">
                </a>
                <span class="profiletooltiptext">Retour au profil</span>
            </div>
        </div>
    </header>
    <main id="profile-container">
        <div class="box profile-box">
            <div class="profile-left">
                <form action="database/profile_update.php" method="post">
                    <label for="change-username">Nom d'utilisateur: <span><?php 
                    try {
                        $cnn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
                        $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    } catch (PDOException $err) {
                        echo "Erreur de connexion à la base de données : " . $err->getMessage();
                    }
                    $email = $_SESSION['email'];
                    try {
                        // Prepare SQL request with :email parameter
                        $sql = "SELECT username FROM users WHERE email = :email";

                        // Prepare the request with PDO protocol
                        $query = $conn->prepare($sql);

                        // Execute the request, with the value of email
                        $query->execute(['email' => $email]);

                        // Get the result of the request
                        $result = $query->fetch();
                        if ($result) {
                            $username = $result['username'];
                            echo $username;
                        } else {
                            echo "Inconnu";
                        }
                    } catch (PDOException $err) {
                        echo "Erreur : " . $err->getMessage();
                    }
                    ?></span></label>
                    <div class="flex-row">
                        <input type="text" name="username" id="username" class="field">
                        <button type="submit" class="green-button compact-button-40 center-all" style="margin-left: 15px;margin-top: 10px;"><img src="img/save-icon.png" class="icon-32"></button>
                    </div>
                </form>
                <form action="database/profile_update.php" method="post">
                    <label for="first-name">Prénom: <span>
                        <?php 
                        try {
                            $cnn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
                            $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        } catch (PDOException $err) {
                            echo "Erreur de connexion à la base de données : " . $err->getMessage();
                        }
                        $email = $_SESSION['email'];
                        try {
                            // Prepare SQL request with :email parameter
                            $sql = "SELECT firstname FROM users WHERE email = :email";

                            // Prepare the request with PDO protocol
                            $query = $conn->prepare($sql);

                            // Execute the request, with the value of email
                            $query->execute(['email' => $email]);

                            // Get the result of the request
                            $result = $query->fetch();
                            if ($result) {
                                $username = $result['firstname'];
                                echo $username;
                            } else {
                                echo "Aucun";
                            }
                        } catch (PDOException $err) {
                            echo "Erreur : " . $err->getMessage();
                        }
                        ?>
                    </span></label>
                    <div class="flex-row">
                        <input type="text" name="first-name" id="first-name" class="field">
                        <button type="submit" class="green-button compact-button-40 center-all" style="margin-left: 15px;margin-top: 10px;"><img src="img/save-icon.png" class="icon-32"></button>
                    </div>
                </form>
                <form action="database/profile_update.php" method="post">
                    <label for="email">Email</label>
                    <div class="flex-row">
                        <input type="email" name="email" id="email" class="field">
                        <button type="submit" class="green-button compact-button-40 center-all" style="margin-left: 15px;margin-top: 10px;"><img src="img/save-icon.png" class="icon-32"></button>
                    </div>
                </form>
                <form action="">
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
                    <button type="submit" class="green-button box-padding-10">Mettre à jour</button>
                </form>
            </div>
            <div class="profile-right">
                <h4>Photo de profil</h4>
                <div id="flex-profile-right">
                    <div><img src="database/players/picture/<?php
                    try {
                        $cnn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
                        $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    } catch (PDOException $err) {
                        echo "Erreur de connexion à la base de données : " . $err->getMessage();
                    }
                    $email = $_SESSION['email'];
                    try {
                        // Prepare SQL request with :email parameter
                        $sql = "SELECT profile_picture FROM users WHERE email = :email";

                        // Prepare the request with PDO protocol
                        $query = $conn->prepare($sql);

                        // Execute the request, with the value of email
                        $query->execute(['email' => $email]);

                        // Get the result of the request
                        $result = $query->fetch();
                        if ($result) {
                            $profile_pic = $result['profile_picture'];
                            echo $profile_pic;
                        } else {
                            echo "Indiquez votre nom d'utilisateur";
                        }
                    } catch (PDOException $err) {
                        echo "Erreur : " . $err->getMessage();
                    }
                    ?>" alt="Photo de profil" class="profile-pic-big"></div>
                    <div class="change-profile-picture" style="margin-bottom: 15px;">
                        <p>Importez une image de 300x300 pixels minimum. La taille recommandée est de 500x500 pixels.</p>
                        <form action="">
                            <label for="import-profile-pic" class="import-profile-pic">Importer</label>
                            <input type="file" name="profile-pic" id="import-profile-pic" accept="image/png, image/jpeg, image/gif" class="hide-input-file">
                            <button type="submit" name="submit" class="green-button box-padding-10">Mettre à jour</button>
                            <button type="submit" name="reset" id="reset-profile-pic">Réinitialiser</button>
                        </form>
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