<?php
include("database/database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=PT Sans' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <script src="menu.js"></script>
    <script src="popup.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Utilisateurs - Shizumi</title>
</head>
<body>
    <header class="global-header">
        <div class="header-left">
            <div class="menutooltip">
                <a href="menu.php"><img src="img/shizumi-asaki.png" alt="Shizumi" class="logo-small"></a>
                <span class="menutooltiptext">Cliquez pour ouvrir le menu</span>
            </div>
            <div>
                <p class="page-desc">
                    Il s'agit de la liste des utilisateurs sur Shizumi. Vous pouvez désactiver un compte utilisateur, 
                    voir sa collection ou son inventaire, vous pouvez réinitiliser son cooldown de loterie.
                </p>
                <!-- <p class="workinprogress">Cette page est utilisée à des fins expérimentales. Celle-ci sert uniquement à avoir un rendu visuel du site avec le HTML et le CSS.</p> -->
            </div>
        </div>
        <div class="header-right">
            <div>
                <p class="page-name">Liste des Utilisateurs</p>
            </div>
            <!-- Icône de la page -->
            <img src="img/user-icon.png" alt="Logo Utilisateurs" width="80px" height="80px">
        </div>
    </header>
    <main class="collection-area">
        <div class="user-list">
            <div class="small-space-around user-list">
                <!-- <p class="user-list-header-name">Nom d'utilisateur</p>
                <p class="user-list-header-email">Email</p>
                <p class="user-list-header-actions">Actions</p> -->
                <?php
                // Fetch users from the database
                $stmt = $conn->query("SELECT id, username, email FROM users");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="box box-padding-30 flex-between small-space-around">';
                        echo '<div id="username-email">';
                            echo '<p class="user-list-item-name">' . htmlspecialchars($row['username']) . '</p>';
                            echo '<p class="user-list-item-email">' . htmlspecialchars($row['email']) . '</p>';
                        echo '</div>';
                        echo '<div class="center-all flex-end">';
                            echo '<a href="view_user.php?id=' . $row['id'] . '" class="green-button remove-link-style small-space-around">Voir Inventaire</a>';
                            echo '<a href="disable_user.php?id=' . $row['id'] . '" class="red-button remove-link-style small-space-around">Désactiver</a>';
                            echo '<a href="reset_cooldown.php?id=' . $row['id'] . '" class="blue-button remove-link-style small-space-around">Réinitialiser Cooldown</a>';
                        echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
</body>
</html>