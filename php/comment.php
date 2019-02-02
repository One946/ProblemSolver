<?php
    require("config/config.php");
    require("config/db.php");
    $data = file_get_contents('php://input'); //sto passando dati tramite il body http invece che direttamente dal form pertanto devo utilizzare questa funzione per accedere al contenuto
    $x = json_decode($data,true); //dopo semplicemente  eseguo un decode per inserire i dati in un array il parametro true serve a far si che vengano effettivamente inseriti in un array

    $commento = $x["descrizione"];
    $secretID = $x["secretID"];
    $idProblema = $x["idProblema"];

    //controllo se il commento è una riga vuota
    
    if($commento === " "){
        echo"ERRORE COMMENTO VUOTO";
        mysqli_close($conn);
    }
    
    //inserisco il commento nel db
    $qCom = "INSERT INTO Commenti (secretId, idProblema, descrizione, boolVisibile) VALUES ('$secretID', '$idProblema', '$commento', 1) ";
    if(mysqli_query($conn, $qCom)){
        echo"commento inserito con successo";
    }  else{
            echo'errore:'.mysqli_error($conn);
        }
        
?>      