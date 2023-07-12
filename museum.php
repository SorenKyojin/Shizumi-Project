<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://fonts.googleapis.com/css?family=PT Sans' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <script src="wallet.js"></script>
    <script src="popup.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Musée - Shizumi</title>
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
                    Affichez les objets légendaires que vous collectionnez. Ces objets n'ont pas d'utilité, et sont purement à but de collection.
                </p>
                <p class="workinprogress">Cette page est utilisée à des fins expérimentales. Celle-ci sert uniquement à avoir un rendu visuel du site avec le HTML et le CSS.</p>
            </div>
        </div>
        <div class="header-right">
            <div>
                <p class="page-name">Jardin</p>
                <p class="page-level">Niveau 1</p>
            </div>
            <!-- Icône de la page -->
            <img src="img/museum-icon.png" alt="Logo Musée" width="80px" height="80px">
        </div>
    </header>
    <main class="museum">
        <div class="box-light box-clickable-up-lift trophy-slot">
            <!-- * Les images doivent impérativement faire 500px par 500px ! -->
            <img src="img/items/trophies/assault_rifle_sk.png" class="trophy-image" alt="Fusil d'Assaut (Senran Kagura: PBS)">
            <img src="img/items/trophies/assault_rifle_sk.png" class="trophy-mob-img mobile-element" alt="Fusil d'Assaut (Senran Kagura: PBS)">
            <div class="trophy-desc">
                <p style="font-size: 20px;">Fusil d'Assaut</p>
                <p style="font-size: 12px;">Senran Kagura: Peach Beach Splash</p>
            </div>
        </div>
        <div class="box-light box-clickable-up-lift trophy-slot">
            <img src="img/items/trophies/splattershot_v3.png" class="trophy-image" alt="Liquidateur v3">
            <img src="img/items/trophies/splattershot_v3.png" class="trophy-mob-img mobile-element" alt="Liquidateur v3">
            <div class="trophy-desc">
                <p style="font-size: 20px;">Liquidateur v3</p>
                <p style="font-size: 12px;">Splatoon 3</p>
            </div>
        </div>
    </main>
    <section class="footer2">
        <div class="box-light okane-wallet">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><path fill="#8debff" d="m23.964 15.266l-8.687 8.669c-.034.035-.086.052-.121.035L3.29 20.79c-.052-.017-.087-.052-.087-.086L.007 8.856c-.018-.053 0-.087.035-.122L8.728.065c.035-.035.087-.052.121-.035l11.866 3.18c.052.017.087.052.087.086l3.18 11.848c.034.053.016.087-.018.122zm-11.64-9.433L.667 8.943c-.017 0-.035.034-.017.052l8.53 8.512c.017.017.052.017.052-.017l3.127-11.64c.017 0-.018-.035-.035-.017Z"/></svg>
            <p id="okane-wallet-value"></p>
        </div>
    </section>
</body>
</html>