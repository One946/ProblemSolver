<?php
    require("config/db.php");
    session_start();

    //inizializzazione variabili da inserire nel db
    //il comando myqli_real_escape_string non funziona come mi aspetto
    $anonimo = $_REQUEST["anonimo"];
    $titolo = $_REQUEST["titolo"];
    $descrizione = $_REQUEST["descrizione"];
    $tag = $_REQUEST["tag"];
    //$anonimo= mysqli_real_escape_string($conn,$_REQUEST["anonimo"]); non mi serve usare l'escape perchè sovrascrivo la variabile
    $categoria = $_REQUEST["categoria"];
    if ($anonimo == "on"){
        $anonimo = 1;
    } else{
        $anonimo = 0;
    }


    //la variabile secretID viene presa dalla sessione dell'utente loggato per tanto per ora è arbitraria come la variabile votourgenza
    // allineare variabili categoria con quelle del db
    //query di inserimento problema nel db
    $qProb= "INSERT INTO Problemi (secretID, votoUrgenza, tag, boolAnonimo, idUbicazione, idCategoria, descrizione, titolo) VALUES (0, 0, '".$tag."', ".$anonimo.", 2, 1, '".$descrizione."', '".$titolo."')" ;
   
   
    if (mysqli_query($conn, $qProb)) {
        //query per ottenere l'id del problema appena creato

        $qID= "SELECT idProblema FROM Problemi WHERE (boolAnonimo = '$anonimo') &&  (descrizione = '$descrizione') && (titolo = '$titolo')";
        $risID = mysqli_query($conn, $qID);
        $idProb = mysqli_fetch_assoc($risID);   
        //la variabile $a equivale all'id del problema
        $a=$idProb["idProblema"]; 
        //echo($idProb["idProblema"]); //query funzionante
    } else {
        echo "Error: ". mysqli_error($conn);
    }


    //query di creazione della segnalazione
    $qSegn="INSERT INTO Segnalazioni (idProblema) VALUES($a)";
    if (mysqli_query($conn, $qSegn)) {
        $b= "La segnalazione del problema è avvenuta correttamente!";
    }else {
        $b= "si è verificato un errore riprova";
        die(mysqli_error($conn));
    }

    
    //inserimento tag nel database

    $arrayTag= explode(" ", $tag); //divido la singola stringa che ricevo come input dei tag in tanti piccoli tag da inserire nel dizionario o da legare al problema
  
    foreach ($arrayTag as $arrayTag){
            //query di inserimento tag
        $qTag = "INSERT INTO DizionarioTag (descrizione) VALUES ('$arrayTag')";
        $exqTag=mysqli_query($conn,$qTag);
        //devo verificare che la query è andata a buon fine?    
        //query per ottenere l'id del tag appena inserito nel dizionario
        $qIdTag= "SELECT idTag FROM DizionarioTag WHERE descrizione = '$arrayTag'";
        $risIdTag= mysqli_query($conn,$qIdTag);
        $idTag = mysqli_fetch_assoc($risIdTag);
        $valId = $idTag['idTag'];
        if($valId){                        
            //query di collegamento Tag-Problema
            $qBridge = "INSERT INTO tagBridge (idProblema, idTag) VALUES ($a,   $valId)";
            if($conn->query($qBridge)){  //PDO
                
                $k="il tag è stato inserito correttamente";
            }else{ 
                echo 'errore!';
            }
        }
        
    } 
    
    mysqli_close($conn);

?>
