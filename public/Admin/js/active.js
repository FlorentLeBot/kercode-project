let links = document.querySelectorAll(".bloc-links a");
let link;

for (link of links){
  if(window.location.pathname == link.getAttribute('href')){
    link.classList.add('active');
  }else{
    link.classList.remove('active')
  }
}