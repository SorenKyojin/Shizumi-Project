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
        <div class="home-header">
            <div class="menutooltip">
                <a href="menu.php"><img src="img/shizumi-asaki.png" alt="Logo" class="logo-medium"></a>
                <span class="menutooltiptext">Cliquez pour retourner à l'accueil</span>
            </div>
            <div>
                <h1 class="home-title">Shizumi</h1>
                <p class="home-desc">Shizumi est un jeu sur navigateur inspiré de Mudae, visant à permettre aux joueurs de collectionner leurs personnages préférés.</p>
            </div>
        </div>
    </header>
    <main class="home-page">
        <div class="mob-connection-box">
            <h1 class="log-box-title">Créer un compte</h1>
            <form name="register-form" action="create.php">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="mob-field" required>
                <label for="username">Nom d'utilisateur</label>
                <div class="id-tooltip">
                    <input type="text" name="username" id="username" class="mob-field" required>
                    <span class="id-tooltiptext">Indiquez un nom d'utilisateur unique. Celui-ci doit contenir minimum 3 caractères et maximum 16 caractères.</span>
                </div>
                <label for="reg-password">Mot de passe</label>
                <div class="password-tooltip">
                    <input type="password" name="password" id="password" class="mob-field" required>
                    <span class="password-tooltiptext">Le mot de passe doit contenir minimum 8 caractères, des minuscules et au moins une majuscule.</span>
                </div>
                <input type="submit" value="S'inscrire" class="submit">
            </form>
        </div>
    </main>
    <footer>
        <p>Shizumi by Soren - Shizumi 2023</p>
        <a href="#">Contactez-nous</a>
    </footer>
</body>
</html>