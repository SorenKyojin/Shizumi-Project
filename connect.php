<?php
include("database/database.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des valeurs du formulaire
    $email = isset($_POST['log-username']) ? $_POST['log-username'] : '';
    $password = isset($_POST['log-password']) ? $_POST['log-password'] : '';

    // Hachage des identifiants pour les comparer avec ceux stockés dans la base de données
    $hashedPassword = sha1(md5($password) . md5($password));

    // Vérification des identifiants dans la base de données
    include_once("database/database.php");
    try {
        // Connexion à la base de données
        $cnn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
        $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $cnn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        // Requête pour récupérer l'utilisateur correspondant aux identifiants fournis
        $sql = 'SELECT * FROM users WHERE email = :email';
        $qry = $cnn->prepare($sql);
        $qry->execute([':email' => $email]);
        $user = $qry->fetch();

        if ($user && $user['password'] === $hashedPassword) {
            // Connexion réussie, enregistrement de l'utilisateur dans la session
            $_SESSION['user'] = $user;
            $_SESSION['email'] = $email;
            // Récupérez la valeur de l'email depuis $_SESSION["email"]
            $reqemail = $_SESSION["email"];

            // Envoyez la valeur de l'email vers le serveur Node.js
            // Assurez-vous d'adapter l'URL à votre serveur Node.js
            $url = 'http://localhost/projets/shizumi/getPlayerEmail';
            $data = array('email' => $reqemail);

            $options = array(
              'http' => array(
                'method' => 'POST',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($data)
              )
            );
            $context = stream_context_create($options);
            $result = file_get_contents($url, false, $context);

            header('Location: menu.php'); // Redirection vers la page de tableau de bord après connexion
            exit();
        } else {
            // Identifiants invalides, affichage d'un message d'erreur
            echo '<div class="big-message box-light center-all">' . '<h2>Erreur</h2>' . '<p class="bold">Mot de passe ou email invalide. Veuillez réessayer.</p>' . '</div>';
        }
    } catch (PDOException $err) {
        // Gestion des erreurs de base de données
        $errordisplay = $err->getMessage();
        echo '<div class="big-message box-light center-all">' . 'Erreur de connexion à la base de données : ' . $errordisplay . '</div>';
    }
}
?>
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
    <title>Shizumi - Connexion</title>
</head>
<script>
    userEmail = "<?php echo $email ?>";
</script>
</html>