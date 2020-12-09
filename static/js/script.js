document.addEventListener('DOMContentLoaded', () => {
  console.log('la page est chargée!')

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

  })


function openNav() {
    document.getElementById("sideNav").style.width = "230px";

  }
  
  /* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
  function closeNav() {
    document.getElementById("sideNav").style.width = "0";

  }
