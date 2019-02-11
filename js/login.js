window.onload= function(){
		document.getElementById("form").addEventListener("submit", login);
		var form= document.getElementById("form");
		var benvenuto = document.getElementById("benvenuto");

		//funzione di login
		function login(e){
			e.preventDefault();
			var email = document.getElementById("email").value;
			var password = document.getElementById("password").value;
			var payload={
				email,
				password
			};

			form.style.visibility="hidden";
			benvenuto.style.visibility="visible";

			var x = JSON.stringify(payload);
			xhr= new XMLHttpRequest();
			xhr.open("POST", "http://localhost/2.0/php/autentication.php");
			xhr.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var utente=JSON.parse(this.responseText);
					if(utente === null){
						testo="<h1>LOGIN FALLITO </h1> ";
						benvenuto.innerHTML=testo;
						document.getElementById("logo").style.visibility="hidden";
					}else{
						console.log(utente.Nome);
						testo="<h1>Benvenuto "+utente.Nome+" "+utente.Cognome+" </h1><br> <p>Adesso sei autenticato e puoi correttamente segnalare o commentare un problema  </p>";
						benvenuto.insertAdjacentHTML("afterbegin",testo);
						document.cookie= "secretID="+" "+utente.secretID;
						var logged = document.cookie.substring(document.cookie.indexOf("secretID:"),document.cookie.indexOf(";"));
						var a = logged.split("=");
						var id = parseInt(a[1]);
						console.log(id);
						document.getElementById("logo").style.visibility="hidden";
					}
					
				}

			};
			xhr.send(x); 
		}
};