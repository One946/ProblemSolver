<?php
    session_start();
    require("config/db.php");
    require("config/config.php");
    $idProblema= file_get_contents("php://input");//prendo l'id del problema dalla post
    //cerco i commenti relativi al problema
    $q= "SELECT * FROM Commenti WHERE idProblema =".$idProblema." ORDER BY idCommento DESC";
    $ris=mysqli_query($conn,$q);
    $commenti= mysqli_fetch_all($ris, MYSQLI_ASSOC);
    //cerco gli utenti relativi ai commenti
    $q = "SELECT * FROM Utenti WHERE secretID IN (SELECT secretID FROM Commenti WHERE idProblema= ".$idProblema.");";
    $ut=mysqli_query($conn,$q);
    
    $autenti=array();
    // Associative array
    while($row=mysqli_fetch_assoc($ut))
    {
      $autenti[]=$row;//array righe tab utenti
    }

    //inserisco le informazioni degli utenti e dei commenti in un arrau
    $array=array(
        "commenti" => $commenti,
        "utenti" => $autenti,
    );
    //invio le informazioni al client
    $json=json_encode($array);
    echo( $json);  
    mysqli_close($conn);
?>   