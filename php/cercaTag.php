<?php //BACHECA VISUALIZZAZIONE PROBLEMI
    require("config/db.php");
    require("config/config.php");
    session_start();
//Query per selezionare tutti i problemi che non sono stati risolti e visualizzarli
$tag= $_POST["cercaTag"];
$arrayTag= explode(" ", $tag);
$prob=[];

for ($i=0; $i<count($arrayTag); $i++){
    $query1 = "SELECT * FROM Problemi  WHERE idProblema IN (SELECT idProblema FROM tagBridge WHERE idTag IN (SELECT idTag FROM DizionarioTag WHERE descrizione = '{$arrayTag[$i]}'))";
    //Prendi il risultato
    $ris1 =mysqli_query($conn, $query1);
    if($ris1){
    //Inserisco il risultato della query in un array associativo
        $a= mysqli_fetch_all($ris1,MYSQLI_ASSOC);
        if(!is_null($a)){
            array_push($prob,$a);
        } else{
            continue;
        }
        mysqli_free_result($ris);
    }
}   
mysqli_close($conn);

?>
<!--DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Titolo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="http://localhost/PROblemSolver/css/main.css">
</head>
<body class="parallax" >     
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
                <li><a href="http://localhost/PROblemSolver/index.php">Home</a></li>
                <li><a href="#">Naviga Problemi</a></li>
                <li><a href="http://localhost/PROblemSolver/report.php">Riporta Problema</a></li>
                <li><a href="http://localhost/PROblemSolver/login.php">Login/Registrati</a></li>
                <li><a href="http://localhost/PROblemSolver/cerca.php"> Cerca Problemi</a><li>
            </ul>

            </nav>
        <!--Menu a scomparsa-->
            <div id="side-menu" class="side-nav">
                <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
                <a href="http://localhost/PROblemSolver/index.php">Home</a>
                <a href="http://localhost/PROblemSolver/prova.php">Naviga Problemi</a></a>
                <a href="#">Riporta Problema</a>
                <a href="http://localhost/PROblemSolver/login.php">Login/Registrati</a>
            </div>
    </div>

    <?php
        for($i=-0; $i<count($prob)+1;$i++){
            foreach($prob[$i] as $titoli){
            echo('<div style="opacity:0.95; background: #f4f4f4; margin: auto; width:1000px; border-radius: 20px; text-align: center; color: #3b5998;   ">');
                echo("<h3>".$titoli["titolo"]."</h3>");
                echo("<p>".$titoli["descrizione"]."</p>");
                echo('<a class="btn btn-default" href="'.ROOT_URL.'problema.php?id='.$titoli["idProblema"].'"style="color: #3b5998;"><b>Per saperne di più</b></a>');
                echo'</div>';  
            }
        }
    ?>

   <!-- faccio un ciclo per mostrare tutti i problemi-->


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