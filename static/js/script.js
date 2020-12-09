document.addEventListener('DOMContentLoaded', () => {
  console.log('la page est chargée!')


  // AUTHENTIFICATION
  const formLogin = document.getElementById("login-box");
  formLogin.addEventListener("submit", (evt) => {

    const postReq = new XMLHttpRequest()
    const userData = new FormData(formLogin)

    postReq.addEventListener("load", (evet) =>{
      const jsonData = evet.target.responseText

      if (jsonData == false){
        alert("Identifiants non valides")
      } else{

        const data = JSON.parse(jsonData)
        alert("Bonjour, " + data['prenom'])
      }
    })

    postReq.open("post", "webservices/wsLogin.php", true)
    postReq.send(userData)

    evt.preventDefault()

 })


      // LISTE DYNAMIQUE

      if (document.getElementById("btn-list") !== null) {

        const afficherLesdonnees = document.getElementById("btn-list");

    afficherLesdonnees.addEventListener("submit", (evt) => { 
        console.log("button pressed")
        choperLesDonnees();
        evt.preventDefault()
    
    })
    

function choperLesDonnees() {

var requeteHTTPGet = new XMLHttpRequest();
requeteHTTPGet.addEventListener("load", (evt) => {
    const jsonData = evt.target.responseText;

 // console.log("résultat du webservice reçu", jsonData);
    const data = JSON.parse(jsonData);
    console.log("données décodées", data);
    let balises = '';
        // BOUCLE for SUR data
        for (let i = 0; i < data.length; i++) {
            var annonce = data[i];
            balises += '<ul>';
            balises += '<li><h2>' + annonce['titre'] + '</h2></li>';
            balises += '<li><p>' + annonce['categorie'] + '</p></li>';
            balises += '<li><p>' + annonce['pseudo'] + '</p></li>';
            balises += '<li><p>' + annonce['description'] + '</p></li>'; 
            balises += '<li><p>' + annonce['prix'] + '</p></li>';
            balises += '<li><img src="' + annonce ['photo'] + '"></li>';
            balises += '<li><p>' + annonce['rdv_lat'] + '</p></li>';
            balises += '<li><p>' + annonce['rdv_lon'] + '</p></li>';
            balises += '<li><p>' + annonce['date'] + '</p></li>';
            balises += '</ul>';
            // container_images.innerHTML += '<img src="' +  + '">';
        }
        const emplacementListe = document.getElementById("list-annon-dyna");
        emplacementListe.innerHTML = balises;

    });
    requeteHTTPGet.open("GET", "webservices/wsListDyna.php"); // WEBSERVICE DE LECTURE D'ANNONCES
    requeteHTTPGet.send();
}
      }
 
//  NEXT



  })


function openNav() {
    document.getElementById("sideNav").style.width = "230px";

  }
  
  /* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
  function closeNav() {
    document.getElementById("sideNav").style.width = "0";

  }
