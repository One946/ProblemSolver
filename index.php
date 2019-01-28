<!DOCTYPE html>
<html lang="it">
<head>
	<title>2.0</title>
	<meta charset="utf-8" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" type="text/css" href="http://localhost/2.0/css/main.css">
</head>
<body background="messina.jpg">
	

	<div class="container">
		<!-- navbar -->
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
					<li><a href="#">Home</a></li>
					<li><a href="http://localhost/2.0/problemi.php">Naviga Problemi</a></li>
					<li><a href="http://localhost/2.0/report.php">Riporta Problema</a></li>
					<li><a href="http://localhost/2.0/login.php">Login/Registrati</a></li>
					<li><a href="http://localhost/2.0/cerca.php"> Cerca Problemi</a><li>
				</ul>

			</nav>
		<!--Menu a scomparsa-->
			<div id="side-menu" class="side-nav">
					<a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
					<a href="#">Home</a>
					<a href="#">Naviga Problemi</a></a>
					<a href="#">Riporta Problema</a>
					<a href="#">Login/Registrati</a>
			</div>


		<!-- main body-->
		<div class="stripe">
			<button onclick="login()"></button>
			<h1>BENVENUTO NEL PORTALE Problem Solver </h1>
			<p> 
				<b>
			riporta i tuoi problemi o consulta i problemi già riportati navigando tramite il menù soprastante
				</b>
			</p>
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
				function login(){
			xhr= new XMLHttpRequest();
			xhr.open("GET", "http://localhost/2.0/php/autentication.php");
			xhr.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					console.log(this.responseText);
				}
			};
			xhr.send(); 
		}


			//script per aprire e chiudere il menù a scomparsa in modalità mobile
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