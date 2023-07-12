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
                    Voici votre Collection. Vous pouvez voir ici tous les personnages que vous possédez.
                    Vous pouvez également gérer vos personnages souhaités.
                    Améliorez l’hôtel pour augmenter le nombre de souhaits maximaux et l’obtention des personnages.
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
            <div><img src="img/characters/medium/arlecchino.png" class="character-box-med-img"></div>
            <div class="character-box-med-desc">
                <p class="character-box-med-name">Arlecchino</p>
                <p class="character-box-med-serie">Genshin Impact</p>
                <p class="box-rarity-epic">Très Rare</p>
                <p class="character-box-med-value">234 Ok</p>
            </div>
        </div>
        <div class="character-box-med-legendary box-clickable">
            <div><img src="img/characters/medium/nahida.png" class="character-box-med-img"></div>
            <div class="character-box-med-desc">
                <p class="character-box-med-name">Nahida</p>
                <p class="character-box-med-serie">Genshin Impact</p>
                <p class="box-rarity-leg">Légendaire</p>
                <p class="character-box-med-value">870 Ok</p>
            </div>
        </div>
        <div class="character-box-medium box-clickable">
            <div><img src="img/characters/medium/yanfei.png" class="character-box-med-img"></div>
            <div class="character-box-med-desc">
                <p class="character-box-med-name">Yanfei</p>
                <p class="character-box-med-serie">Genshin Impact</p>
                <p class="box-rarity-rare">Rare</p>
                <p class="character-box-med-value">145 Ok</p>
            </div>
        </div>
        <div class="character-box-med-legendary box-clickable">
            <div><img src="img/characters/medium/kiana.jpg" class="character-box-med-img"></div>
            <div class="character-box-med-desc">
                <p class="character-box-med-name">Kiana Kaslana</p>
                <p class="character-box-med-serie">Honkai Impact 3rd</p>
                <p class="box-rarity-leg">Légendaire</p>
                <p class="character-box-med-value">784 Ok</p>
            </div>
        </div>
        <div class="character-box-med-epic box-clickable"><!-- Les données dans ces divs seront modifiés par le JavaScript qui lira les fichiers JSON, et les personnages dans la collection de la personne -->
            <div><img src="img/characters/medium/elysia.png" class="character-box-med-img"></div>
            <div class="character-box-med-desc">
                <p class="character-box-med-name">Elysia</p>
                <p class="character-box-med-serie">Honkai Impact 3rd</p>
                <p class="box-rarity-epic">Très Rare</p>
                <p class="character-box-med-value">246 Ok</p>
            </div>
        </div>
        <div class="character-box-med-epic box-clickable"><!-- Les données dans ces divs seront modifiés par le JavaScript qui lira les fichiers JSON, et les personnages dans la collection de la personne -->
            <div><img src="img/characters/medium/bronya_rand.png" class="character-box-med-img"></div>
            <div class="character-box-med-desc">
                <p class="character-box-med-name">Bronya Rand</p>
                <p class="character-box-med-serie">Honkai: Star Rail</p>
                <p class="box-rarity-epic">Très Rare</p>
                <p class="character-box-med-value">284 Ok</p>
            </div>
        </div>
    </main>
    <?php
    include("footer.php")
    ?>
        <div class="footer-mid">
            <a href="wishes.php">
                <button class="wish-button">
                    <img src="img/wish-icon.png" class="wish-icon mobile-element">
                    <span class="wish-button-text desktop-only-element">Souhaits</span>
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