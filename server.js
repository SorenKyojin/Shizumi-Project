const express = require('express'); // Importe le module Express

const app = express(); // Crée une instance d'application Express

app.listen(3000, () => { console.log('Serveur démarré sur le port 3000'); });

app.get('/shutdown', (req, res) => {
    // Logique d'arrêt du serveur
    console.log('Arrêt du serveur...');
    server.close(() => {
      console.log('Serveur arrêté.');
      process.exit(0);
    });
  });

const fs = require('fs');
const mysql = require('mysql');
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'shizumi'
});
connection.connect((err) => {
    if (err) {
      console.error('Erreur de connexion à la base de données :', err);
      return;
    }
    console.log('Connexion à la base de données établie !');
});

connection.query('SELECT id FROM users WHERE email = ?', userEmail, (err, results) => {
  if (err) {
    console.error('Erreur lors de l\'exécution de la requête :', err);
    return;
  }
  
  if (results.length > 0) {
    const userId = results[0].id;
    console.log('Identifiant de l\'utilisateur actuel :', userId);
    // Tu peux stocker userId dans une variable ou l'utiliser comme nécessaire.
  }
});

var userEmail;
var userId;

function playerData() {
  var playerData = fs.readFileSync('database/players/' + userId + '.json');
  var player = JSON.parse(playerData);
  rolls = player.rolls;
}

connection.end();

function selectChar() {
    fs.readdir(baseCharacterPath, (err, charFiles) => {
        if (err) {
          console.error('Erreur lors de la lecture du dossier :', err);
          return;
        }
    
        totalCharFiles = charFiles.length;
        console.log('Nombre de fichiers dans le dossier :', totalCharFiles);
    
           // Ici, vous pouvez continuer avec le code pour générer un nombre aléatoire et accéder au fichier correspondant.
           // Par exemple, vous pouvez utiliser la méthode précédente pour générer un nombre aléatoire entre 1 et le nombre de fichiers,
           // puis construire le chemin vers le fichier JSON sélectionné aléatoirement et le lire.
           
           // Étape 2 : Générez un nombre aléatoire entre 1 et le nombre total de fichiers
        randomCharFile = Math.floor(Math.random() * totalCharFiles) + 1;

           // Étape 3 : Utilisez le numéro de fichier aléatoire pour construire le chemin vers le fichier JSON correspondant
        selectedCharFile = randomCharFile + '.json';

           // Étape 4 : Effectuez une requête HTTP pour récupérer le fichier JSON sélectionné
        fetch(selectedCharFile)
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                   // Ici, "data" contient les données JSON du fichier sélectionné aléatoirement
                   // Faites ce que vous voulez avec les données, par exemple les afficher dans la console
                console.log(data);
                characterNameText.textContent = data.name;
                characterSerieText.textContent = data.serie;
                characterDescText.textContent = data.description;
                characterValueLabel.textContent = data.value;
                characterMainImage.src = "./img/" + data.images[0];

            })
            .catch(function(error) {
                console.log('Une erreur s\'est produite : ' + error.message);
            });
    });
}