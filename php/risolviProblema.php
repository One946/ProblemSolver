<?php
    require("config/db.php");
    require("config/config.php");
    $data = file_get_contents('php://input'); //sto passando dati tramite il body http invece che direttamente dal form pertanto devo utilizzare questa funzione per accedere al contenuto
    $query="UPDATE Problemi SET dataRisol = NOW() WHERE idProblema = ".$data." ;";
    if(mysqli_query($conn, $query)){
        $query2="INSERT INTO StatoProblema (idProblema, idStato) VALUES (".$data.", 1);";
        if(mysqli_query($conn, $query2)){
            echo("Prolema risolto correttamente");
        }else{
            echo("Errore nella risoluzione del problema in fase 2");
            echo$query2;
        }
    }else{
        echo("Errore nella risoluzione del problema in fase 1");
    }
?>