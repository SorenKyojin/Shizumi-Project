<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=PT Sans' rel='stylesheet'>
    <!-- ! Dans le link ci-dessus, le validateur W3C détecte une erreur lié à l'espace.
    ! Cependant, il n'est pas possible de l'enlever ou le remplacer, sinon la police ne fonctionne plus -->
    <link rel="stylesheet" href="style.css">
    <script src="popup.js"></script>
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
            </div>
        </div>
    </header>
    <?php
        require('database/database.php');
        // When form submitted, insert values into the database.
        if (isset($_REQUEST['username'])) {
            // removes backslashes
            $username = stripslashes($_REQUEST['username']);
            //escapes special characters in a string
            $username = mysqli_real_escape_string($conn, $username);
            $email    = stripslashes($_REQUEST['email']);
            $email    = mysqli_real_escape_string($conn, $email);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($conn, $password);
            $create_datetime = date("Y-m-d H:i:s");
            $query    = "INSERT into `users` (username, password, email, create_datetime)
                         VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
            $result   = mysqli_query($conn, $query);
            if ($result) {
                echo "<div class='box-light center-all'>
                      <h3>Compte crée avec succès.</h3><br/>
                      <p>Vous pouvez vous connecter.</p>
                      </div>";
            } else {
                echo "<div class='box-light center-all'>
                      <h3>Remplissez les champs obligatoires indiqués en rouge.</h3><br/>
                      </div>";
            }
        }
        session_start();
        // When form submitted, check and create user session.
        if (isset($_REQUEST['log-username'])) {
            $username = stripslashes($_REQUEST['log-username']);    // removes backslashes
            $username = mysqli_real_escape_string($conn, $username);
            $password = stripslashes($_REQUEST['log-password']);
            $password = mysqli_real_escape_string($conn, $password);
            // Check user is exist in the database
            $query    = "SELECT * FROM `users` WHERE username='$username'
                         AND password='" . md5($password) . "'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $rows = mysqli_num_rows($result);
            if ($rows >= 1) {
                $_SESSION['log-username'] = $username;
                // Redirect to user menu page
                header("Location: menu.php");
            } else {
                echo "<div class='form box-light center-all'>
                      <h3>Nom d'utilisateur ou mot de passe incorrect.</h3><br/>
                      <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                      </div>";
            }
        }
    ?>
    <main class="home-page">
        <a href="connection.html" class="mob-log-button mobile-element">Connexion</a>
        <a href="register.html" class="mob-reg-button mobile-element">Inscription</a>
        <div class="connection-box desktop-only-element">
            <h1 class="log-box-title">Connexion</h1>
            <form name="login-form">
                <label for="login">Nom d'utilisateur</label>
                <input type="text" name="log-username" id="log-username" class="field" required>
                <label>Mot de passe</label>
                <input type="password" name="log-password" id="log-password" class="field" required>
                <div class="stay-logged-check">
                    <input type="checkbox" name="stay-logged" id="stay-logged">
                    <p>Rester connecté</p>
                </div>
                <button type="submit" class="submit">Se connecter</button>
            </form>
        </div>
        <div class="connection-box desktop-only-element">
            <h1 class="log-box-title">Créer un compte</h1>
            <form name="register-form">
                <label>Email</label>
                <input type="email" name="email" id="email" class="field" required>
                <label>Nom d'utilisateur</label>
                <div class="id-tooltip">
                    <input type="text" name="username" id="username" class="field" pattern="\w{3,16}" required>
                    <span class="id-tooltiptext">Indiquez un nom d'utilisateur unique. Celui-ci doit contenir minimum 3 caractères et maximum 16 caractères.</span>
                </div>
                <label>Mot de passe</label>
                <div class="password-tooltip">
                    <input type="password" name="password" id="password" class="field" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                    <span class="password-tooltiptext">Le mot de passe doit contenir minimum 8 caractères, des minuscules et au moins une majuscule.</span>
                </div>
                <button type="submit" class="submit">S'inscrire</button>
            </form>
        </div>
    </main>
    <footer>
        <p>Shizumi by Soren - Shizumi 2023</p>
        <a href="contact.html">Contactez-nous</a>
    </footer>
</body>
</html>