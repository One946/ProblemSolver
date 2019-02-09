<?php //BACHECA VISUALIZZAZIONE PROBLEMI
    require("config/db.php");
    require("config/config.php");
    session_start();
//Query per selezionare tutti i problemi che non sono stati risolti e visualizzarli
    $query1 = "SELECT * FROM Problemi WHERE idProblema IN (SELECT idProblema FROM StatoProblema WHERE idStato = 1) ORDER BY idProblema DESC";
    
    //Prendi il risultato
    $ris1 = mysqli_query($conn, $query1);
    //Inserisco il risultato della query in un array associativo
    $prob = mysqli_fetch_all($ris1,MYSQLI_ASSOC);
    mysqli_free_result($ris);
    mysqli_close($conn);
    //rispondo al client con l'informazione desiderata
    $problemi = json_encode($prob);
    echo($problemi);
?>