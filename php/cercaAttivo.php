<?php //BACHECA VISUALIZZAZIONE PROBLEMI
    require("config/db.php");
    require("config/config.php");
    session_start();
//Query per selezionare tutti i problemi che non sono stati risolti e visualizzarli2
    $query1 = "SELECT * FROM Utenti  WHERE secretID = (SELECT secretID FROM Problemi GROUP BY secretID ORDER BY COUNT(*) DESC LIMIT    1)";

    
    //Prendi il risultato
    $ris1 = mysqli_query($conn, $query1);
    //Inserisco il risultato della query in un array associativo
    $prob = mysqli_fetch_all($ris1,MYSQLI_ASSOC);
    mysqli_free_result($ris);
    mysqli_close($conn);

?>