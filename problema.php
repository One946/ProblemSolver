<?php
    require("config/config.php");
    require("config/db.php");
	session_start();
	$_SESSION["IdProblema"] = mysqli_real_escape_string($conn,$_GET["id"]); //mi faccio passarel'id del problema che l'utente ha selezionato tramite il metodo GET
	//in questo caso lo salvo nella variabile di sessione perchè devo riutilizzarlo in una parte successiva dello script che va fuori dallo scope del primo

    //recupera l'id
    $id = mysqli_real_escape_string($conn,$_GET["id"]);
	//query per prelvare problemi e segnalazioni
    $query1 = "SELECT * FROM Segnalazioni WHERE idProblema = ".$id;
    $query2 = "SELECT * FROM Problemi WHERE idProblema =".$id;
    
    //Prendi il risultato
    $ris1 = mysqli_query($conn, $query1);
    $ris2 = mysqli_query($conn, $query2);
    //inserisco i risultati delle due query in due array associativi necessari per mostrare il problema e recuperare le informazioni sull'utente se necessario
    $segnalazioni = mysqli_fetch_all($ris1, MYSQLI_ASSOC);
    $problemi= mysqli_fetch_assoc($ris2);
	//query per identificare l'utente
	$query3 ="SELECT * FROM Utenti WHERE Utenti.secretID = ". $problemi ["secretID"].";"; //" SELECT Nome, Cognome FROM Utenti WHERE  Utenti.secretID =".$segnalazioni["secretID"];
    $ris3 = mysqli_query($conn, $query3);
	$utenti = mysqli_fetch_assoc($ris3);
	
	$qt = "SELECT descrizione FROM DizionarioTag WHERE idTag IN (SELECT idTag FROM tagBridge WHERE idProblema =".$problemi["idProblema"].");";
	$risqt = mysqli_query($conn, $qt);
	$aTag = [];
	$i= 0;

	
?>

<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Titolo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
		<link rel="stylesheet" type="text/css" href="http://localhost/2.0/css/main.css"
		> 
		<link rel="stylesheet" type="text/css" href="http://localhost/2.0/css/report.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        
</head>
<body>
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
					<li> <a href="http://localhost/2.0/index.php">Home</a></li>
					<li> <a href="http://localhost/2.0/problemi.html">Naviga Problemi</a></li>
					<li> <a href="http://localhost/2.0/report.php">Riporta Problema</a></li>
					<li> <a href="http://localhost/2.0/login.html">Login/Registrati</a></li>
					<li><a href="http://localhost/2.0/cerca.php"> Cerca Problemi</a><li>
				</ul>

			</nav>
		<!--Menu a scomparsa-->
			<div id="side-menu" class="side-nav">
					<a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
					<a href="http://localhost/2.0/index.php">Home</a>
					<a href="http://localhost/2.0/problemi.html">Naviga Problemi</a></a>
					<a href="http://localhost/2.0/report.php">Riporta Problema</a>
					<a href="http://localhost/2.0/login.html">Login/Registrati</a>
					<li><a href="http://localhost/2.0/cerca.php"> Cerca Problemi</a><li>
			</div>

			
			


<!--Descrizione problema -->
	<div class="stripe" style="opacity:0.95;">
			<div><p> id Problema:</p> <p id="idProblema"> <?php echo $problemi["idProblema"]; ?> </p> </div>
			<h1><?php echo $problemi["titolo"];?></h1>
			<h5 style="color: black;"> <?php echo $problemi["descrizione"];?> </h5>
			<p>  <?php   
			
				 	if ($problemi["boolAnonimo"] == 0) {
							echo'<p> codice utente: ';echo $utenti["secretID"]; echo'</p>';
						  echo ("che corrisponde all'utente: ".$utenti["Nome"]." " . $utenti[ "Cognome"]);
					  }
					else if($problemi["boolAnonimo"] == 1){
						  	echo "<b> L'utente ha deciso di effetturare la segnalazione in modo anonimo </b>	";
					  }
					  $qt = "SELECT descrizione FROM DizionarioTag WHERE idTag IN (SELECT idTag FROM tagBridge WHERE idProblema =".$problemi["idProblema"].");";
					  $risqt = mysqli_query($conn, $qt);
					  $aTag = [];
					  $i= 0;
					  echo'<p> <b> Tags: </b>';
					  while($row = mysqli_fetch_assoc($risqt)){
						 echo$row['descrizione']." ";
					  } echo'</p>';
					 
					 
					 
				?>
	</div>




				<!--Sezione inserimento commenti--> 
		<div style="width: 100%; overflow: hidden;">
			<div style="width: 600px;float: left;">
				<form id="getForm">
					<label for="commento" style=> <b>Commenta il problema!</b> </label><br>
					<input type="submit" id="button" value="Submit" style="background-color:#3b5998;	color:white; float: left; margin-left:30px;"></button>
					<textarea id="commento" class="descrizione" placeholder="Esprimi una tua opinione riguardo al problema" > </textarea><br>
					
				</form>
			</div>


				<div style="margin-left: 640px; "	>
					<?php 		
							    require("config/config.php");
								require("config/db.php");
								session_start();
								$_SESSION["IdProblema"] = mysqli_real_escape_string($conn,$_GET["id"]);
							$query4= "SELECT idCommento,descrizione,secretId FROM Commenti WHERE idProblema=".$id;
							$ris4 = mysqli_query($conn, $query4);
							$commenti=  mysqli_fetch_all($ris4,MYSQLI_ASSOC); 
						 for($i=0;$i<count($commenti);$i++): ?>
						<div style="opacity:0.95; background: #f4f4f4; margin: auto; width:1000px; border-radius: 20px; text-align: center; color: #3b5998;   ">
							 <?php echo("<h3> id commento: ".$commenti[$i]["idCommento"]." </h3>");?>
							<p> <?php echo $commenti[$i]["descrizione"];?></p>
								<p><small>creato dall' utente con id <?php echo $commenti[$i]["secretId"];?></small></p> 

						</div>
					<?php endfor;?>
				</div>
		</div>


    
    
    
    <script>

		document.getElementById('button').addEventListener('click', comment);


			function createJson(){
			var myObj = {
				secretIdUtente: <?php echo $_SESSION["secretID"];?>,
				commento: document.getElementById("commento").value,
				idProblema: document.getElementById("idProblema").innerHTML
			};
			return myObj;
		}
		
		document.getElementById('getForm').addEventListener('submit', comment);
		// funzione per effetturare la richiesta asincrona
		function comment(e){
			e.preventDefault();
			var json = createJson();
			console.log(json);
			var xhr = new XMLHttpRequest();
			xhr.open("POST","comment.php",true);
			xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

			xhr.onload = function(){
				console.log(this.responseText);
			}

			xhr.send(JSON.stringify(json));

			if(this.responseText === "inserimento avvenuto con successo"){
				location.reload();
			}
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