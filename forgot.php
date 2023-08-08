<?php 

session_start();
$error = array();

require "mail.php";

if(!$con = mysqli_connect("localhost", "root", "", "project01")) {
    die("couldn't connect");
}
$mode = "enter_email";
if(isset($_GET['mode'])) {
    $mode = $_GET['mode'];
}

// ? Si un formulaire a été rempli on exécute un switch qui regarde le paramètre dans l'URL
if(count($_POST) > 0) {
    switch ($mode) {
        case 'enter_email':
            // * Ce paramètre permet de demander l'adresse email à qui on va envoyer un code
            $email = $_POST['email'];
            // Validation de l'email
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                $error[] = "Adresse email invalide";
            } elseif(!valid_email($email)){
                $error[] = "Adresse email invalide";
            } else {
            // Tout se passe bien, alors on passe à l'étape suivante
            $_SESSION['forgot']['email'] = $email;
            send_email($email);
            // On recharge le formulaire mais avec le paramètre enter_code pour demander le code envoyé par email.
            header("Location: forgot.php?mode=enter_code");
            die;
            }
            break;
            case 'enter_code':
                // * Le code a donc été envoyer, maintenant on demande de rentrer le code dans le formulaire.
                $code = $_POST['code'];
                $result =  is_code_correct($code);
                if($result == "the code is correct"){
                    $_SESSION['forgot']['code'] = $code;
                    // Le code est valide, on passe donc à l'étape suivante, de la même manière qu'avant
                    header("Location: forgot.php?mode=enter_password");
                    die;
                } else {
                    $error[] = $result;
                }
                break;
                case 'enter_password':
                    // * On demande à l'utilisateur de saisir un nouveau mot de passe
                    $password = $_POST['pass'];
                    $password2 = $_POST['pass2'];
                    if($password !== $password2) {
                        $error[] = "Passwords do not match";
                    } elseif(!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])){
                        // Si il y a ni email ni code, on redirige vers le formulaire de départ, en cas de bug
                        header("Location: forgot.php");
                        die;
                    }else {
                        save_password($password);
                        if(isset($_SESSION['forgot'])) {
                            unset($_SESSION['forget']);
                        }
                        header("Location: login.php");
                        die;
                    }
                    break;
                    default:
                        break;
    }
}
function send_email($email) {
    global $con;  
    $expire = time() + (60 * 2);
    $code = rand(100000,999999);
    $email = addslashes($email);
    $query = "INSERT INTO codes (email,code,expire) VALUE ('$email','$code','$expire')";
    mysqli_query($con,$query);
    //send email here
    //mail($mail, 'Website: reset password', 'your code is ' . $code);
    // send_mail($email,'[ASAKI] Shizumi account password reset', "Hi ! It seems you forgot your password ! So, here is your code: " . $code . "<br><br><br>" . "<i>If you aren't originator of this request, please contact us IMMEDIATELY.</i>");
    send_mail($email,'[ASAKI] Shizumi account password reset', '
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href=\'https://fonts.googleapis.com/css?family=PT Sans\' rel=\'stylesheet\'>
        <link rel="stylesheet" href="email.css">
    </head>
    <body>
        <table border="0" cellspacing="0" cellpadding="0" role="presentation" width="100%">
            <tr>
                <td bgcolor="transparent" style="font-size: 0;">&​nbsp;</td>
                <td bgcolor="#505050" width="600" class="box">
                  <h1>Shizumi account</h1>
                  <p>Hi ! It seems you forgot your password ! So, here is your code: <b>' . $code . '</b></p>
                </td>
                <td bgcolor="transparent" style="font-size: 0;">&​nbsp;</td>
            </tr>
          </table>
    </body>
    </html>
    ');
}
function save_password($password) {
    global $con;
    $email = addslashes($_SESSION['forgot']['email']);
    $query = "UPDATE users SET password = ? WHERE email = ? LIMIT 1";
    mysqli_query($con,$query);
    $stmt = mysqli_prepare($con, $query);
    if ($stmt) {
        // On chiffre le mot de passe
        $hashedPassword = sha1(md5($password) .md5($password));
        $hashedEmail = md5(md5($email) .strlen($email));

        // On attribue les valeurs aux paramètres STMT
        mysqli_stmt_bind_param($stmt, "ss", $hashedPassword, $hashedEmail);

        // On exécute la requête
        mysqli_stmt_execute($stmt);

        // Vérification des erreurs
        if (mysqli_stmt_affected_rows($stmt) == 1) {
            echo "Mot de passe mis à jour avec succès.";
        } else {
            echo "Erreur lors de la mise à jour du mot de passe.";
        }

        // Fermer le statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Erreur lors de la préparation de la requête.";
    }

}
function valid_email($email) {
    include_once("database/database.php");
    $hashedEmail = md5(md5($email) . strlen($email));
    $sql = 'SELECT * FROM users WHERE email = :email';
    $qry = $cnn->prepare($sql);
    $qry->execute([':email' => $hashedEmail]);
    $user = $qry->fetch();
    if ($email === $user['email']) {
        return true;
    } else {
        return false;
    }
}
function is_code_correct($code) {
    global $con;
    $code = addslashes($code);
    $expire = time();
    $email = addslashes($_SESSION['forgot']['email']);
    $query = "SELECT * FROM codes WHERE code = ? AND email = ? ORDER BY id DESC LIMIT 1";
    $stmt = mysqli_prepare($con, $query);
    if ($stmt) {
        // Attribuer les valeurs aux paramètres
        mysqli_stmt_bind_param($stmt, "ss", $code, $email);

        // Exécution de la requête préparée
        mysqli_stmt_execute($stmt);

        // Récupération des résultats
        $result = mysqli_stmt_get_result($stmt);

        // Utilisation des résultats
        if ($row = mysqli_fetch_assoc($result)) {
            if($row['expire'] > $expire) {
                return "Code incorrect";
            } else {
                return "Code expiré, veuillez recommencer.";
            }
        } else {
            mysqli_stmt_close($stmt);
            return "Code incorrect";
        }
    } else {
        echo "Erreur lors de la préparation de la requête.";
    }
    
}

 
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=PT Sans' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Mot de passe oublié - Shizumi</title>
</head>
<body>
           <?php 
            
            switch ($mode) {
                case 'enter_email':
                    ?>
                    <form method="post" action="forgot.php?mode=enter_email" class="box-light box-padding-30">
                        <h1>Mot de passe oublié</h1>
                        <p class="italic">Pour vérifier votre identité, un code vous sera envoyé à l'email spécifié.</p>        
                        <span style="font-size: 12px; color:red;">
                        <?php 
                        foreach ($error as $err) {
                            echo $err . "<br>";
                        }
                        ?>
                        </span>     
                        <input type="email" name="email" placeholder="Email"><br>
                        <br style="clear: both;">
                        <input type="submit" value="next" class="green-button">
                        <br><br>
                        <div>
                            <a href="index.php">Connexion</a>
                        </div>
                    </form>
                <?php
                    break;

                    case 'enter_code':
                        ?>
                        <form method="post" action="forgot.php?mode=enter_code">
                            <h1>Mot de passe oublié</h1>
                            <p>Entrez le code envoyé à <?php echo $_SESSION['forgot']['email']; ?></p>

                            <span style="font-size: 12px; color:red;">
                                <?php 
                                foreach ($error as $err) {
                                    echo $err . "<br>";
                                }
                                ?>
                            </span>

                            <input type="text" name="code" placeholder="123456"><br>
                            <br style="clear: both;">
                            <input type="submit" value="Suivant" class="green-button">
                            <a href="forgot.php" class="red-button">
                                <input type="button" value="Retour">
                            </a>
                            <br><br>
                            <div>
                                <a href="login.php">Connexion</a>
                            </div>
                        </form>
                    <?php
                        break;

                    case 'enter_password':
                        ?>
                        <form method="post" action="forgot.php?mode=enter_password">
                            <h1>Forgot Password</h1>
                            <p>Entrez le nouveau mot de passe</p>
                        
                            <span style="font-size: 12px; color:red;">
                                <?php 
                                foreach ($error as $err) {
                                echo $err . "<br>";
                                }
                                ?>
                            </span>
                         
                            <input type="text" name="pass" placeholder="New password"><br>
                            <input type="text" name="pass2" placeholder="Retype password"><br>
                            <br style="clear: both;">
                            <input type="submit" value="next" style="float: right;">
                            <a href="forgot.php" class="yellow-button">
                                <input type="button" value="Recommencer">
                            </a>
                            <br><br>
                            <div>
                                <a href="index.php" class="green-button">Connexion</a>
                            </div>
                        </form>
                    <?php
                        break;
                    default:
                        break;
            }

           
           ?>
    
</body>
</html>