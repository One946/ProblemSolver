<?php
    require("config/db.php");
    require("config/config.php");
    $data = file_get_contents('php://input'); //sto passando dati tramite il body http invece che direttamente dal form pertanto devo utilizzare questa funzione per accedere al contenuto
    $query="UPDATE Problemi SET dataRisol = NOW(), ModificaDi = ".$data." WHERE idProblema = ".$data." ;";
    
    if(mysqli_query($conn, $query)){
        $query2="INSERT INTO StatoProblema (idProblema, idStato) VALUES (".$data.", 3);";
        if(mysqli_query($conn, $query2)){
            echo("Prolema modificato correttamente");
        }else{
            echo("Errore nella modifica del problema in fase 2");
            echo$query2;
        }
    }else{
        echo("Errore nella modifica del problema in fase 1");
    }

?>