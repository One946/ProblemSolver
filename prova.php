<?php //BACHECA VISUALIZZAZIONE PROBLEMI
    require("config/db.php");
    require("config/config.php");
    session_start();

    $query1 = "SELECT * FROM Problemi ORDER BY idProblema DESC";

    
    //Prendi il risultato
    $ris1 = mysqli_query($conn, $query1);
    //Inserisco il risultato della query in un array associativo
    $prob = mysqli_fetch_all($ris1,MYSQLI_ASSOC);
    mysqli_free_result($ris);
    mysqli_close($conn);

?>
<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Titolo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="http://localhost/2.0/css/main.css">
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



   <!-- faccio un ciclo per mostrare tutti i problemi-->
    <?php foreach($prob as $titoli) : ?>

        <div style="opacity:0.95; background: #f4f4f4; margin: auto; width:1000px; border-radius: 20px; text-align: center; color: #3b5998;   ">
            <h3><?php echo $titoli["titolo"];?></h3>
            <p> <?php echo $titoli["descrizione"];?></p>
            <a class="btn btn-default" href="<?php echo ROOT_URL;?>problema.php?id=<?php echo $titoli["idProblema"]; ?>" style="color: #3b5998;"><b>Per saperne di più</b></a>

        </div>
    <?php endforeach;?>



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