<?php
    session_start();
    require("config/db.php");
    require("config/config.php");
    $idProblema= file_get_contents("php://input");
    $q= "SELECT * FROM Commenti WHERE idProblema =".$idProblema." ORDER BY idCommento DESC";
    $ris=mysqli_query($conn,$q);
    $commenti= mysqli_fetch_all($ris, MYSQLI_ASSOC);

    $q = "SELECT * FROM Utenti WHERE secretID IN (SELECT secretID FROM Commenti WHERE idProblema= ".$idProblema.");";
    $ut=mysqli_query($conn,$q);
    //$autenti = mysqli_fetch_assoc($ut);
    
    $autenti=array();
    // Associative array
    while($row=mysqli_fetch_assoc($ut))
    {
      $autenti[]=$row;//array righe tab utenti
    }


    $array=array(
        "commenti" => $commenti,
        "utenti" => $autenti,
    );
    $json=json_encode($array);
    echo( $json);  

?>   