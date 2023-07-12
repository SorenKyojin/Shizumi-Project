<?php
require("database/database.php");
if(isset($_POST['disconnect'])) {
    session_destroy();
    header("Location: index.php");
}
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
    <title>Profil et Préférences - Shizumi</title>
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
                <p class="page-name">Profil et Préférences</p>
                <p class="page-level">UID: 000001</p>
                <!-- On affiche l'UID unique de l'utilisateur. Celui-ci n'est pas modifiable, et sert à stocker la collection de l'utilisateur (et essentiellement ses informations) -->
            </div>
            <!-- Icône de la page -->
            <img src="img/exemple-profile-pic.jpg" class="profile-pic-medium">
        </div>
    </header>
    <main id="profile-container">
        <div class="box profile-box">
            <div class="profile-left">
                <form>
                    <label for="change-username">Nom d'utilisateur</label>
                    <input type="text" name="username" id="change-username" class="field">
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
                    <div><img src="chemin/vers/votre/dossier/de/photos/<?php echo $randomPhoto; ?>" alt="Photo de profil par défaut" class="profile-pic-big"></div>
                    <form class="change-profile-picture" action="database/pfp_pic_upload.php">
                        <p>Importez une image de 300x300 pixels minimum. La taille recommandée est de 500x500 pixels.</p>
                        <label class="import-profile-pic">
                            <p style="margin: 10px 10px;">Importer</p>
                            <input type="file" id="profile-pic-input" name="profile-pic-file" accept="image/png, image/jpeg, image/gif" class="hide-input-file">
                        </label>
                        <input type="submit" class="update-profile" name="update-profile" value="Mettre à jour"></input>
                    </form>
                    <form action="">
                        <input type="submit" name="reset-profile-pic" id="reset-profile-pic" value="Réinitialiser"></input>
                    </form>
                </div>
                <div class="flex-profile-buttons">
                    <button class="disable-list">Désactiver une série</button>

                    <!-- Déconnexion -->
                    <form method="post">
                        <input type="submit" class="disconnect" name="disconnect" value="Déconnexion"></input>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>