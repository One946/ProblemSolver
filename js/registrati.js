window.onload= function(){

  //funzione asincrona per la registrazione dell'utente
  document.getElementById("form").addEventListener("submit",registra)
  function registra(e){
    e.preventDefault();
    var json={
      email:document.getElementById("email").value,
      nome:document.getElementById("nome").value,
      cognome:document.getElementById("cognome").value,
      cf:document.getElementById("cf").value,
      password:document.getElementById("password").value,
      passwordr:document.getElementById("passwordr").value,
      secretID:document.getElementById("secretID").value
    };
    var xhr= new XMLHttpRequest();
    xhr.open("POST","http://localhost/2.0/php/register.php");
    xhr.onload=function (){
        console.log(this.responseText);
    };
    xhr.send(JSON.stringify(json));
  }
}