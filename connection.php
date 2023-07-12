<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=PT Sans' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <script src="popup.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Bienvenue sur Shizumi</title>
</head>
<body>
    <header>
        <div class="mob-log-header">
            <div class="menutooltip">
                <a href="home.html"><img src="img/shizumi-asaki.png" alt="Logo" class="logo-medium"></a>
                <span class="menutooltiptext">Cliquez pour retourner à l'accueil</span>
            </div>
            <div>
                <h1 class="mob-log-title">Shizumi</h1>
                <p class="mob-log-desc">Shizumi est un jeu sur navigateur inspiré de Mudae, visant à permettre aux joueurs de collectionner leurs personnages préférés.</p>
            </div>
        </div>
    </header>
    <main class="mob-connection">
        <div class="mob-connection-box">
            <h1 class="log-box-title">Connexion</h1>
            <form name="login-form" action="menu.php">
                <label for="login">Email ou Nom d'utilisateur</label>
                <input type="text" name="login" id="login" class="mob-field" required>
                <label for="log-password">Mot de passe</label>
                <input type="password" name="log-password" id="log-password" class="mob-field" required>
                <div class="stay-logged-check">
                    <input type="checkbox" name="stay-logged" id="stay-logged">
                    <p>Rester connecté</p>
                </div>
                <input type="submit" value="Se connecter" class="submit">
            </form>
        </div>
    </main>
    <footer>
        <p>Shizumi by Soren - Shizumi 2023</p>
        <a href="#">Contactez-nous</a>
    </footer>
</body>
</html>