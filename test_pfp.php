<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://fonts.googleapis.com/css?family=PT Sans' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Changement de photo de profil - Shizumi</title>
</head>
<body>
    <?php
    // Connectez-vous à la base de données ici (utilisez les informations de connexion appropriées)
    $db_host = 'localhost';
    $db_user = 'root';
    $db_password = '';
    $db_name = 'shizumi';
    
    // Connexion à la base de données
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    // Vérifiez la connexion à la base de données
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Récupérez le chemin de la photo de profil de l'utilisateur depuis la base de données
    $user_id = 1; // Remplacez 1 par l'ID de l'utilisateur actuel
    $sql = "SELECT profile_picture, default_profile_picture FROM users WHERE id=$user_id";
    $result = $conn->query($sql);
    $profile_photo_path = "";
    $default_profile_pic_path = "";
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $profile_photo_path = $row['profile_picture'];
        $default_profile_pic_path = $row['default_profile_picture'];
    }

    // Vérifiez si l'utilisateur a soumis le formulaire pour changer la photo de profil
    if (isset($_POST['submit'])) {
        // Vérifiez si une photo a été téléchargée avec succès
        if ($_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
            // Vérifiez que le fichier est une image (vous pouvez ajouter d'autres vérifications, par exemple sur la taille, le format, etc.)
            $mime_type = mime_content_type($_FILES['profile_picture']['tmp_name']);
            if (strpos($mime_type, 'image') === 0) {
                // Déplacez le fichier téléchargé vers le dossier de stockage sur le serveur (assurez-vous que le dossier existe)
                $target_dir = "database/players/picture";
                $target_file = $target_dir . basename($_FILES['profile_picture']['name']);
                move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file);

                // Enregistrez le chemin de la nouvelle photo de profil de l'utilisateur dans la base de données
                $sql = "UPDATE users SET profile_picture='$target_file' WHERE id=$user_id";
                $conn->query($sql);
                
                // Si l'utilisateur avait déjà une photo de profil, supprimez-la du serveur
                if ($profile_photo_path !== "") {
                    unlink($profile_photo_path);
                }
            }
        }
    }

    // Vérifiez si l'utilisateur a soumis le formulaire pour réinitialiser la photo de profil
    if (isset($_POST['reset'])) {
        // Réinitialisez le chemin de la photo de profil de l'utilisateur à la photo de profil par défaut dans la base de données
        $sql = "UPDATE users SET profile_photo='$default_profile_pic_path' WHERE id=$user_id";
        $conn->query($sql);

        // Si l'utilisateur avait une photo de profil, supprimez-la du serveur
        if ($profile_photo_path !== "") {
            unlink($profile_photo_path);
        }
    }
    ?>
    <h1>Changement de photo de profil</h1>
    <div>
        <?php if ($profile_photo_path !== ""): ?>
            <img src="<?php echo $profile_photo_path; ?>" alt="Photo de profil">
        <?php else: ?>
            <img src="<?php echo $default_profile_pic_path; ?>" alt="Photo de profil par défaut">
        <?php endif; ?>
    </div>
    <form action="profile.php" method="post" enctype="multipart/form-data">
        <label for="profile_photo">Télécharger une nouvelle photo de profil :</label>
        <input type="file" name="profile_photo" id="profile_photo">
        <input type="submit" name="submit" value="Changer la photo de profil">
        <input type="submit" name="reset" value="Réinitialiser">
    </form>
</body>
</html>
