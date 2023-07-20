const express = require('express');

fetch('/getPlayerWallet') // Assurez-vous d'utiliser le bon chemin d'accès correspondant à votre serveur
  .then(function(response) {
    return response.json();
  })
  .then(function(data) {
    var okaneWalletValue = data.OkaneWallet;
    // Utilisez la valeur de okaneWalletValue pour l'afficher ou effectuer d'autres opérations côté client
  })
  .catch(function(error) {
    console.log('Une erreur s\'est produite : ' + error.message);
  });

document.getElementById("okane-wallet-value").innerHTML = okaneWalletValue;