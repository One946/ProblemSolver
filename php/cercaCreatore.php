<?php //BACHECA VISUALIZZAZIONE PROBLEMI
    require("config/db.php");
    require("config/config.php");
    $data = file_get_contents('php://input'); //sto passando dati tramite il body http invece che direttamente dal form pertanto devo utilizzare questa funzione per accedere al contenuto
    $arrayUtente=json_decode($data,true);
//Query per selezionare tutti i problemi che non sono stati risolti e visualizzarli2
    $query1 = "SELECT * FROM Problemi  WHERE secretID IN (SELECT secretID FROM Utenti WHERE (Nome = '{$arrayUtente['Nome']}') && (Cognome = '{$arrayUtente['Cognome']}'))";

    //Prendi il risultato
    $ris1 = mysqli_query($conn, $query1);
    //Inserisco il risultato della query in un array associativo
    $prob = mysqli_fetch_all($ris1,MYSQLI_ASSOC);
    echo(json_encode($prob));
    
    mysqli_free_result($ris);
    mysqli_close($conn);

?>