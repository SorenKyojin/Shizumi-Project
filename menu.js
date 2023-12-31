tips = [
    "Pour pouvoir jouer directement à Shizumi sur mobile, ajoutez le site sur votre écran d’accueil.", // 1
    "Cliquez sur le logo de Shizumi ou votre photo de profil pour revenir au menu", // 2
    "Planter une orchidée offre 5 Okanes par niveau lorsque vous obtenez un personnage.", // 3...
    "Pensez à arroser vos plantes afin de ne pas les laisser mourrir et ainsi garder vos bonus.",
    "Obtenez des graines en faisant apparaître des personnages liés aux plantes, ou en achetant un dans la boutique.",
    "Un engrais coûte 100 Okanes. Les plantes communes requièrent 1 engrais par niveau, 2 pour les plantes rares et 5 pour les très rares.",
    "Les plantes légendaires sont très difficile à trouver. Vous pouvez en planter qu'une seule dan votre jardin, et n'est améliorable.",
    "Le buisson donne des fruits pouvant être donnés aux personnages que vous possédez ou que vous souhaitez.",
    "Donner une fraise à un personnage que vous possédez augmentera sa valeur en Okane.",
    "Si un personnage que vous possédez déjà appraraît dans votre loterie, vous pouvez récupérer le double de sa valeur.",
    "Lorsqu'un personnage que vous possédez déjà apparaît dans votre loterie, sa valeur en Okane augmentera après avoir réclamé."
];

// Les icônes doivent correspondent au texte !
icon = [
    "info.png", // 1
    "info.png", // 2
    "plant.png", // 3...
    "plant.png",
    "",
    "",
    "",
    "",
    "",
    "",
    "",
];


// Fonction pour obtenir un indice aléatoire
function indiceAleatoire(max) {
    return Math.floor(Math.random() * max);
}

// Obtenir un indice aléatoire pour sélectionner un texte
indice = indiceAleatoire(texts.length);



document.getElementById('tip-text').textContent = tips[indice];
document.getElementById('tip-icon').src = "img/tips-icon/" + icon[indice];