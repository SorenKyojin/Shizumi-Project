
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
    <title>Avertissement de suppression du compte - Shizumi</title>
</head>
<body class="flex-column">
    <?php
    session_start();
    include("database.php");
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=shizumi", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $err) {
        $_SESSION["error"] = $err->getMessage();
        header("Location: ../error.php");
    }

    $code = $_SESSION['code'];
    function is_code_correct($code, $pdo)
    {
        $code = addslashes($code);
        $expire = time();
        $email = addslashes($_SESSION['email']);
        $query = "SELECT * FROM codes WHERE code = :code AND email = :email ORDER BY id DESC LIMIT 1";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row['expire'] > $expire) {
                return "Code valide";
            } else {
                return "Code expiré, veuillez recommencer.";
            }
        } else {
            return "Code incorrect";
        }
    }

    $code = $_POST['code'];
    $result = is_code_correct($code, $pdo);
    if ($result == "Code valide") {
        $params[':email'] = $_SESSION['email'];
        $sql = 'DELETE FROM users WHERE email= :email'; // paramètre anonyme
        $qry = $pdo->prepare($sql); // prépare la requête
        $qry->execute($params[':email']);
        session_destroy();
        echo '
        <img src="../img/shizumi-sad.png" style="border-radius: 10px;"></img>
        <div class="box-light box-padding-30 big-message2">
            <h1>Au revoir</h1>
            <p>Nous vous remercions d\'avoir utilisé Shizumi.</p>
            <p>Si l\'expérience de jeu ne vous a pas plu, nous vous invitons à <a href="../contact.php">nous contacter</a>. Nous sommes ouvert à toute suggestion.</p>
            <a href="../index.php" class="blue-button remove-link-style">Accueil</a>
        </div>';
    } else {
        $error[] = "Code invalide";
        header("Location: ../delete.php");
    }
    ?>
</body>
</html>