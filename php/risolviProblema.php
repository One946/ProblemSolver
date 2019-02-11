<?php
    require("config/db.php");
    require("config/config.php");
    $data = file_get_contents('php://input'); //sto passando dati tramite il body http invece che direttamente dal form pertanto devo utilizzare questa funzione per accedere al contenuto
    $query="UPDATE Problemi SET dataRisol = NOW() WHERE idProblema = ".$data." ;";//imposto come data della risoluzione del problema quella attuale
    if(mysqli_query($conn, $query)){
        $query2="UPDATE StatoProblema SET idStato=1 WHERE idProblema = ".$data.";";// modifico lo stato del problema da problema aperto a problema risolto
        if(mysqli_query($conn, $query2)){
            echo("Prolema risolto correttamente");
        }else{
            echo("Errore nella risoluzione del problema in fase 2");
        }
    }else{
        echo("Errore nella risoluzione del problema in fase 1");
    }
?>