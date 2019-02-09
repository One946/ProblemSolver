<?php
    require("config/config.php");
    require("config/db.php");
    session_start();
        //prendo le variabili che mi arrivano tramite richiesta HTTP
        $id = file_get_contents("php://input"); //normalmente php non può leggere nella post le variabili json per tanto devo andarle a cercare nel corpo della richiesta

	//query per prelvare problemi
    $query2 = "SELECT * FROM Problemi WHERE idProblema =".$id;
    
    //Prendi il risultato
    $ris2 = mysqli_query($conn, $query2);
    //inserisco i risultati delle due query in due array associativi necessari per mostrare il problema e recuperare le informazioni sull'utente se necessario
    $problema= mysqli_fetch_assoc($ris2);

	//query per identificare l'utente
	$query3 ="SELECT * FROM Utenti WHERE Utenti.secretID = ". $problema ["secretID"].";"; //" SELECT Nome, Cognome FROM Utenti WHERE  Utenti.secretID =".$segnalazioni["secretID"];
    $ris3 = mysqli_query($conn, $query3);
    $utenti = mysqli_fetch_assoc($ris3);
    
	//query per ottenere i tag
	$qt = "SELECT descrizione FROM DizionarioTag WHERE idTag IN (SELECT idTag FROM tagBridge WHERE idProblema =".$problema["idProblema"].");";
	$risqt = mysqli_query($conn, $qt);
    while($row = mysqli_fetch_assoc($risqt)){
        $aTag[] = $row["descrizione"];
    }
    $array=array(
        "problema" => $problema,
        "utenti" => $utenti,
        "tag" => $aTag
    );
   //rispondo al client 
    $json=json_encode($array);
    echo $json;
	
?>