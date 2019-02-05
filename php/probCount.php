<?php
    require("config/db.php");
    require("config/config.php");
    $data = file_get_contents('php://input'); //sto passando dati tramite il body http invece che direttamente dal form pertanto devo utilizzare questa funzione per accedere al contenuto
    //Query per selezionare tutti i problemi che non sono stati risolti e visualizzarli
    //$query1 = "SELECT secretID FROM Problemi GROUP BY secretID ORDER BY COUNT(*) DESC LIMIT    1";
    $query1="SELECT COUNT(*) FROM Problemi WHERE SecretID= ".$data." ORDER BY COUNT(*) DESC LIMIT 1";
    $exe=mysqli_query($conn, $query1);
    $count = mysqli_fetch_assoc($exe);

    echo(json_encode($count));
?>