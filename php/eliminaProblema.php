<?php
    require("config/db.php");
    require("config/config.php");
    $data = file_get_contents('php://input');    //prendo l'id del problema dalla richiesta POST
    //imposto una data di risoluzione del problema per non farlo più comparire nella ricerca dei problemi aperti
    $query="UPDATE Problemi SET dataRisol = NOW() WHERE idProblema = ".$data." ;";
    if(mysqli_query($conn, $query)){
        //identifico il problema nella tabella di bridge come problema oscurato
        $query2="UPDATE StatoProblema SET idStato=0 WHERE idProblema = ".$data.";";
        if(mysqli_query($conn, $query2)){
            echo("Prolema eliminato correttamente");
        }else{
            echo("Errore nell'eliminazione del problema in fase 2");
            echo$query2;
        }
    }else{
        echo("Errore nell'eliminazione del problema in fase 1");
    }
    mysqli_close($conn);
?>