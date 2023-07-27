/* 

*/

// const fs = require('fs');
/*
* COMPTEUR TIRAGES
*/

//? Le gestionnaire d'événement (EventListener) "DOMContentLoad" permet de charger le code qu'une fois que le contenu du site est chargé.
// TODO: Changer le nombre de rolls par défaut en fonction du niveau de la loterie
// Pour la démonstration, on initialise la variable à 10. À la version finale, cette variable sera initialisé par intervalle, et en fonction du niveau de la loterie

// RemainingRolls = 10;
getPlayerData();
RemainingRolls = player.rolls;
//? Pour tous les éléments où l'on veut afficher le nombre de tirages restants, on met à jour la variable.

// * Timer & nb de tirages
rollTimerMinutes = 59;
rollTimerSeconds = 59;
rollTimeDisplay = document.getElementById("roll-timer");
rollTimeDisplay.textContent = rollTimerMinutes + ":" + rollTimerSeconds;
//* (i) On utilise .textContent et non innerHTML car celui-ci présente un problème au niveau sécurité. (Faille XSS, voir https://fr.wikipedia.org/wiki/Cross-site_scripting )
document.getElementById('remaining-rolls').textContent = RemainingRolls;
document.getElementById('remaining-rolls-mini').textContent = RemainingRolls;
// pour simplifier le code on crée une variable pour le bouton qui contient son identification.
// Cela permet de compresser le code et de l'optimiser.
rollButton = document.getElementById("roll-button");

//? Le gestionnaire d'événement "click" permet d'exécuter la fonction lorsque l'on clique sur le bouton. On utilise la variable de notre bouton
//? afin d'éviter de réécrire .getElementById et d'alléger le code.
rollButton.addEventListener("click", function() {
    //? Pour éviter de tomber dans les valeurs négatives, on exécute le code à condition que la variable soit supérieure à 0
    if (RemainingRolls > 0) {
        RemainingRolls--;
        //? Pour tous les éléments où l'on veut afficher le nombre de tirages restants, on met à jour la variable.
        document.getElementById('remaining-rolls').textContent = RemainingRolls;
        document.getElementById('remaining-rolls-mini').textContent = RemainingRolls;
        roll(); // On lance le tirage
    } else {
        swal("Attention", "Vous n'avez plus de tirages. Améliorez votre loterie, ou obtenez des bonus via le jardin.", "error");
        // On affiche un popup d'Erreur comme quoi il n'y plus de tirages.
    }
});
setInterval(rollTimer, 1000);

function rollTimer() {
    if (claimTimerMinutes == 0 && claimTimerSeconds == 0) {
        RemainingRolls = 10;
        rollTimerMinutes = 59;
        rollTimerSeconds = 59;
        remainingRollsValue.textContent = RemainingRolls;
    } else {
        if (rollTimerSeconds == 0) {
            rollTimerSeconds = 59;
            rollTimerMinutes--;
        } else {
            rollTimerSeconds--;
        }
        if (rollTimerSeconds < 10) {
            rollTimeSeparator = ":0";
        } else {
            rollTimeSeparator = ":";
        }
        rollTimeDisplay.textContent = rollTimerMinutes + rollTimeSeparator + rollTimerSeconds
    }
}

// * Tirage (roll)

characterNameText = document.getElementById("waifu-roll-name");
characterSerieText = document.getElementById("roll-serie-name");
characterRollTypeText = document.getElementById("roll-generator-type");
characterDescText = document.getElementById("roll-desc");
characterValueLabel = document.getElementById("roll-value");
characterMainImage = document.getElementById("roll-waifu-image");

function roll() {
    // Todo: Appeler un JSON aléatoire (fonctions de base)
    // Todo: Utiliser fetch
    // ! Impossible à remplir ! Node.JS est nécessaire mais n'est pas installé sur l'ordinateur !
    baseCharacterPath = "./database/global/characters/";
    jsonExtension = ".json";
    selectChar();
}
        
/*
* COMPTEUR OBTENTIONS
*/
claimTimerMinutes = 59;
claimTimerSeconds = 59;
remainingClaims = 1;
remainingClaimsValue = document.getElementById('remaining-claims');
remainingClaimsText = document.getElementsByClassName('remaining-claims-text');
claimUpgradeTip = document.getElementById("claim-upgrade-tip");
claimTimeDisplay = document.getElementById("claim-timer");
claimTimeDisplay.textContent = claimTimerMinutes + ":" + claimTimerSeconds;
remainingClaimsValue.textContent = remainingClaims;
claimButton = document.getElementById("roll-claim");
claimButton.addEventListener("click", function(){
if (remainingClaims > 0) {
    remainingClaims--;
    remainingClaimsValue.textContent = remainingClaims;
    createHeart();
} else {
    swal("Attention", "Vous ne pouvez plus obtenir de personnage. Attendez le délais affiché, ou obtenez des bonus via le jardin.", "error");
}
});
if (remainingClaims == 0) {
    remainingClaimsText.style.color = "#EB5858";
    claimUpgradeTip.style.color = "#EB5858";
}
setInterval(claimTimer, 1000);

function claimTimer() {
    if (claimTimerMinutes == 0 && claimTimerSeconds == 0) {
        remainingClaims = 1;
        claimTimerMinutes = 59;
        claimTimerSeconds = 59;
        remainingClaimsValue.textContent = remainingClaims;
    } else {
        if (claimTimerSeconds == 0) {
            claimTimerSeconds = 59;
            claimTimerMinutes--;
        } else {
            claimTimerSeconds--;
        }
        if (claimTimerSeconds < 10) {
            claimTimeSeparator = ":0";
        } else {
            claimTimeSeparator = ":";
        }
        claimTimeDisplay.textContent = claimTimerMinutes + claimTimeSeparator + claimTimerSeconds
    }
}

// Animation coeurs:
function createHeart() {
    heartCount = 5;
    rollContainer = document.getElementById('roll-container');
    for (var i = 0; i < heartCount; i++){
        heart = document.createElement('div');
        heart.classList.add('heart');
        rollContainer.appendChild(heart);
        
        x = Math.random() * rollContainer.clientWidth;
        y = Math.random() * rollContainer.clientHeight;
        
        heart.style.left = x + 'px';
        heart.style.top = y + 'px';
        
        animateHeart(heart);
    }
}
  
function animateHeart(heart) {
    let animation = heart.animate([
        { transform: 'translateY(0) scale(1)', opacity: 1 },
        { transform: 'translateY(-100px) scale(2)', opacity: 0 }
    ], {
      duration: 1000,
      easing: 'ease-in'
    });
  
    animation.onfinish = function() {
      heart.remove();
    };
}