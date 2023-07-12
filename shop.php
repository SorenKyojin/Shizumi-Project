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
    <title>Magasin - Shizumi</title>
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
                    Achetez des personnages avec vos Okanes. La boutique se rafraîchit tous les jours, et ne propose que des personnages de rareté 3 étoiles ou moins. Tous les Dimanches apparaît un personnage 4 étoiles ou mieux. Le prix du personnage varie selon sa rareté.
                </p>
                <p class="workinprogress">Cette page est utilisée à des fins expérimentales. Celle-ci sert uniquement à avoir un rendu visuel du site avec le HTML et le CSS.</p>
            </div>
        </div>
        <div class="header-right">
            <div>
                <p class="page-name">Magasin</p>
                <p class="page-level">Niveau 1</p>
            </div>
            <!-- Icône de la page -->
            <img src="img/shop-icon.png" alt="Logo Loterie" width="80px" height="80px">
        </div>
    </header>
    <main class="shop">
        <section class="characters-shop">
            <div class="character-box-medium">
                <div><img src="img/characters/medium/nilou.jpg" class="character-box-med-img" alt="Nilou"></div>
                <div class="character-box-med-desc">
                    <p class="character-box-med-name">Nilou</p>
                    <p class="character-box-med-serie">Genshin Impact</p>
                    <p class="character-box-med-rarity-rare">Rare</p>
                    <button class="shop-buy">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#8debff" d="m23.964 15.266l-8.687 8.669c-.034.035-.086.052-.121.035L3.29 20.79c-.052-.017-.087-.052-.087-.086L.007 8.856c-.018-.053 0-.087.035-.122L8.728.065c.035-.035.087-.052.121-.035l11.866 3.18c.052.017.087.052.087.086l3.18 11.848c.034.053.016.087-.018.122zm-11.64-9.433L.667 8.943c-.017 0-.035.034-.017.052l8.53 8.512c.017.017.052.017.052-.017l3.127-11.64c.017 0-.018-.035-.035-.017Z"/></svg>
                        197
                    </button>
                </div>
            </div>
            <div class="character-box-medium">
                <div><img src="img/characters/medium/candace.png" class="character-box-med-img" alt="Candace"></div>
                <div class="character-box-med-desc">
                    <p class="character-box-med-name">Candace</p>
                    <p class="character-box-med-serie">Genshin Impact</p>
                    <p class="character-box-med-rarity">Commune</p>
                    <button class="shop-buy">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#8debff" d="m23.964 15.266l-8.687 8.669c-.034.035-.086.052-.121.035L3.29 20.79c-.052-.017-.087-.052-.087-.086L.007 8.856c-.018-.053 0-.087.035-.122L8.728.065c.035-.035.087-.052.121-.035l11.866 3.18c.052.017.087.052.087.086l3.18 11.848c.034.053.016.087-.018.122zm-11.64-9.433L.667 8.943c-.017 0-.035.034-.017.052l8.53 8.512c.017.017.052.017.052-.017l3.127-11.64c.017 0-.018-.035-.035-.017Z"/></svg>
                        62
                    </button>
                </div>
            </div>
            <div class="character-box-medium">
                <div><img src="img/characters/medium/pela.png" class="character-box-med-img" alt="Pela"></div>
                <div class="character-box-med-desc">
                    <p class="character-box-med-name">Pela</p>
                    <p class="character-box-med-serie">Honkai: Star Rail</p>
                    <p class="character-box-med-rarity">Commune</p>
                    <button class="shop-buy">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#8debff" d="m23.964 15.266l-8.687 8.669c-.034.035-.086.052-.121.035L3.29 20.79c-.052-.017-.087-.052-.087-.086L.007 8.856c-.018-.053 0-.087.035-.122L8.728.065c.035-.035.087-.052.121-.035l11.866 3.18c.052.017.087.052.087.086l3.18 11.848c.034.053.016.087-.018.122zm-11.64-9.433L.667 8.943c-.017 0-.035.034-.017.052l8.53 8.512c.017.017.052.017.052-.017l3.127-11.64c.017 0-.018-.035-.035-.017Z"/></svg>
                        74
                    </button>
                </div>
            </div>
        </section>
        <section class="item-shop">
            <div class="shop-item-box">
                <div><img src="img/items/common_chest.png" class="shop-item-box-img" alt="Coffre commun"></div>
                <div class="shop-item-box-desc">
                    <p class="shop-item-name">Coffre commun</p>
                    <p class="shop-item-type">Coffre à ouvrir</p>
                    <p class="shop-item-rarity">Commun</p>
                    <p class="item-price">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#8debff" d="m23.964 15.266l-8.687 8.669c-.034.035-.086.052-.121.035L3.29 20.79c-.052-.017-.087-.052-.087-.086L.007 8.856c-.018-.053 0-.087.035-.122L8.728.065c.035-.035.087-.052.121-.035l11.866 3.18c.052.017.087.052.087.086l3.18 11.848c.034.053.016.087-.018.122zm-11.64-9.433L.667 8.943c-.017 0-.035.034-.017.052l8.53 8.512c.017.017.052.017.052-.017l3.127-11.64c.017 0-.018-.035-.035-.017Z"/></svg>
                        100
                    </p>
                </div>
            </div>
            <div class="shop-item-box">
                <div><img src="img/items/luxurious_chest.png" class="shop-item-box-img" alt="Coffre luxueux"></div>
                <div class="shop-item-box-desc">
                    <p class="shop-item-name">Coffre luxueux</p>
                    <p class="shop-item-type">Coffre à ouvrir</p>
                    <p class="shop-item-rarity rarity-epic">Très Rare</p>
                    <p class="item-price">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#8debff" d="m23.964 15.266l-8.687 8.669c-.034.035-.086.052-.121.035L3.29 20.79c-.052-.017-.087-.052-.087-.086L.007 8.856c-.018-.053 0-.087.035-.122L8.728.065c.035-.035.087-.052.121-.035l11.866 3.18c.052.017.087.052.087.086l3.18 11.848c.034.053.016.087-.018.122zm-11.64-9.433L.667 8.943c-.017 0-.035.034-.017.052l8.53 8.512c.017.017.052.017.052-.017l3.127-11.64c.017 0-.018-.035-.035-.017Z"/></svg>
                        820
                    </p>
                </div>
            </div>
            <div class="shop-item-box">
                <div><img src="img/items/Belobog.png" class="shop-item-box-img" alt="Belobog"></div>
                <div class="shop-item-box-desc">
                    <p class="shop-item-name">Belobog</p>
                    <p class="shop-item-type">Endroit</p>
                    <p class="shop-item-rarity rarity-epic">Très Rare</p>
                    <p class="item-price">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#8debff" d="m23.964 15.266l-8.687 8.669c-.034.035-.086.052-.121.035L3.29 20.79c-.052-.017-.087-.052-.087-.086L.007 8.856c-.018-.053 0-.087.035-.122L8.728.065c.035-.035.087-.052.121-.035l11.866 3.18c.052.017.087.052.087.086l3.18 11.848c.034.053.016.087-.018.122zm-11.64-9.433L.667 8.943c-.017 0-.035.034-.017.052l8.53 8.512c.017.017.052.017.052-.017l3.127-11.64c.017 0-.018-.035-.035-.017Z"/></svg>
                        820
                    </p>
                </div>
            </div>
        </section>
    </main>
    <?php
    include("footer.php")
    ?>
        <div class="upgrade-button">
            <p>Coût: 3000 Ok</p>
            <button id="shop-upgrade" onclick="confirmShopUpgrade()">
                <img src="img/upgrade.png" class="upgrade-icon" alt="Améliorer">
                <span class="upgrade-text">Améliorer le magasin</span>
            </button>
        </div>
    </section>
</body>
</html>