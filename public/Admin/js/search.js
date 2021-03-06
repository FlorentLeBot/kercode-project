// l'input de la barre de recherche
const searchInput = document.getElementById("search");
console.log(searchInput);
// l'écouteur d'événement keyup
searchInput.addEventListener("keyup", (e) => {
  // accéder à l'entrée de l'utilisateur
  const searchUser = e.target.value.toLowerCase();
  console.log(searchUser);
  // filter les caractères de la recherche
  let res = document.querySelectorAll(".table-results");
  for (i = 0; i < res.length; i++) {
    if (res[i].innerHTML.toLowerCase().includes(searchUser)) {
        res[i].style.display = "block";
    } else {
        res[i].style.display = "none";
    }
  }
});