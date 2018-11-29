<?php
    require("config/config.php");
    require("config/db.php");
	session_start();
	$_SESSION["IdProblema"] = mysqli_real_escape_string($conn,$_GET["id"]);

    //recupera l'id
    $id = mysqli_real_escape_string($conn,$_GET["id"]);

    $query1 = "SELECT * FROM Segnalazioni WHERE idProblema = ".$id;
    $query2 = "SELECT * FROM Problemi WHERE idProblema =".$id;
    
    //Prendi il risultato
    $ris1 = mysqli_query($conn, $query1);
    $ris2 = mysqli_query($conn, $query2);
    //inserisco i risultati delle due query in due array associativi necessari per mostrare il problema e recuperare le informazioni sull'utente se necessario
    $segnalazioni = mysqli_fetch_all($ris1, MYSQLI_ASSOC);
    $problemi= mysqli_fetch_assoc($ris2);
    $query3 ="SELECT * FROM Utenti WHERE Utenti.secretID = ". $problemi ["secretID"]; //" SELECT Nome, Cognome FROM Utenti WHERE  Utenti.secretID =".$segnalazioni["secretID"];
    $ris3 = mysqli_query($conn, $query3);
    $utenti = mysqli_fetch_assoc($ris3);
?>