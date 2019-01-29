<?php
    session_start();
    require("config/db.php");
    require("config/config.php");
    $idProblema= file_get_contents("php://input");
    $q= "SELECT * FROM Commenti WHERE idProblema =".$idProblema." ORDER BY idCommento DESC";
    $ris=mysqli_query($conn,$q);
    $com= mysqli_fetch_all($ris, MYSQLI_ASSOC);
    $commenti=json_encode($com);
    echo($commenti);   

?>  