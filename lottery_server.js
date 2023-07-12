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



const playerData = fs.readFileSync('database/players/' + userId + '.json');
const player = JSON.parse(playerData);

// Pour obtenir la valeur de "rolls" du joueur
const rolls = player.rolls;


connection.end();