<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://fonts.googleapis.com/css?family=PT Sans' rel='stylesheet'>
    <script src="popup.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Contact - Shizumi</title>
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
                    Contactez-nous pour toute demande concernant Shizumi. Ce formulaire permet de traiter toute demande, d'ajout de personnage ou de droits d'auteur.
                </p>
                <p class="workinprogress">Cette page est utilisée à des fins expérimentales. Celle-ci sert uniquement à avoir un rendu visuel du site avec le HTML et le CSS.</p>
            </div>
        </div>
        <div class="header-right">
            <div>
                <p class="page-name">Contact</p>
            </div>
            <!-- Icône de la page -->
            <img src="img/contact.png" width="80px" height="80px">
        </div>
    </header>
    <main>
        <form class="box contact-box" action="message-sent.php">
            <h1>Contact</h1>
            <div class="contact-top">
                <div class="contact-left">
                    <label for="contact-name">Nom</label>
                    <input type="text" name="name" id="contact-name" class="field" required>
                    <label for="contact-first-name">Prénom</label>
                    <input type="text" name="first-name" id="contact-first-name" class="field">
                    <label for="contact-email">Email</label>
                    <input type="email" name="email" id="contact-email" class="field" required>
                    <label for="contact-reason">Motif</label>
                    <select id="contact-reason" name="reason" class="field">
                        <option value="suggest">Suggestion générale</option>
                        <option value="character-suggestion">Suggestion d'ajout de personnage</option>
                        <option value="dmca">Droits d'auteur et la propriété intéllectuelle/Je souhaite que mon/mes personnage(s) soi(en)t supprimé(s)</option>
                        <option value="technical-issue">Problème technique</option>
                        <option value="other-reason">Autre (Spécifier dans le message s'il vous plaît)</option>
                    </select>
                </div>
                <div class="contact-right">
                    <label for="contact-message">Message</label>
                    <textarea name="message" id="contact-message" cols="30" rows="10" placeholder="Ecrivez-ici" class="field" required></textarea>
                    <label>Pièces-Jointes</label>
                    <button class="contact-import-button">Importer</button>
                </div>
            </div>
            <div class="contact-bottom">
                <input type="submit" class="contact-submit" value="Envoyer"></input>
            </div>
        </form>
    </main>
</body>
</html>