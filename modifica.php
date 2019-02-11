<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>2.0</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="http://localhost/2.0/css/main.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/2.0/css/report.css">
    <script src="http://localhost/2.0/js/modifica.js"></script>
</head>
<body>
    <div class="container">


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
                <li><a href="http://localhost/2.0/index.html">Home</a></li>
                <li><a href="http://localhost/2.0/problemi.html">Naviga Problemi</a></li>
                <li><a href="http://localhost/2.0/risolti.html">Naviga Problemi Risolti</a></li>
                <li><a href="#">Riporta Problema</a></li>
                <li><a href="http://localhost/2.0/login.html">Login/Registrati</a></li>
                <li><a href="http://localhost/2.0/cerca.html"> Cerca Problemi</a><li>
                <button id="p"style="background-color:#3b5998; color:white; border:none;margin-top:15px;">LogOut</button>
            </ul>
                <script>
                    //verifico se l'utente è loggato
                    var logged = document.cookie.substring(document.cookie.indexOf("secretID:"),document.cookie.indexOf(";"));
                    var a = logged.split("=");
                    var id = parseInt(a[1]);
                    if(!isNaN(id)){
                        document.getElementById("p").style.visibility="visibile";
                    }else{
                        document.getElementById("p").style.visibility="hidden";
                    }


                    document.getElementById("p").addEventListener("click",logout);
                    //funzione di logout
                function logout(){
                    var d = new Date();
                        d.setTime(d.getTime() *0);
                        var expires = "expires="+ d.toUTCString();
                        console.log(document.cookie);
                        console.log(document.cookie["secretID"]);
                        //document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
                    document.cookie="secretID"+"="+document.cookie+";"+expires+"path=/"
                    console.log(document.cookie);
                }
                </script>

            </nav>
        <!--Menu a scomparsa-->
            <div id="side-menu" class="side-nav">
                <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
                <a href="http://localhost/2.0/index.html">Home</a>
                <a href="http://localhost/2.0/problemi.html">Naviga Problemi</a></a>
                <a href="#">Riporta Problema</a>
                <a href="http://localhost/2.0/login.html">Login/Registrati</a>
                <li><a href="http://localhost/2.0/cerca.html"> Cerca Problemi</a><li>
            </div>
    </div>

<!--FORM INSERIMENTO PROBLEMA-->

    <div>
        <form id="form">
            <label for="numProb"><b> Inserisci il numero del problema da modificare: </b></label> <br>
            <p> </p>

            <label for="titolo"><b> Inserisci il titolo del problema: </b></label> <br>
            <input type="text" id="titolo"  class="titolo" placeholder="TITOLO" required> <br>
            
            <label for="descrizione"><b> Descrivi il problema che hai riscontrato: </b></label> <br>
            <textarea id="descrizione" class="descrizione" placeholder="Descrivi il problema che hai riscontrato..." required> </textarea><br>
            
            <label for="tag"><b>Inerisci alcuni tag per caratterizzare il problema</b></label> <br>
            <input type="text" id="tag" class="tag" placeholder="Inserisci dei tag per caratterizzare il problema "> <br><br>
            
            <input type="checkbox" id="anonimo" class="anonimo">Desideri rimanere anonimo? <br><br>
            
            <label for="tag"><b>Inerisci l'ubicazione del problema</b></label> <br>
            <input type="text" id="ubicazione" class="tag" placeholder="Inserisci l'ubicazione del problema"> <br><br>

            <p class="posiziona">Seleziona una categoria</p>
            <select type="text" id="categoria" class="categoria" required>

            


            </select>
            <button type="submit" id="button"style ="margin-left: 300px;">Invia!</button>

        </form>
    </div>


   <script>

   
//creazione json

var crtJson = function () {
           var problema= {
               idProblema:<?php echo($_GET["idProb"]);?>,
               titolo: document.getElementById("titolo").value,
               descrizione: document.getElementById("descrizione").value,
               tag: document.getElementById("tag").value,
               anonimo: document.getElementById("anonimo").checked,
               categoria: document.getElementById("categoria").value,
                ubicazione: document.getElementById("ubicazione").value,
                secretID:id
           };
           return problema;
       }
   
   //script per il menù a scomparsa 
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