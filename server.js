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
app.get('/', (req, res) => {
  console.log('Accès à la route réussie !')
})

app.post('/getPlayerEmail', (req, res) => {
  // Accédez à la valeur de l'email dans le corps de la requête
  const email = req.body.email;

  // Utilisez l'email pour vos traitements
  // Par exemple, vous pouvez l'utiliser pour certaines requêtes
  // vers votre base de données ou un service externe, etc.

  // Répondez à la requête PHP avec une réponse appropriée
  res.send('Email reçu avec succès !');
});
// Show a 404 error
app.all('*', (req, res) => {
  $errorcode = res.status();
  res.status($errorcode).redirect("error.php?code=" . $errorcode);
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
  }
});
function getPlayerData() {
  fetch("database/players/" + userId + ".json")
      .then(function(response) {
        return response.json();
      })
      .then(function(data) {
        // Ici, "data" contient les données JSON du fichier sélectionné aléatoirement
        // Pour l'instant pour des fins de test, on affiche les données dans la console.
        console.log(data);
      })
      .catch(function(error) {
          console.log('Une erreur s\'est produite : ' + error.message);
      });
}
}
// ? On va chercher dans le JSON correspondant au joueur, la valeur de playerwallet pour l'afficher sur le client
app.get('/getPlayerWallet', function(req, res) {
  getUserId();
  // ? Ici, on veut récupérer la valeur du porte-monnaie du joueur. D'abord, il faut trouver son UUID.
  getPlayerData();
  getPlayerWallet();
  // Une fois que getPlayerWallet() a terminé son exécution et que la variable OkaneWallet a été mise à jour, vous pouvez envoyer la réponse contenant la valeur d'OkaneWallet
  res.json({ OkaneWallet: OkaneWallet });
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
  // ? On vérifie si une erreur survient
    if (err) {
      console.error('Erreur de connexion à la base de données :', err);
      return;
    }
    console.log('Connexion à la base de données établie !');
});
function parsePlayerData() {
  // ? On obtient les données du joueur via la méthode fs et JSON.parse()
  const playerData = fs.readFileSync('database/players/' + userId + '.json');
  const player = JSON.parse(playerData);
}
function getPlayerRolls() {
  // ? Pour obtenir la valeur de "rolls" du joueur
  const rolls = player.rolls;
}
function selectChar() {
  // * Sélection d'un personnage aléatoire de la BDD de personnages
  fs.readdir(baseCharacterPath, (err, charFiles) => {
    if (err) {
      console.error('Erreur lors de la lecture du dossier :', err);
      return;
    }
    totalCharFiles = charFiles.length;
    console.log('Nombre de fichiers dans le dossier :', totalCharFiles);
      
      // Étape 2 : On génère un nombre aléatoire pour sélectionner un personnage dans la BDD
      // ! Cette méthode est la méthode de base. Dans la version finale de Shizumi, le calcul sera beaucoup plus complexe, et devra prendre en compte
      // ! les bonus du joueur
    randomCharFile = Math.floor(Math.random() * totalCharFiles) + 1;
    
      // Étape 3 : On utilise le résultat du calcul pour en faire le fichier à sélectionné.
    selectedCharFile = randomCharFile + '.json';
      // Étape 4 : On effectue une requête HTTP pour récupérer le fichier JSON sélectionné
    fetch(selectedCharFile)
      .then(function(response) {
        return response.json();
      })
      .then(function(data) {
        // ? "data" contient les données JSON du fichier sélectionné aléatoirement
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