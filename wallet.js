function getPlayerWallet() {
    getPlayerUUID();
    fetch('database/players/' + userId +'.json')
    .then(function(response) {
      return response.json();
    })
    .then(function(playerdata) {
      console.log(playerdata.playerwallet);
    })
    .catch(function(error) {
      console.log('Une erreur s\'est produite : ' + error.message);
    });
}
OkaneWallet = playerdata.playerwallet;

if (OkaneWallet == null) {
    OkaneWallet = 0;
}
// 
document.getElementById("okane-wallet-value").innerHTML = OkaneWallet;