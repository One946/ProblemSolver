<?php
    require("config/db.php");
    require("config/config.php");
    $data = file_get_contents('php://input'); 
    //conto i problemi dell'utente
    $query1="SELECT COUNT(*) FROM Problemi WHERE SecretID= ".$data." ORDER BY COUNT(*) DESC LIMIT 1";
    $exe=mysqli_query($conn, $query1);
    $count = mysqli_fetch_assoc($exe);
    //rispondo al client
    echo(json_encode($count));
?>