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
// Installez Better Comments pour avoir la mise en couleur des commentaires.
// * PARTIE INSCRIPTION (Côté droit de l'accueil)

// ? On se connecte à la BDD
include("database/database.php");

// ? On regarde que contiennent les champs
// On stocke chaque valeur dans une variable correspondante. Si <Champ> a une valeur, on l'attribue à la variable. Sinon, la variable devient nulle.
// Dans notre cas, on utilise isset() pour dire si $_POST pour le champ existe. Un champ vide n'envoie pas de POST.
$username= isset($_POST['username']) ? $_POST['username'] : '';
$email= isset($_POST['email']) ? $_POST['email'] : '';
$password= isset($_POST['password']) ? $_POST['password'] : '';

// * On lance une session pour pouvoir sauvegarder les données dans le champs pour pas les perdre.
session_start();

$errors = [];
// ? On met en place les protections contre la faille XSS
$username= htmlspecialchars($username);
$email= htmlspecialchars($email);
$password= htmlspecialchars($password);

// ? On vérifie si le nom d'utilisateur est compris entre 5 et 20 caractères.
// On accepte seulement les accents français en caractère spéciaux.
// Ainsi, celui qui le souhaite pourrait s'appeler laLégendedu93 ou encore PépéaPété
if(preg_match("/^[A-Za-z0-9\x{00c0}-\x{00ff}]{5,20}/", $username)){
    // On ajoute le message d'erreur
    $errors["pseudo"]="Le nom d'utilisateur n'est pas valide: Entre 5 et 20 caractères, Chiffres et lettres (accents français acceptés)";
}
// ? On vérifie si l'email respecte la structure d'une adresse email.
if(preg_match("/^[A-Za-zÀ-ú]{1,}@/", $email)){
    // On ajoute le message d'erreur
    $errors["email"]="L'email n'est pas valide";
}
// ? On vérifie si le mot de passe contient minimum 8 caractères.
// Le mot de passe peut contenir aussi des majuscules
if(preg_match("/^[A-Za-z0-9_$]{8,}/", $password)){
    // On ajoute le message d'erreur
    $errors["pass"] = "Le mot de passe doit contenir au minimum 8 caractères. Le mot de passe peut contenir des lettres, des chiffre ainsi que \"$\" et \"_\".";
}

if(count($errors) > 0){
    $_SESSION["account-data"]["username"]=$username;
    $_SESSION["account-data"]["email"]=$email;
    $_SESSION["account-data"]["password"]=$password;
    $_SESSION["account-data"]=$errors;
    echo '<div class="box-light big-message">' . '<p>Une erreur est survenue.</p>' . '<p class="bold1">';
    echo print_r(implode('</p><p class="bold1">', $errors)) . '</p>' . '<p><a href="index.php">Retour</a></p>' . '</div>';
    exit;
}

// ? On parcours le tableau SQL
foreach($_POST as $key => $val){
    $params[':' . $key] = (isset($_POST[$key]) && !empty($_POST[$key])) ? htmlspecialchars($_POST[$key]) : null;
}

// ? On crypte les emails et mots de passes
$params[':email']=md5(md5($params[":email"]) .strlen($params[':email']));
$params[':password']=sha1(md5($params[":password"]) .strlen($params[':password']));

include("database/database.php");
try {
    // ? Connexion à la BDD
    $cnn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
    $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $cnn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // ? On vérifie si l'email n'est pas déjà dans la BDD
    $sql = 'SELECT COUNT(*) AS nb FROM users WHERE email=?'; // paramètre anonyme
    $qry = $cnn->prepare($sql); // prépare la requête
    $qry->execute(array($params[':email']));
    $row = $qry->fetch();
    if ($row['nb'] == 1) {
        echo '<div class="box-light big-message">' . '<p>L\'email existe déjà.</p>';
        echo '<p><a href="index.php">Retour</a></p>' . '</div>';
    } else {
        $sql = 'INSERT INTO users(username, email, password) VALUES(:username, :email, :password)';
        $qry = $cnn->prepare($sql);
        $qry->execute($params);
        unset($cnn);
        echo '<div class="box-light big-message">' . '<p>Votre compte a été crée.</p>';
        echo '<p><a href="index.php">Connectez-vous</a> pour continuer.</p>' . '</div>';
    }
  } catch (PDOException $err) {
    $err->getMessage();
    $_SESSION["sql-error"] = $ex->getMessage();
    $_SESSION["account-data"]["username"]=$username;
    $_SESSION["account-data"]["email"]=$email;
    $_SESSION["account-data"]["password"]=$password;
    header("location: compte.php"); //redirection avec le code HTTP 302
    exit;
  }
?>