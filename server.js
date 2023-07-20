// * On va avoir besoin de Express.js pour certaines manipulations
const express = require('express'); // Importe le module Express
const app = express(); // Crée une instance d'application Express

app.listen(3000, () => { console.log('Serveur démarré sur le port 3000'); });

// ? Ceci est une route, crée par Express.js Celle-ci permet de créer des "page" ou des "sous-page" en Node.js côté serveur comme on peut le faire en PHP
// Cette route permet simplement d'arrêter le serveur, et sera enlevé plus tard
app.get('/shutdown', (req, res) => {
    // Logique d'arrêt du serveur
    console.log('Arrêt du serveur...');
    server.close(() => {
      console.log('Serveur arrêté. Code de sortie 0');
      process.exit(0);
    });
});

// Cette route va permettre d'envoyer la donnée que l'on cherche dans le JSON du joueur stocké dans le server vers son client pour retourner la valeur
// C'est comme ça que l'on peut afficher le montant d'un porte-monnaie virtuel, comme le porte-monnaie Steam par exemple.
app.get('/getPlayerWallet', function(req, res) {
  // ? Ici, on veut récupérer la valeur du porte-monnaie du joueur. D'abord, il faut trouver son UUID.
  fetch('/database/players/' + userId + '.json')
  .then(function(response) {
    return response.json();
  })
  .then(function(data) {
    OkaneWallet = data.playerwallet;
  })
  .catch(function(error) {
    console.log('Une erreur s\'est produite :', error);
  });
  getPlayerWallet();
  // Une fois que getPlayerWallet() a terminé son exécution et que la variable OkaneWallet a été mise à jour, vous pouvez envoyer la réponse contenant la valeur d'OkaneWallet
  res.json({ OkaneWallet: OkaneWallet });
});
app.post('/getPlayerEmail', (req, res) => {
  // Accédez à la valeur de l'email dans le corps de la requête
  const email = req.body.email;

  // Utilisez l'email pour vos traitements
  // Par exemple, vous pouvez l'utiliser pour certaines requêtes
  // vers votre base de données ou un service externe, etc.

  // Répondez à la requête PHP avec une réponse appropriée
  res.send('Email reçu avec succès !');
});

// * Connexion à la base de données
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

function getUserId() {
  connection.query('SELECT id FROM users WHERE email = ?', email, (err, results) => {
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
}
function getPlayerData() {
  const playerData = fs.readFileSync('database/players/' + userId + '.json');
  const player = JSON.parse(playerData);
}
function getPlayerRolls() {
  // Pour obtenir la valeur de "rolls" du joueur
  const rolls = player.rolls;
}
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