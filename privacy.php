<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=PT Sans' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Politique de Confidentialité - Shizumi</title>
</head>
<body class="center-top">
<h1>Politique de Confidentialité de Shizumi</h1>
    <div class="box box-padding-30">
        <h3>0. Préambule et léxique</h3>
        <p>
            L'API Shizumi est un programme, constituant le coeur de Shizumi, qui est modulable et permet le fonctionnement complet de
            Shizumi. L'API Shizumi fonctionne entièrement en Node.JS et Express.JS.
            Le système ASAKI est le programme lié à la base de donnée, écrit en PHP qui permet le traitement de chaque requête de compte.
            Le système ASAKI intéragit également avec l'API pour accéder aux informations de l'utilisateur.
            Les Okanes constituent la monnaie virtuelle du jeu, signifiant par ailleurs "argent" en japonais.
        </p>
    </div>
    <div class="box box-padding-30">
        <h3>1. Envoi et Utilisation des données</h3>
        <p>
            Sur Shizumi, les données que vous pouvez envoyer sont les suivantes:
            - Une adresse email, utilisée pour se connecter, et par l'API Shizumi afin d'accéder à vos informations de jeu
            - Un mot de passe qui est crypté, utilisé uniquement pour la connexion à votre compte
            - Une photo, utilisée comme photo de profil, qui est visible publiquement
            - Un nom d'utilisateur, visible publiquement, permettant aux autres personnes de vous identifier
            - Un prénom, qui est facultatif. Celui-ci est visible publiquement
        </p>
    </div>
    <div class="box box-padding-30">
        <h3>2. Données publiques et privées</h3>
        <p>
            Certaines données sont divulguées publiquement, dans votre profil pour des raisons pratique. Cela inclu la photo de profil, le nom d'utilisateur,
            l'Identifiant Unique d'Utilisateur (IDUU) ou Unique User Identifiant (UUID).
            Il est à noter que l'envoi du prénom et de la photo de profil est facultatif. Dans le cas de la photo de profil, une photo de profil par défaut aléatoire
            vous est attribué à l'inscription. L'utilisateur a également le choix de réinitialiser sa photo de profil. En faisant ainsi, l'ancienne photo de profil sera
            supprimée définitivement du serveur, et la photo de profil attribuée a l'inscription sera rétablie.
        </p>
    </div>
    <div class="box box-padding-30">
        <h3>3. API Shizumi: Comment Shizumi traite mes données ?</h3>
        <p>
            Votre adresse email est l'élément le plus important pour le fonctionnement de Shizumi et du système ASAKI. E, effet, l'API s'en sert constamment pour
            accéder à vos données de jeu tel que votre porte feuille Okane,
        </p>
    </div>
</body>
</html>