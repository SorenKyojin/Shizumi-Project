
<?php

session_start();
$error = array();

require "mail.php";
require "database/delete-mail.php";
try {
    $pdo = new PDO("mysql:host=localhost;dbname=shizumi", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Couldn't connect: " . $e->getMessage());
}
send_email($email);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://fonts.googleapis.com/css?family=PT Sans' rel='stylesheet'>
    <script src="menu.js"></script>
    <script src="wallet.js"></script>
    <script src="popup.js"></script>
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Suppression du compte - Shizumi</title>
</head>
<body class="center-top">
    <form action="database/delete-account.php" class="box-light box-padding-30 center-top" method="post">
        <h1>Suppression du compte</h1>
        <p>Pour vérifier votre identité, entrez le code reçu par email. Une fois validé, le compte sera supprimé.</p>
        <span class="danger-text2">
            <?php
            foreach ($error as $err) {
                echo $err . "<br>";
            }
            ?>
        </span>
        <input type="text" name="code" placeholder="123456" class="field">
        <input type="submit" value="Confirmer" class="yellow-button" style="margin-bottom: 50px;">
        <a href="settings.php" class="blue-button remove-link-style">Annuler</a>
    </form>
</body>
</html>