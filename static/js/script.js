document.addEventListener('DOMContentLoaded', () => {
  console.log('la page est chargée!')


  // AUTHENTIFICATION
  const formLogin = document.getElementById("login-box");
  formLogin.addEventListener("submit", (evt) => {

    const postReq = new XMLHttpRequest()
    const userData = new FormData(formLogin)
    console.log(userData)

    postReq.addEventListener("load", (evet) =>{
      const jsonData = evet.target.responseText

      if (jsonData == false){
        alert("Identifiants non valides")
      } else{

        const data = JSON.parse(jsonData)
        alert("Bonjour, " + data['prenom'])
        connBtn = document.getElementById('conn_btn')
        connBtn.classList.toggle("no-show")

        welcomeBtn = document.getElementById("welcome_btn")
        welcomeBtn.classList.remove("no-show")
        welcomeBtn.innerHTML = "Bonjour, " + data['prenom'].charAt(0).toUpperCase() + data['prenom'].slice(1)

        loginBox = document.getElementById("login-box")
        loginBox.classList.toggle("no-show")

        optionList = document.getElementById("option-list")
        optionList.classList.toggle("show-list")
        optionList.classList.remove("no-show")

      }
    })

    postReq.open("post", "webservices/wsLogin.php", true)
    postReq.send(userData)

    evt.preventDefault()

 })

      //  Recherche


      if (document.getElementById("form-recherche") !== null) {
      const critereForm = document.getElementById("form-recherche")

      critereForm.addEventListener("submit", (evt) => {
        const rechReq = new XMLHttpRequest()
        const rechForm = new FormData(critereForm)
        rechReq.addEventListener('load', (evt) => {
          const jsonData = evt.target.responseText
          const annon = JSON.parse(jsonData)

          let balises = ''
        for (let i = 0; i < annon.length; i++) {
            var annonce = annon[i];
  
            balises += '<div class="annon-card">';
            balises += '<img src="' + annonce ['photo'] + '">';
            balises += '<div class="titre-annon"><h2>' + annonce['titre'] + '</h2>';
            balises += '<p>' + annonce['description'] + '</p></div>'; 
            balises += '<div class="corps-annon"><p><strong>Categorie:</strong> ' + annonce['categorie'] + '</p>';
            balises += '<p><strong>Publié par:</strong> ' + annonce['pseudo'] + '</p>';
            balises += '<p><strong>Prix:</strong> ' + annonce['prix'] + '€</p>';
            balises += '<p>' + annonce['rdv_lat'] + " " + annonce['rdv_lon'] + '</p></div>';
            balises += '<div class="date-trash"><p><strong>Publié le:</strong> ' + annonce['date'] + '</p>';
            balises += '<button onclick="suppFunc('+ annonce['id'] +')"><i class="fas fa-trash-alt"></i></button></div>';
            balises += '</div>';
            // container_images.innerHTML += '<img src="' +  + '">';
        }
        const emplacementListe = document.getElementById("recherche-annon");
        emplacementListe.innerHTML = balises;

        })
        rechReq.open('post', 'webservices/wsListDyna.php')
        rechReq.send(rechForm)
        evt.preventDefault()

      })

    }

      // LISTE DYNAMIQUE

      if (document.getElementById("btn-list") !== null) {

        const afficherLesdonnees = document.getElementById("btn-list");

    afficherLesdonnees.addEventListener("submit", (evt) => { 
        console.log("button pressed")
        choperLesDonnees();
        evt.preventDefault()
    
    })

    function getCity(rdv_lat, rdv_lon) { 
      var xhr = new XMLHttpRequest(); 
      var lat = rdv_lat; 
      var lng = rdv_lon; 
    
      xhr.open('GET', "https://us1.locationiq.com/v1/reverse.php?key=pk.0e6004161e7820a950cd1e6b1d114a07&lat=" + 
      lat + "&lon=" + lng + "&format=json", true); 
      xhr.send(); 
      xhr.onreadystatechange = processRequest; 
      xhr.addEventListener("readystatechange", processRequest, false); 
    
      function processRequest(e) { 
          if (xhr.readyState == 4 && xhr.status == 200) { 
              var response = JSON.parse(xhr.responseText); 
              var city = response.address.city; 
              console.log(city)
              return city; 
          } 
      } 
  }
    

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
            var city = getCity(annonce['rdv_lat'], annonce['rdv_lon'])
            balises += '<div class="annon-card">';
            balises += '<img src="' + annonce ['photo'] + '">';
            balises += '<div class="titre-annon"><h2>' + annonce['titre'] + '</h2>';
            balises += '<p>' + annonce['description'] + '</p></div>'; 
            balises += '<div class="corps-annon"><p><strong>Categorie:</strong> ' + annonce['categorie'] + '</p>';
            balises += '<p><strong>Publié par:</strong> ' + annonce['pseudo'] + '</p>';
            balises += '<p><strong>Prix:</strong> ' + annonce['prix'] + '€</p>';
            balises += '<p>' + city + '</p></div>';
            // balises += '<p>' + annonce['rdv_lat'] + " " + annonce['rdv_lon'] + '</p></div>';
            balises += '<div class="date-trash"><p><strong>Publié le:</strong> ' + annonce['date'] + '</p>';
            balises += '<button onclick="suppFunc('+ annonce['id'] +')"><i class="fas fa-trash-alt"></i></button></div>';

            balises += '</div>';
            // container_images.innerHTML += '<img src="' +  + '">';
        }
        const emplacementListe = document.getElementById("list-annon-dyna");
        emplacementListe.innerHTML = balises;

    });
    requeteHTTPGet.open("GET", "webservices/wsListDyna.php"); // WEBSERVICE DE LECTURE D'ANNONCES
    requeteHTTPGet.send();
}
      }


      // Ajout
      if (document.getElementById("nouvelle-annonces")) {

        const formAjoutannonces = document.getElementById("nouvelle-annonces");
  
        formAjoutannonces.addEventListener("submit", (event) => {
        const requeteHTTPPost = new XMLHttpRequest();
        const donneesFormulaire = new FormData(formAjoutannonces);
        requeteHTTPPost.open("post", "webservices/wsAjoutannonces.php");
        requeteHTTPPost.send(donneesFormulaire);
        event.preventDefault();
  
        alert("Votre annonce a été bien ajoutée");
        });
      }

      
    });
    
    //Supp
    
function suppFunc(id) {

  const reqSupp = new XMLHttpRequest()
  let formSupp = new FormData()  
  formSupp.append("id", id)
  reqSupp.addEventListener("load", (evt) => {
    if (reqSupp.status != 200) {
      alert("Vous n'avez pas le droit de supprimer cette annonce")
    } else {
      alert("Vous avez supprimé l'annonce")
    }
  })
  reqSupp.open("post", "webservices/wsSuppression.php")
  reqSupp.send(formSupp)
}

function openNav() {
    document.getElementById("sideNav").style.width = "230px";

  }
  
  /* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
  function closeNav() {
    document.getElementById("sideNav").style.width = "0";

  }
