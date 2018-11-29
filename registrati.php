<?php
  session_start();
?>  



<!DOCTYPE html>
<html>
<head>
  <title>Registrati</title>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  -->
  <link rel="stylesheet" type="text/css" href="http://localhost/2.0/css/main.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/2.0/css/registrati.css">
</head>
<body>

<div class="container">
  <form>
  

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
            <li><a href="http://localhost/2.0/prova.php">Naviga Problemi</a></li>
            <li><a href="http://localhost/2.0/report.php">Riporta Problema</a></li>
            <li><a href="#">Login/Registrati</a></li>
          </ul>
  
        </nav>
      <!--Menu a scomparsa--> 
        <div id="side-menu" class="side-nav">
            <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
            <a href="http://localhost/2.0/index.php">Home</a>
            <a href="http://localhost/2.0/prova.php">Naviga Problemi</a></a>
            <a href="http://localhost/2.0/report.php">Riporta Problema</a>
            <a href="#">Login/Registrati</a>
        </div>
    
    <h1>Registrati</h1>
    <p>Inserisci i tuoi dati per creare un account.</p>

    <label for="email"><b> Email </b></label>
    <input type="text" placeholder="Email" name="email" required>

    <label for="nome"><b> Nome </b></label>
    <input type="text" placeholder="Nome" name="nome" required>

    <label for="cognome"><b> Cognome </b></label>
    <input type="text" placeholder="Cognome" name="cognome" required>

    <label for="cf"><b> Codice Fiscale </b></label>
    <input type="text" placeholder="Codice Fiscale" name="cf" required maxlength="16" minlength="16">

    <label for="psw"><b> Password </b></label>
    <input type="password" placeholder="Password" name="psw" required>

    <label for="psw-repeat"><b> Inserisci nuovamente la password </b></label>
    <input type="password" placeholder="Password" name="psw-repeat" required>
    
    
    <a class="termini" href="#" style="color:dodgerblue">Termini e Politiche di Privacy</a>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </form>
</div>

<script>
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
