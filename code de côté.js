// Effectuer une requête asynchrone pour récupérer la liste des fichiers JSON disponibles
fetch('chemin/vers/liste/fichiers.json')
  .then(function(response) {
    return response.json();
  })
  .then(function(data) {
    // Ici, "data" contient la liste des fichiers JSON disponibles
    var dernierFichier = data.length;
    
    // Générer un nombre aléatoire entre 1 et le dernier fichier JSON
    var numeroFichierAleatoire = Math.floor(Math.random() * dernierFichier) + 1;
    
    // Construire le chemin vers le fichier JSON aléatoire
    var cheminFichierAleatoire = numeroFichierAleatoire + '.json';
    
    // Effectuer une nouvelle requête pour récupérer les données du fichier JSON aléatoire
    fetch('chemin/vers/repertoire/' + cheminFichierAleatoire)
      .then(function(response) {
        return response.json();
      })
      .then(function(data) {
        // Ici, "data" contient les données du fichier JSON aléatoire
        // Vous pouvez faire ce que vous voulez avec ces données, par exemple, les afficher sur la page HTML
        var element = document.getElementById('votreElement');
        element.innerHTML = JSON.stringify(data);
      })
      .catch(function(error) {
        console.log('Une erreur s\'est produite lors de la récupération du fichier JSON : ' + error.message);
      });
  })
  .catch(function(error) {
    console.log('Une erreur s\'est produite lors de la récupération de la liste des fichiers JSON disponibles : ' + error.message);
  });