// selection de l'input 
const search = document.getElementById("address");

// écouteur de type input
document.querySelector("#address").addEventListener("input", function () {
  
// url de l'api limité à 5 éléments
let url = `https://api-adresse.data.gouv.fr/search/?q=${this.value}&limit=5`;

  fetch(url)
    .then((response) =>
      response.json().then((data) => {
        // création et récupération des éléments (ul > li * 5)
        document.querySelector("#api-address").innerHTML="";
        let affichage = document.createElement("ul");
        affichage.className = 'disposition';
        for (let address of data.features) {
          let li = document.createElement("li");
          li.innerText = address.properties.label;        
          // ajout au clic du contenu de l'élément li
          li.addEventListener("click", () => {
            search.value = address.properties.label;
            document.querySelector("#api-address").innerHTML="";
          });
          affichage.appendChild(li);
        }
        document.querySelector("#api-address").appendChild(affichage);   
        
      })
    )
    // affichage des erreurs en console
    .catch((err) => console.log("Erreur : " + err));
});