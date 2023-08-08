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
    <link rel="stylesheet" href="style.css">
    <title>Mise à jour du profil - Shizumi</title>
</head>
<body>
<?php 
if(isset($_GET['edit'])) {
  if (!empty($_GET['edit'])) {
    $edit = $_GET['edit'];
  } else {
    $_SESSION['error'] = "Une erreur est survenue: L'élément à modifier sur le profil n'est pas défini. Signalez ce problème aux développeurs.";
    header("Location: ../error.php");
  }
  
}
if (isset($_GET['username'])) {
    $username= !empty($_GET['username']) ? $_GET['username'] : '';

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
}
if (isset($_GET['first-name'])) {
    $firstname= !empty($_GET['first-name']) ? $_GET['first-name'] : '';

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
}
if (isset($_GET['email'])) {
    $email= !empty($_GET['email']) ? $_GET['email'] : '';

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
}
?>
</body>
</html>