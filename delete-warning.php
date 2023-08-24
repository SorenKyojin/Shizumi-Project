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
<body class="center-top-notxt">
    <div class="box-light box-padding-30 big-message2 delete-warning">
        <h1>Avertissement de suppression de compte</h1>
        <p>Si vous souhaitez supprimer votre compte, vous allez perdre la totalité de votre progression au sein de Shizumi.</p>
        <p>En supprimant votre compte, toutes les données vous concernant seront supprimées. En voici une liste:</p>
        <ul>
            <li>Nom d'utilisateur</li>
            <li>Identifiant unique</li>
            <li>Email</li>
            <li>Prénom</li>
            <li>Photo de profil</li>
            <li>Mot de passe</li>
            <li>Porte Monnaie Okane</li>
            <li>Collection</li>
            <li>Trophées</li>
            <li>Objets</li>
            <li>Jardin</li>
            <li>Plantes et engrais</li>
        </ul>
        <p class="danger-text1 danger-text-glow">Toutes ces données seront supprimées définitivement et seront irrécupérables.</p>
        <p>Pour vérifier votre identité, nous vous enverrons un code par email que vous collerez dans le formulaire suivant.</p>
        <div class="flex-row center-all">
            <a href="settings.php" class="blue-button remove-link-style" style="margin-right: 50px;">Annuler</a>
            <a href="delete.php" class="red-button remove-link-style" style="margin-left: 50px;">Continuer</a>
        </div>
        
    </div>
</body>
</html>