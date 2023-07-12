/*
  _____   ____  _____  _    _ _____     _  _____ 
 |  __ \ / __ \|  __ \| |  | |  __ \   | |/ ____|
 | |__) | |  | | |__) | |  | | |__) |  | | (___  
 |  ___/| |  | |  ___/| |  | |  ___/   | |\___ \ 
 | |    | |__| | |    | |__| | |_ | |__| |____) |
 |_|     \____/|_|     \____/|_(_) \____/|_____/ 
                                                 
popupOk() : Popup de message générique ou d'avertissement avec un bouton "Ok" pour fermer le popup.
*/
function confirmShopUpgrade() {
  swal({
    title: "Améliorer le magasin",
    text: "Êtes-vous sûr de vouloir améliorer le magasin ? Cela vous coûtera " + 3000 + " Okanes.",
    buttons: {
      cancel: "Non",
      confirm: "Oui",
    },
    closeOnClickOutside: false,
  })
  .then((value) => {
    if(value){
      if(OkaneWallet >= 3000){
        OkaneWallet -= 3000;
        swal("Amélioré","Votre magasin a été amélioré !","success");
      } else {
        swal("Échec", "Vous n'avez pas assez d'Okanes. Vous pouvez en obtenir en enlevant des personnages de votre collection, en ouvrant des coffre, ou via des bonus du jardin.", "error");
      }
    }
  });
}
function showPopup1() {
  var fenetre = document.getElementById("series");
  fenetre.classList.add("active");
}

function closePopup1() {
  var fenetre = document.getElementById("series");
  fenetre.classList.remove("active");
}