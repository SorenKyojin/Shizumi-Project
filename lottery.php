<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://fonts.googleapis.com/css?family=PT Sans' rel='stylesheet'>
    <!-- ! Dans le link ci-dessus, le validateur W3C détecte une erreur lié à l'espace.
    ! Cependant, il n'est pas possible de l'enlever ou le remplacer, sinon la police ne fonctionne plus -->
    <link rel="stylesheet" href="style.css">
    <script src="popup.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Loterie - Shizumi</title>
</head>
<body>
    <header class="global-header">
        <div class="header-left">
            <div class="menutooltip">
                <a href="menu.php"><img src="img/shizumi-asaki.png" alt="Shizumi" class="logo-small"></a>
                <span class="menutooltiptext">Cliquez pour ouvrir le menu</span>
            </div>
            <div>
                <p class="page-desc">C’est ici que vous pouvez obtenir gratuitement des personnages sur Shizumi.
                    Vous avez le droit par défaut à 10 tirages par heure et une obtention de personnage toutes les 2 heures. Vous pouvez repousser ces limites en améliorant les bâtiments correspondants.
                </p>
                <p class="workinprogress">Cette page est utilisée à des fins expérimentales. Celle-ci sert uniquement à avoir un rendu visuel du site avec le HTML et le CSS.</p>
            </div>
        </div>
        <div class="header-right">
            <div>
                <p class="page-name">Loterie</p>
                <p class="page-level">Niveau 1</p>
            </div>
            <!-- Icône de la page -->
            <img src="img/lottery-icon.png" alt="Logo Loterie" width="80" height="80" class="desktop-only-element">
            <button class="mobile-roll mobile-element"><span id="remaining-rolls-mini">0</span></button>
        </div>
    </header>
    <main class="lottery-container">
        <div class="box-light waifu-roll" id="roll-container">
            <div class="roll-container-top">
                <div>
                    <img src="img/characters/dehya.png" alt="Dehya" id="roll-waifu-image" class="desktop-only-element">
                    <!-- L'image doit toujours faire 225 x 350 pixels -->
                    <img src="img/characters/small/dehya.png" alt="Dehya" id="roll-waifu-image-small" class="mobile-element small-waifu-image">
                </div>
                <div id="waifu-infos">
                    <h1 id="waifu-roll-name">Dehya</h1>
                    <p id="roll-serie-name">Genshin Impact</p>
                    <p id="roll-generator-type">Jeux</p>
                    <div id="roll-rank">
                        <img src="img/mobile-rank-5stars.png" alt="star" class="mobile-element main-star">
                        <img src="img/rank-star.png" alt="star" class="desktop-only-element dtstar" id="star1">
                        <img src="img/rank-star.png" alt="star" class="desktop-only-element dtstar" id="star2">
                        <img src="img/rank-star.png" alt="star" class="desktop-only-element dtstar" id="star3">
                        <img src="img/rank-star.png" alt="star" class="desktop-only-element dtstar" id="star4">
                        <img src="img/rank-star.png" alt="star" class="desktop-only-element dtstar" id="star5">
                    </div>
                    <p id="roll-desc">
                        Une membre des Érémites, une bande de mercenaires vaguement organisée qui agit dans
                        le désert de Sumeru. Courageuse et puissante, elle possède une excellente réputation
                        parmi ses pairs.
                    </p>
                </div>
            </div>
            <div class="roll-container-bottom">
                <div id="roll-okane-value">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><path fill="#8debff" d="m23.964 15.266l-8.687 8.669c-.034.035-.086.052-.121.035L3.29 20.79c-.052-.017-.087-.052-.087-.086L.007 8.856c-.018-.053 0-.087.035-.122L8.728.065c.035-.035.087-.052.121-.035l11.866 3.18c.052.017.087.052.087.086l3.18 11.848c.034.053.016.087-.018.122zm-11.64-9.433L.667 8.943c-.017 0-.035.034-.017.052l8.53 8.512c.017.017.052.017.052-.017l3.127-11.64c.017 0-.018-.035-.035-.017Z"/></svg>
                    <p id="roll-value">533</p>
                </div>
                <div>
                    <button id="roll-claim"><i class="fa-solid fa-heart fa-lg" style="color: #f5685b;"></i><span class="desktop-only-element claim-text">Obtenir</span></button>
                </div>
            </div>
        </div>
        <div class="lott-container-r flex-column center-top">
            <div class="roll">
                <p class="remaining-rolls-text"><span id="remaining-rolls"></span> tirages restants</p>
                <p>Améliorez la loterie pour obtenir plus de tirage, ou achetez des coffres</p>
                <button id="roll-button" class="desktop-only-element">Lancer</button>
                <p>Prochaine réinitialisation de tirage: <span id="roll-timer"></span></p>
            </div>
            <div class="claims">
                <p class="remaining-claims-text">Vous pouvez obtenir <span id="remaining-claims"></span> personnage(s)</p>
                <p id="claim-upgrade-tip">Planter certaines plantes vous permet d'augmenter le nombre d'obtension de personnage.</p>
                <p>Le nombre d'obtension sera réinitialisé dans: <span id="claim-timer"></span></p>
            </div>
        </div>
    </main>
    <?php
    include("footer.php")
    ?>
        <div class="upgrade-button">
            <p>Coût: 3000 Ok</p>
            <button id="lottery-upgrade">
                <img src="img/upgrade.png" class="upgrade-icon mobile-element" alt="Améliorer">
                <span class="upgrade-text desktop-only-element">Améliorer la loterie</span>
            </button>
        </div>
    </footer>
    <script src="lottery.js"></script>
    <script src="menu.js"></script>
    <script src="wallet.js"></script>
</body>
</html>