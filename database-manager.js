// ! NODE.JS NECESSAIRE
// * SERVER SIDE CODE
const fs = require('fs');

function getNextFileId() {
  const existingCharFiles = fs.readdirSync('./database/global/characters/');
  return existingCharFiles.length + 1;
}

function writeCharFile(donnees) {
  const nextFileId = getNextFileId();
  const charFileName = `donnees_personnages/${nextFileId}.json`;
  const charJSONcontent = JSON.stringify(donnees, null, 2);

  fs.writeFile(charFileName, charJSONcontent, 'utf8', (error) => {
    if (error) {
      console.error('Erreur lors de l\'écriture du fichier JSON :', erreur);
    } else {
      console.log(`Le fichier JSON "${charFileName}" a été créé avec succès !`);
    }
  });
}

// Exemple d'utilisation
const newCharacter = {
  name: 'Nouveau personnage',
  serie: 'Série 3',
  rarity: 2,
  description: 'Description du nouveau personnage',
  images: ["https://example.com/photo3.jpg"]
};

writeCharFile(newCharacter);
