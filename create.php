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
</html>
<?php
include("database/database.php");
include("default_pfp.php");
// verification de jetons de CSRF à evoyer
$username= isset($_POST['username']) ? $_POST['username'] : '';
$email= isset($_POST['email']) ? $_POST['email'] : '';
$password= isset($_POST['password']) ? $_POST['password'] : '';
session_start();
// initialisation du tableau d'erreur
$erreurs=[];
// validation du pseudo
if(preg_match("/^[A-Za-z0-9\x{00c0}-\x{00ff}]{5,20}/", $username)=== 0){
  // ajout de message d'erreur
  $erreurs["username"]="Le pseudo n'est pas valide";
}
// verification d'email
if(preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $email)=== 0){
  // ajout de message d'erreur
  $erreurs["email"]="Email invalide.";
}
//valider $pass
if(preg_match("/^[A-Za-z0-9_$]{8,}/", $password)=== 0){
  //ajouter un message d'erreur dans le tableau $erreurs
  $erreurs["password"] = "Le mot de passe est invalide. 8 caractères minimum, au moins une lettre, un chiffre et une majuscule.";
}

// mettre en place une protection xss
$username= htmlspecialchars($username);
$email= htmlspecialchars($email);
$password= htmlspecialchars($password);

// Si il n'y pas d'erreur, l'inscription continue, sinon on les affiches avec implode()
if(count($erreurs) > 0){
  $_SESSION["compte-données"]["username"]=$username;
  $_SESSION["compte-données"]["email"]=$email;
  $_SESSION["compte-données"]["password"]=$password;
  $_SESSION["compte-données"]=$erreurs;
  echo '<div class="big-message box-light center-all">' . '<h2>Erreur:</h2>';
  echo '<p class="bold1">'. implode('</p><p class="bold1">' ,$erreurs) . '</p>';
  echo '<a href="index.php">Retour</a>' . '</div>';
  exit;
}
// Parcours le tableau des valeurs rentrées dans le formulaire
foreach($_POST as $key => $val){
  $params[':' . $key] = (isset($_POST[$key]) && !empty($_POST[$key])) ? htmlspecialchars($_POST[$key]) : null;
}

// Cryptage email et mot de passe
$params[':email']=md5(md5($params[":email"]) .strlen($params[':email']));
$params[':password']=sha1(md5($params[":password"]) .md5($params[':password']));

// Define default profile picture, and apply it as a profile picture
$params[':default_profile_picture'] = $randomPhoto;
$params[':admin'] = 0;

include("database/database.php");
// connexion avec la base de données
try {
  // Connexion à la BDD
  $cnn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
  // Options
  $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $cnn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  // Teste si le mail n'existe pas déjà
  $sql = 'SELECT COUNT(*) AS nb FROM users WHERE email=?'; // paramètre anonyme
  $qry = $cnn->prepare($sql); // prépare la requête
  $qry->execute(array($params[':email']));
  $row = $qry->fetch();
  //var_dump($row);
  if ($row['nb'] == 1) {
    echo '<div class="big-message box-light center-all">' . '<p class="bold1">Cette adresse mail existe déjà.</p>';
    echo '<a href="index.php">Retour</a>' . '</div>';
     //  header("location:index.php");
  } else {
    $sql = 'INSERT INTO users(username, email, password, profile_picture, default_profile_picture) VALUES(:username, :email, :password, :default_profile_picture, :default_profile_picture)';
    $qry = $cnn->prepare($sql);
    $qry->execute($params);
    // header('location:login.php?m=inscription');
    // header('location:textes.php')
    unset($cnn); // déconnexion
    echo '<div class="big-message box-light center-all">' . '<p class="bold1">Votre compte a bien été crée. Vous pouvez vous connecter.</p>';
    echo '<p><a href="index.php">Se connecter</a></p>' . '</div>';
  } 
} catch (PDOException $err) {
  $err->getMessage();
  /* dodif */
  $_SESSION["error"] = $err->getMessage();
  $_SESSION["compte-donnees"]["username"] = $username;
  $_SESSION["compte-donnees"]["email"] = $email;
  $_SESSION["compte-donnees"]["password"] = $password;
  header("location: error.php");//redirection avec le code HTTP 302
  exit;
}
?>