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
    <title>Shizumi - Inscription</title>
</head>
</html>
<?php
//? Connexion à la base de données
include("database/database.php");

//? Tirage d'une photo de profil aléatoire
include("default_pfp.php");

//? Initialisation des paramètre PHPMailer, SMTP pour l'envoi de l'email
require("mail.php");


//? On vérifie si les champs ont été remplis. Si ce n'est oas le cas, on assigne une valeur non définie, qui sera détecté avec les preg_match().
$username= isset($_POST['username']) ? $_POST['username'] : '';
$email= isset($_POST['email']) ? $_POST['email'] : '';
$password= isset($_POST['password']) ? $_POST['password'] : '';
session_start();

$erreurs=[];
//? Validation du nom d'utilisateur
if(preg_match("/^[A-Za-z0-9\x{00c0}-\x{00ff}]{5,20}/", $username)=== 0){
  $erreurs["username"]="Le nom d'utilisateu n'est pas valide";
  // On ajoute le message d'erreur dans un tableau
}
//? Vérification d'email
if(preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $email)=== 0){
  $erreurs["email"]="Email invalide.";
}
//? Vérification du mot de passe
if(preg_match("/^[A-Za-z0-9_$]{8,}/", $password)=== 0){
  $erreurs["password"] = "Le mot de passe est invalide. 8 caractères minimum, au moins une lettre, un chiffre et une majuscule.";
}

//? Protection contre la faille XSS
$username= htmlspecialchars($username);
$email= htmlspecialchars($email);
$password= htmlspecialchars($password);

//?  Préparation de l'email de succès d'inscription
require("database/register-mail.php");

//? Si il n'y pas d'erreur, l'inscription continue, sinon on les affiches toutes avec implode()
if(count($erreurs) > 0){
  $_SESSION["compte-données"]["username"]=$username;
  $_SESSION["compte-données"]["email"]=$email;
  $_SESSION["compte-données"]["password"]=$password;
  $_SESSION["compte-données"]=$erreurs;

  //? Le implode() va permettre d'afficher plusieurs erreur si plusieurs champs du formulaire n'ont pas été respectés

  echo '<div class="big-message box-light center-all">' . '<h2>Erreur:</h2>';
  echo '<p class="bold1">'. implode('</p><p class="bold1">' ,$erreurs) . '</p>';
  echo '<a href="index.php">Retour</a>' . '</div>';
  exit;
}
//? Parcours le tableau des valeurs rentrées dans le formulaire et crée un paramètre pour chaque type de valeur
//? Par exemple: "password" deviendra ":password", "username" deviendra ":username"...
foreach($_POST as $key => $val){
  $params[':' . $key] = (isset($_POST[$key]) && !empty($_POST[$key])) ? htmlspecialchars($_POST[$key]) : null;
}

// Cryptage email et mot de passe
// $params[':email']=md5(md5($params[":email"]) .strlen($params[':email']));
$params[':password']=sha1(md5($params[":password"]) .md5($params[':password']));

// Définit une photo de profil par défaut aléatoire parmis une dizaine
$params[':default_profile_picture'] = $randomPhoto;
$params[':admin'] = 0;

include("database/database.php");
try {
  // Connexion à la BDD
  $cnn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
  // Options PHP pour activer l'affichage des erreurs lié à MySQL et PDO.
  $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $cnn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

  //? Teste si le mail n'existe pas déjà
  $sql = 'SELECT COUNT(*) AS nb FROM users WHERE email=?';
  $qry = $cnn->prepare($sql);
  $qry->execute(array($params[':email']));
  $row = $qry->fetch();
  //var_dump($row);
  if ($row['nb'] == 1) {
    //? L'adresse email existe déjà
    echo '<script type="text/javascript">
      swal("L\'adresse email existe déjà !", {
          title: "Erreur",
          icon: "error",
          buttons: {
            confirm: {
              text: "Ok",
              value: "close",
            }
          }
        })
        .then((value) => {
          switch (value) {
         
            case "close":
              window.location.replace("index.php");
              break;
         
            default:
              window.location.replace("index.php");
          }
        });
      </script>';
    // echo '<div class="big-message box-light center-all">' . '<p class="bold1">Cette adresse mail existe déjà.</p>';
    // echo '<a href="index.php">Retour</a>' . '</div>';
  } else {
    $sql = 'INSERT INTO users(username, email, password, profile_picture, default_profile_picture) VALUES(:username, :email, :password, :default_profile_picture, :default_profile_picture)';
    $qry = $cnn->prepare($sql);
    $qry->execute($params);
    unset($cnn);
    send_reg_email($email); // Envoie un email pour annoncer le succès de l'inscription.
    echo '<script type="text/javascript">
      swal("Compte crée avec succès ! Vous pouvez vous connecter !", {
          title: "Succès",
          icon: "success",
          buttons: {
            confirm: {
              text: "Se connecter",
              value: "close",
            }
          }
        })
        .then((value) => {
          switch (value) {
         
            case "close":
              window.location.replace("index.php");
              break;
         
            default:
              window.location.replace("index.php");
          }
        });
      </script>';
    // echo '<div class="big-message box-light center-all">' . '<p class="bold1">Votre compte a bien été crée. Vous pouvez vous connecter.</p>';
    // echo '<p><a href="index.php">Se connecter</a></p>' . '</div>';
  } 
} catch (PDOException $err) {
  $err->getMessage();
  /* dodif */
  $_SESSION["error"] = $err->getMessage();
  $_SESSION["compte-donnees"]["username"] = $username;
  $_SESSION["compte-donnees"]["email"] = $email;
  $_SESSION["compte-donnees"]["password"] = $password;
  header("location: error.php"); // Redirection sur la page d'erreur avec l'erreur en mémoire
  exit;
}
?>