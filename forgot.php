<?php

session_start();
$error = array();

require "mail.php";

try {
    $pdo = new PDO("mysql:host=localhost;dbname=shizumi", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Couldn't connect: " . $e->getMessage());
}

$mode = "enter_email";
if (isset($_GET['mode'])) {
    $mode = $_GET['mode'];
}

// Something is posted
if (count($_POST) > 0) {

    switch ($mode) {
        case 'enter_email':
            // Code...
            $email = $_POST['email'];
            // Validate the email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !valid_email($email, $pdo)) {
                $error[] = "Please enter a valid email";
            } else {
                $_SESSION['forgot']['email'] = $email;
                send_email($email);

                header("Location: forgot.php?mode=enter_code");
                die;
            }
            break;

        case 'enter_code':
            // Code...
            $code = $_POST['code'];
            $result = is_code_correct($code, $pdo);

            if ($result == "the code is correct") {

                $_SESSION['forgot']['code'] = $code;
                header("Location: forgot.php?mode=enter_password");
                die;
            } else {
                $error[] = $result;
            }
            break;

        case 'enter_password':
            // Code...
            $password = $_POST['pass'];
            $password2 = $_POST['pass2'];

            if ($password !== $password2) {
                $error[] = "Passwords do not match";
            } elseif (!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])) {
                header("Location: forgot.php");
                die;
            } else {
                save_password($password, $pdo);
                if (isset($_SESSION['forgot'])) {
                    unset($_SESSION['forgot']);
                }
                header("Location: login.php");
                die;
            }
            break;

        default:
            // Code...
            break;
    }
}

function send_email($email)
{
    global $pdo;

    $expire = time() + (60 * 2);
    $code = rand(100000, 999999);
    $email = addslashes($email);

    $query = "INSERT INTO codes (email, code, expire) VALUES (:email, :code, :expire)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':code', $code);
    $stmt->bindParam(':expire', $expire);
    $stmt->execute();

    // Send email here
    //mail($mail, 'Website: reset password', 'your code is ' . $code);
    send_mail($email, 'Password Reset', "Your code is " . $code);
}

function save_password($password, $pdo)
{
    $password = sha1(md5($password) .md5($password));
    $email = addslashes($_SESSION['forgot']['email']);

    $query = "UPDATE users SET password = :password WHERE email = :email LIMIT 1";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
}

function valid_email($email, $pdo)
{
    $email = addslashes($email);
    $email = md5(md5($email) .strlen($email));
    $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        return true;
    }

    return false;
}

function is_code_correct($code, $pdo)
{
    $code = addslashes($code);
    $expire = time();
    $email = addslashes($_SESSION['forgot']['email']);

    $query = "SELECT * FROM codes WHERE code = :code AND email = :email ORDER BY id DESC LIMIT 1";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':code', $code);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row['expire'] > $expire) {
            return "the code is correct";
        } else {
            return "the code is expired";
        }
    } else {
        return "the code is incorrect";
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

<body class="fg-body">

    <?php
    switch ($mode) {
        case 'enter_email':
            ?>
            <form method="post" action="forgot.php?mode=enter_email" class="box-light fg-box box-padding-30">
                <h1>Mot de passe oublié</h1>
                <p class="italic">Pour vérifier votre identité, un code vous sera envoyé à l'email spécifié.</p>        
                <span style="font-size: 12px; color:red;">
                <?php 
                foreach ($error as $err) {
                    echo $err . "<br>";
                }
                ?>
                </span>     
                <input type="email" name="email" placeholder="Email" class="field">
                <input type="submit" value="Suivant" class="fg-next">
                <div>
                    <a href="index.php">Connexion</a>
                </div>
            </form>
        <?php
            break;

            case 'enter_code':
                ?>
                <form method="post" action="forgot.php?mode=enter_code" class="box-light fg-box box-padding-30">
                    <h1>Mot de passe oublié</h1>
                    <p>Entrez le code envoyé à <?php echo $_SESSION['forgot']['email']; ?></p>

                    <span style="font-size: 12px; color:red;">
                        <?php 
                        foreach ($error as $err) {
                            echo $err . "<br>";
                        }
                        ?>
                    </span>

                    <input type="text" name="code" placeholder="123456" class="field">
                    <input type="submit" value="Suivant" class="fg-next">
                    <a href="forgot.php" class="fg-retry remove-link-style">Recommencer</a>
                    <div>
                        <a href="login.php">Connexion</a>
                    </div>
                </form>
            <?php
                break;

            case 'enter_password':
                ?>
                <form method="post" action="forgot.php?mode=enter_password" class="box-light fg-box box-padding-30">
                    <h1>Forgot Password</h1>
                    <p>Entrez le nouveau mot de passe</p>
                
                    <span style="font-size: 12px; color:red;">
                        <?php 
                        foreach ($error as $err) {
                        echo $err . "<br>";
                        }
                        ?>
                    </span>
                 
                    <input type="password" name="pass" placeholder="New password" class="field">
                    <input type="password" name="pass2" placeholder="Retype password" class="field">
                    <input type="submit" value="Terminer" class="fg-finish box-padding-10">
                    <a href="forgot.php" class="fg-retry remove-link-style">Recommencer</a>
                    <div>
                        <a href="index.php">Connexion</a>
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
