// Assurez-vous que le code s'exécute après le chargement du DOM
document.addEventListener("DOMContentLoaded", () => {
    const quoteText = document.getElementById("quote");
    const quoteAuthor = document.getElementById("quote-auth");
    const quoteSauce = document.getElementById("quote-sauce");
  
    fetch("https://animechan.xyz/api/random")
      .then((response) => response.json())
      .then((quote) => {
        quoteText.textContent = quote.quote;
        quoteAuthor.textContent = quote.character;
        quoteSauce.textContent = quote.anime;
      })
      .catch((error) => console.error("Une erreur s'est produite :", error));
  });
  