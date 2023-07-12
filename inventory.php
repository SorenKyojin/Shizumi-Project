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
                <p class="page-name">Inventaire</p>
                <p class="page-level">3 objets possédés</p>
            </div>
            <!-- Icône de la page -->
            <img src="img/inventory-icon.png" alt="Logo Inventaire" width="80px" height="80px">
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
        <div class="item-box">
            <div><img src="img/items/primogem.png" class="item-box-image" alt="Primo-gemme"></div>
            <div class="item-box-desc">
                <p class="item-box-name">Primo-gemme</p>
                <p class="item-box-type">Objet non consommable</p>
                <p class="item-rarity-epic">Très Rare</p>
                <button class="blue-button">Utiliser</button>
            </div>
        </div>
        <div class="item-box">
            <div><img src="img/items/common_chest.png" class="item-box-image" alt="Coffre commun"></div>
            <div class="item-box-desc">
                <p class="item-box-name">Coffre commun</p>
                <p class="item-box-type">Coffre à ouvrir</p>
                <p class="item-rarity-common">Commun</p>
                <button class="blue-button">Ouvrir</button>
            </div>
        </div>
        <div class="item-box">
            <div><img src="img/items/Belobog.png" class="item-box-image" alt="Belobog"></div>
            <div class="item-box-desc">
                <p class="item-box-name">Belobog</p>
                <p class="item-box-type">Lieu</p>
                <p class="item-rarity-epic">Très Rare</p>
                <button class="blue-button">Utiliser</button>
            </div>
        </div>
    </main>
    <?php
    include("footer.php");
    ?>
    </footer>
</body>
</html>