<?php
    require("config/config.php");
    require("config/db.php");
    session_start();
    //prendo le variabili che mi arrivano tramite richiesta HTTP
    $ID = file_get_contents("php://input"); //normalmente php non può leggere nella post le variabili json per tanto devo andarle a cercare nel corpo della richiesta

    $query3 ="SELECT * FROM Utenti WHERE Utenti.secretID = ". $ID.";"; //" SELECT Nome, Cognome FROM Utenti WHERE  Utenti.secretID =".$segnalazioni["secretID"];
    $ris3 = mysqli_query($conn, $query3);
    $secretID = mysqli_fetch_assoc($ris3);
    $x= json_encode($secretID);
    echo($x)


?>