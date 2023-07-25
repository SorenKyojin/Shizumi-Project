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
<!-- HEADER -->
<!-- Ce header n'est pas visible sur la page de connexion -->
<body id="mobile-menu-body">
    <header class="mobile-logo">
        <img src="img/shizumi-asaki.png" alt="Shizumi" class="logo-medium" onclick="history.back()">
    </header>
    <main id="mobile-menu">
        <div id="mob-menu-line-top">
            <a href="#" class="mob-menu-button">
                <img src="img/characters-icon.png" alt="Personnages">
                Personnages
            </a>
            <a href="#" class="mob-menu-button">
                <img src="img/series-icon.png" alt="Séries">
                Séries
            </a>
            <a href="collection.html" class="mob-menu-button">
                <img src="img/hotel-icon.png" alt="Collection">
                Collection
            </a>
        </div>
        <div id="mob-menu-line-mid">
            <a href="garden.html" class="mob-menu-button">
                <img src="img/garden-icon.png" alt="Plantes">
                Plantes
            </a>
            <a href="contact.html" class="mob-menu-button">
                <img src="img/contact.png" alt="Objets">
                Objets
            </a>
            <a href="profile.html" class="mob-menu-button">
                <img src="img/exemple-profile-pic.jpg" class="profile-pic-small" alt="">
                Profil
            </a>
        </div>
    </main>
    <div class="box-light mob-dev-window">
        <p>Cette fonctionnalité est expérimentale. Celle-ci est sujette à modifications, et ne représente qu'un prototype de ce qui sortira au final.</p>
        <a href="menu.php">Menu</a>
    </div>
</body>
</html>