<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Shizumi est un jeu sur navigateur inspiré de Mudae, visant à permettre aux joueurs de collectionner leurs personnages préférés.">
    <link href='https://fonts.googleapis.com/css?family=PT Sans' rel='stylesheet'>
    <!-- ! Dans le link ci-dessus, le validateur W3C détecte une erreur lié à l'espace.
    ! Cependant, il n'est pas possible de l'enlever ou le remplacer, sinon la police ne fonctionne plus -->
    <link rel="stylesheet" href="style.css">
    <script src="popup.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Erreur - Shizumi</title>
</head>
<body class="center-all">
    <div class="box-light box-padding-30" style="max-width: 700px; max-height: 600px;">
        <h1>Erreur</h1>
        <p><?php 

        if (!empty($_SESSION['error'])) {
            echo $_SESSION['error'];
        } elseif (isset($_GET['code'])) {
            $errorcode = $_GET['code']
            switch ($code) {
                case 'exp404':
                    echo "Code: EXP404</p><p>Erreur liée aux routes du serveur Node.js de Shizumi Server";
                    break;
                
                default:
                    echo "Erreur Inconnue"
                    break;
            }
        }
        
        
        ?></p>
    </div>
</body>
</html>