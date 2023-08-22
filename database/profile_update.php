<?php 
include("../database/database.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://fonts.googleapis.com/css?family=PT Sans' rel='stylesheet'>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <title>Mise à jour du profil - Shizumi</title>
</head>
<body>
<?php 
if(isset($_POST['username'])) {
  $edit = 'username';
}
if(isset($_POST['first-name'])) {
  $edit = 'first-name';
}
if(isset($_POST['email'])) {
  $edit = 'email';
}
if(!isset($_POST['username']) && !isset($_POST['first-name']) && !isset($_POST['email'])) {
  $_SESSION['error'] = "Il n'y a rien à modifier";
  header("Location: error.php");
}
if ($edit ==='username') {
  $username= !empty($_POST['username']) ? $_POST['username'] : '';
  $username= htmlspecialchars($username);
  if(preg_match("/^[A-Za-z0-9\x{00c0}-\x{00ff}]{3,16}/", $username)=== 0){
    // If username don't respect the regex we show this error
    echo '<script type="text/javascript">
      swal("Le nom d\'utilisateur doit contenir minimum 5 caractères et maximum 20 caractères.", {
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
              history.back();
              break;
            
            default:
              history.back();
          }
        });
    </script>';
  }
  include_once("database.php");
  $uuid = $_SESSION['useruniqueid'];
  $params[':username'] = $username;
  $params[':uuid'] = $uuid;
  try {
    // Connexion à la BDD
    $cnn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
    // Options
    $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $cnn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $sql = "UPDATE users SET username= :username WHERE id = :uuid";
    $qry = $cnn->prepare($sql);
    $qry->execute($params);
    echo '<script type="text/javascript">
      swal("Le nom d\'utilisateur a été modifié !", {
          title: "Succès",
          icon: "success",
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
              window.location.replace("../settings.php");
              break;
         
            default:
              window.location.replace("../settings.php");
          }
        });
      </script>';
  } catch (PDOException $err) {
    $err->getMessage();
    /* dodif */
    $_SESSION["error"] = $err->getMessage();
    header("location: ../error.php");//redirection avec le code HTTP 302
    exit;
  }
}
if ($edit === 'first-name') {
  $firstname= !empty($_POST['first-name']) ? $_POST['first-name'] : '';
  $firstname= htmlspecialchars($firstname);
  if(preg_match("/^[A-Za-z]{3,16}/", $firstname)=== 0){
      // If the firstname contains denied characters or is less than 3 characters or more than 16, we show this error
      echo '<script type="text/javascript">
      swal("Le prénom doit contenir minimum 3 caractères et maximum 16 caractères. Seule les lettres sont autorisées.", {
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
              history.back();
              break;
         
            default:
              history.back();
          }
        });
      </script>';
  }
  include_once("database.php");
  $uuid = $_SESSION['useruniqueid'];
  $params[':firstname'] = $firstname;
  $params[':uuid'] = $uuid;
  try {
    // Connexion à la BDD
    $cnn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
    // Options
    $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $cnn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $sql = "UPDATE users SET firstname= :firstname WHERE id = :uuid";
    $qry = $cnn->prepare($sql);
    $qry->execute($params);
    echo '<script type="text/javascript">
      swal("Le prénom a été modifié !", {
          title: "Succès",
          icon: "success",
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
              window.location.replace("../settings.php");
              break;
         
            default:
              window.location.replace("../settings.php");
          }
        });
      </script>';
  } catch (PDOException $err) {
    $err->getMessage();
    /* dodif */
    $_SESSION["error"] = $err->getMessage();
    header("location: ../error.php");//redirection avec le code HTTP 302
    exit;
  }
}
if ($edit === 'email') {
  $email= !empty($_POST['email']) ? $_POST['email'] : '';

  $email= htmlspecialchars($email);
  if(preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $email)=== 0){
      // If the email contains denied characters or doesn't respect the email address format we show this error
      echo '<script type="text/javascript">
      swal("Email invalide. L\'email doit respecter le format suivant: exemple@domaine.com", {
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
              history.back();
              break;
         
            default:
              history.back();
          }
        });
      </script>';
  }
  $uuid = $_SESSION['useruniqueid'];
  $params[':email'] = $email;
  $params[':uuid'] = $uuid;
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

    if ($row['nb'] == 1) {
      echo '<script type="text/javascript">
      swal("L\'adresse email existe déjà.", {
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
              history.back();
              break;
         
            default:
              history.back();
          }
        });
      </script>';
    } else {
      //var_dump($row);
      $sql = "UPDATE users SET email= :email WHERE id = :uuid";
      $qry = $cnn->prepare($sql);
      $qry->execute($params);
      echo '<div class="box box-padding-30">' . '<h1>Succès</h1>' . '<p>Votre adresse email a été modifié avec succès. Vous devrez vous reconnecter.</p>';
      echo '<a href="../index.php" class="blue-button">Continuer</a>' . '</div>';
      session_destroy();

    }
    
  } catch (PDOException $err) {
    $err->getMessage();
    /* dodif */
    $_SESSION["error"] = $err->getMessage();
    header("location: ../error.php");//redirection avec le code HTTP 302
    exit;
  }
}
?>
</body>
</html>