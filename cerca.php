<?php
//creo una sessione per rendere le operazioni meno "hardcoded"
    session_start();    /*
    require("config/db.php");
    require("config/config.php");
    $q= "SELECT * FROM Categorie WHERE 1";
    $ris=mysqli_query($conn,$q);*/
?>

<!DOCTYPE html>
<html lang="it">
<head>
	<title>2.0</title>

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
                <li><a href="http://localhost/2.0/index.php"> Home</a><li>
					<li><a href="http://localhost/2.0/problemi.html">Naviga Problemi</a></li>
					<li><a href="http://localhost/2.0/report.php">Riporta Problema</a></li>
					<li><a href="http://localhost/2.0/login.html">Login/Registrati</a></li>
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

    <div class="stripe" style="opacity:0.94">

        <form method="POST" action="cercaTag.php">
        <label for="cercaTag"> <b>Cerca problemi per tag </b> </label><br>
        <input type="text" name="cercaTag" id="cercaTag"><button id="1">Cerca!</button><br>
        </form>
        
        <form method="POST" action="cercaCreatore.php">
        <label for="cercaCreatore"> <b>Cerca problemi per creatore </b></label><br>
        <input type="text" name="Nome"  placeholder="NOME"> <input type="text" namespace="Cognome"  placeholder="COGNOME"> <button>Cerca!</button><br>
        </form>

        <form method="POST" action="cercaAttivo.php">
        <label for="cerca"> <b>Cerca utente più attivo </b> </label><br>    
         <button >Cerca!</button>
        </form>        
        
        <form method="POST" action="cercaCategoria.php">
            <label for="cerca"> <b>Cerca problemi per categoria categoria </b> </label><br>
            <select type="text" id="categoria" name="categoria" class="categoria" required>
                <?php  
                        $i=0;
                        $categorie= mysqli_fetch_all($ris,MYSQLI_ASSOC);
                        while($i<count($categorie)){
                            echo'<option value="'.$categorie[$i]['descrizione'].'">'.$categorie[$i]['descrizione']."</option>";
                            $i++;
                        }
                        $i=0;
                ?>
            </select>
            <button id="4">Cerca!</button>
        </form>
    </div>


	<script>

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

    <script>
            function cercaTag(){
                var xhr= new x
            }
            function cercaCreatore(){
                
            }
            function cercaCategoria(){
                
            }
            function cercaAttivo(){
                
            }
    </script>




</body>
</html>