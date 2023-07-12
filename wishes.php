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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Collection - Shizumi</title>
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
                    Vous pouvez voir ici les personnages que vous avez placé comme Souhait (Wish).
                    Les personnages souhaités ont une chance supplémmentaire d'apparaître, mais n'apportent aucun Okane lors de leur obtension.
                    Améliorez l’hôtel pour augmenter le nombre de souhaits maximaux ou plantez des plantes dans le jardin offrant des bonus de voeux.
                </p>
                <p class="workinprogress">Cette page est utilisée à des fins expérimentales. Celle-ci sert uniquement à avoir un rendu visuel du site avec le HTML et le CSS.</p>
            </div>
        </div>
        <div class="header-right">
            <div>
                <p class="page-name">Hôtel</p>
                <p class="page-level">Niveau 1</p>
            </div>
            <!-- Icône de la page -->
            <img src="img/hotel-icon.png" alt="Logo Loterie" width="80px" height="80px">
        </div>
    </header>
    <main class="collection-area">
        <!-- Template -->
        <!-- 
        <div class="character-box-medium">
            <div class="character-box-med-img"><img src="img/waifus/medium/"></div>
            <div class="character-box-med-desc">
                <p class="character-box-med-name"></p>
                <p class="character-box-med-serie"></p>
                <p class="character-box-med-rarity"></p>
                <p class="character-box-med-value"></p>
            </div>
        </div> 
        -->
        <div class="character-box-med-epic box-clickable">
            <!-- Les données dans ces divs seront modifiés par le JavaScript qui lira les fichiers JSON, et les personnages dans la collection de la personne -->
            <div><img src="img/characters/medium/neptune.png" class="character-box-med-img"></div>
            <div class="character-box-med-desc">
                <p class="character-box-med-name">Neptune</p>
                <p class="character-box-med-serie">Hyperdimension Neptunia</p>
                <p class="character-box-med-rarity-epic">Très Rare</p>
                <p class="character-box-med-value">446 Ok</p>
                <!-- Nep nep nep nep nep nep nep nep -->
                <!-- https://youtu.be/EKxio8HZiNA -->
            </div>
        </div>
        <div class="character-box-med-epic box-clickable">
            <div><img src="img/characters/medium/noire.png" class="character-box-med-img"></div>
            <div class="character-box-med-desc">
                <p class="character-box-med-name">Noire</p>
                <p class="character-box-med-serie">Hyperdimension Neptunia</p>
                <p class="character-box-med-rarity-epic">Très Rare</p>
                <p class="character-box-med-value">412 Ok</p>
            </div>
        </div>
        <div class="character-box-med-legendary box-clickable">
            <div><img src="img/characters/medium/purple_heart.jpg" class="character-box-med-img"></div>
            <div class="character-box-med-desc">
                <p class="character-box-med-name">Purple Heart</p>
                <p class="character-box-med-serie">Hyperdimension Neptunia</p>
                <p class="character-box-med-rarity-leg">Légendaire</p>
                <p class="character-box-med-value">789 Ok</p>
            </div>
        </div>
        <div class="character-box-medium box-clickable"><!-- Les données dans ces divs seront modifiés par le JavaScript qui lira les fichiers JSON, et les personnages dans la collection de la personne -->
            <div><img src="img/characters/medium/senko.png" class="character-box-med-img"></div>
            <div class="character-box-med-desc">
                <p class="character-box-med-name">Senko</p>
                <p class="character-box-med-serie">Shinobi Master Senran Kagura: New Link</p>
                <p class="character-box-med-rarity-rare">Rare</p>
                <p class="character-box-med-value">246 Ok</p>
            </div>
        </div>
        <div class="character-box-med-epic box-clickable"><!-- Les données dans ces divs seront modifiés par le JavaScript qui lira les fichiers JSON, et les personnages dans la collection de la personne -->
            <div><img src="img/characters/medium/seele.png" class="character-box-med-img"></div>
            <div class="character-box-med-desc">
                <p class="character-box-med-name">Seele</p>
                <p class="character-box-med-serie">Honkai: Star Rail</p>
                <p class="character-box-med-rarity-epic">Très Rare</p>
                <p class="character-box-med-value">376 Ok</p>
            </div>
        </div>
    </main>
    <?php
    include("footer.php")
    ?>
        <div class="footer-mid">
            <a href="collection.html">
                <button class="wish-button">
                    <img src="img/upgrade.png" class="wish-icon mobile-element">
                    <span class="wish-button-text desktop-only-element">Retour</span>
                </button>
            </a>
        </div>
        <div class="upgrade-button">
            <p>Coût: 3000 Ok</p>
            <button id="hotel-upgrade">
                <img src="img/upgrade.png" class="upgrade-icon mobile-element">
                <span class="upgrade-text desktop-only-element">Améliorer l'hôtel</span>
            </button>
        </div>
</footer>
</body>
</html>