<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Shizumi est un jeu sur navigateur inspiré de Mudae, visant à permettre aux joueurs de collectionner leurs personnages préférés.">
    <link href='https://fonts.googleapis.com/css?family=PT Sans' rel='stylesheet'>
    <!-- ! Dans le link ci-dessus, le validateur W3C détecte une erreur lié à l'espace.
    ! Cependant, il n'est pas possible de l'enlever ou le remplacer, sinon la police ne fonctionne plus -->
    <link rel="stylesheet" href="style.css">
    <script src="popup.js"></script>
    <script src="quote.js" async></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Bienvenue sur Shizumi</title>
</head>
<body>
    <header>
        <div class="home-header">
            <div>
                <img src="img/shizumi-asaki.png" alt="Logo" class="logo-big desktop-only-element">
                <img src="img/shizumi-asaki.png" alt="Logo" class="logo-medium mobile-element">
            </div>
            <div>
                <h1 class="home-title">Shizumi</h1>
                <p class="home-desc">Shizumi est un jeu sur navigateur inspiré de Mudae, visant à permettre aux joueurs de collectionner leurs personnages préférés.</p>
                <div class="box box-padding-30" style="margin-left: 50px;">
                    <h1 class="log-box-title">Citation:</h1>
                    <p id="quote" class="italic"></p>
                    <p><span id="quote-auth"></span> - <span id="quote-sauce"></span></p>
                </div>
            </div>
        </div>
    </header>
    <main class="home-page">
        <a href="login.php" class="mob-log-button mobile-element">Connexion</a>
        <a href="register.php" class="mob-reg-button mobile-element">Inscription</a>
        <div class="connection-box desktop-only-element">
            <h1 class="log-box-title">Connexion</h1>
            <form name="login-form" action="connect.php" method="post">
                <label for="login">Email</label>
                <input type="text" name="log-username" id="log-username" class="field" required>
                <label>Mot de passe</label>
                <input type="password" name="log-password" id="log-password" class="field" required>
                <p><a href="forgot.php" class="italic">Mot de passe oublié</a></p>
                <!-- <div class="stay-logged-check">
                    <input type="checkbox" name="stay-logged" id="stay-logged">
                    <p>Rester connecté</p>
                </div> -->
                <button type="submit" class="submit">Se connecter</button>
            </form>
        </div>
        <div class="connection-box desktop-only-element">
            <h1 class="log-box-title">Créer un compte</h1>
            <form name="register-form" action="create.php" method="post">
                <label>Email</label>
                <input type="email" name="email" id="email" class="field" required>
                <label>Nom d'utilisateur</label>
                <div class="id-tooltip">
                    <input type="text" name="username" id="username" class="field" pattern="\w{3,16}" required>
                    <span class="id-tooltiptext">Le nom d'utilisateur doit contenir minimum 5 caractères et maximum 20 caractères.</span>
                </div>
                <label>Mot de passe</label>
                <div class="password-tooltip">
                    <input type="password" name="password" id="password" class="field" required>
                    <span class="password-tooltiptext">Le mot de passe doit contenir minimum 8 caractères, des minuscules et au moins une majuscule.</span>
                </div>
                <button type="submit" class="submit">S'inscrire</button>
            </form>
        </div>
    </main>
    <footer>
        <p>Shizumi by Soren - Shizumi 2023</p>
        <p><a href="contact.php">Contactez-nous</a> • <a href="privacy.php">Politique de confidentialité</a></p>
    </footer>
</body>
</html>