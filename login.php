<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>2.0</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" type="text/css" href="http://localhost/2.0/css/main.css">
</head>
<body>
	

	<div class="container">
		<!--NAVBAR-->
		<nav class="navbar">
				<span class="open-slide">
					<a href="#" onclick="openSlideMenu()">
						<svg width="30" height="30">
							<path d = "M0,5 30,5" stroke="#fff" stroke-width="5"/>
							<path d = "M0,14 30,14" stroke="#fff" stroke-width="5"/>
							<path d = "M0,23 30,23" stroke="#fff" stroke-width="5"/>
						</svg>
					</a>
				</span>
				<ul class="navbar-nav">
                    <li><a href="http://localhost/2.0/index.php">Home</a></li>
                    <li><a href="http://localhost/2.0/problemi.php">Naviga Problemi</a></li>
                    <li><a href="http://localhost/2.0/report.php">Riporta Problema</a></li>
                    <li><a href="#">Login/Registrati</a></li>
					<li><a href="http://localhost/2.0/cerca.php"> Cerca Problemi</a><li>
				</ul>

		</nav>

		<!--Menu a scomparsa-->
		<div id="side-menu" class="side-nav">
				<a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
				<a href="http://localhost/2.0/index.php">Home</a>
				<a href="http://localhost/2.0/problemi.php">Naviga Problemi</a></a>
				<a href="http://localhost/2.0/report.php">Riporta Problema</a>
				<a href="#">Login/Registrati</a>
				<li><a href="http://localhost/2.0/cerca.php"> Cerca Problemi</a><li>
		</div>

		<!-- main body-->
		<div class="logincontainer">
			<img src="http://localhost/2.0/logocomune.png" class="logo">
			
			
			<form id="form">
				<label for="email"><b>email</b></label>
				<input type="text" id="email" placeholder="email@email.com" required>
				<label for="password"><b>Password</b></label>
				<input type="password" id="password" placeholder="Password" required>
				<button id="submit"> login </button>
				<p><a href="http://localhost/2.0/registrati.html">Non sei ancora registrato? Registrati.</a></p>
			</form>
		</div>

		<div></div>
	



		<!-- footer-->
		<div class="footer">
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,

			</p>
		</div>
	



	</div>
	<script>	




		document.getElementById("form").addEventListener("submit", login);	
		function login(e){
			e.preventDefault();
			var email = document.getElementById("email").value;
			var password = document.getElementById("password").value;
			var payload={
				email,
				password
			};

			var x = JSON.stringify(payload)
			xhr= new XMLHttpRequest();
			xhr.open("POST", "http://localhost/2.0/php/autentication.php");
			xhr.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					console.log(this.responseText);
				}
			};
			xhr.send(x); 
		}



			function openSlideMenu(){
				document.getElementById("side-menu").style.width="250px"
				document.getElementById("main.").style.marginLeft="250px"
			}
			function closeSlideMenu(){
				document.getElementById("side-menu").style.width="0px"
				document.getElementById("main.").style.marginLeft="0px"
			}
	</script>
</body>
</html>