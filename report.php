<?php
    session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>2.0</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="http://localhost/2.0/css/main.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/2.0/css/report.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
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
                <li><a href="http://localhost/2.0/index.php">Home</a></li>
                <li><a href="http://localhost/2.0/prova.php">Naviga Problemi</a></li>
                <li><a href="#">Riporta Problema</a></li>
                <li><a href="http://localhost/2.0/login.php">Login/Registrati</a></li>
            </ul>

            </nav>
        <!--Menu a scomparsa-->
            <div id="side-menu" class="side-nav">
                <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
                <a href="http://localhost/2.0/index.php">Home</a>
                <a href="http://localhost/2.0/prova.php">Naviga Problemi</a></a>
                <a href="#">Riporta Problema</a>
                <a href="http://localhost/2.0/login.php">Login/Registrati</a>
            </div>
    </div>

<!--FORM INSERIMENTO PROBLEMA-->

    <div>
        <form enctype="multipart/form-data">
            <label for="titolo"><b> Inserisci il titolo del problema: </b></label> <br>
            <input type="text" id="titolo" name="titolo" class="titolo" placeholder="TITOLO" required> <br>
            <label for="descrizione"><b> Descrivi il problema che hai riscontrato: </b></label> <br>
            <textarea name="descrizione" id="descrizione" class="descrizione" placeholder="Descrivi il problema che hai riscontrato..." required> </textarea><br>
            <label for="tag"><b>Inerisci alcuni tag per caratterizzare il problema</b></label> <br>
            <input type="text" id="tag" name="tag" class="tag" placeholder="Inserisci dei tag per caratterizzare il problema "> <br><br>
            <input type="checkbox" id="anonimo" name="anonimo" class="anonimo">Desideri rimanere anonimo? <br><br>
            <p class="posiziona">Carica una foto</p> <input type="file" name="foto" class="foto" accept="image/*"> 
            <p class="posiziona">Seleziona una categoria</p>
            <select type="text" id="categoria" name="categoria" class="categoria" required>
                    <option value="sanita">sanita</option>
                    <option value="trasporti">trasporti</option>
                    <option value="ordine pubblico">ordine pubblico</option>
                    <option value="istruzione">istruzione</option>
                    <option value="amministrazione">amministrazione</option>
                    <option value="altro">altro</option>
            </select> 
            <button type="submit" id="button"style ="margin-left: 300px;" onclick="sendProb()">Invia!</button>

        </form>
        <script>
            document.getElementById('button').addEventListener('click', sendProb);
            //funzione per creare il json da inviare con la richiesta asincrona
            function createJson(){
                var myObj = {
                    titolo : document.getElementById("titolo").value,
                    descrizione : document.getElementById("descrizione").value,
                    tag: document.getElementById("tag").value,
                    anonimo: document.getElementById("anonimo").value,
                    categoria: document.getElementById("categoria").value
                };
                return myObj;
            }
            // funzione per effetturare la richiesta asincrona
            function sendProb(e){
                e.preventDefault();
                var json = createJson();
                var xhr = new XMLHttpRequest();
                xhr.open("POST","insert.php",true);
                var x = this.responseText;
                console.log(x);
                xhr.send(json);
                var x = this.responseText;
                console.log(x);
            }
                
        </script>
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