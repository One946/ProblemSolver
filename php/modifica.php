<?php
    require("config/db.php");
    require("config/config.php");
    //prendo le variabili che mi arrivano tramite richiesta HTTP
    $data = file_get_contents("php://input"); //normalmente php non può leggere nella post le variabili json per tanto devo andarle a cercare nel corpo della richiesta
    $x=json_decode($data, true);
    var_dump($x);

    $query1="SELECT * FROM Problemi WHERE idProblema = ".$x["idProblema"].";";
    $risq1=mysqli_query($conn,$query1);
    if($risq1){
        $pOld= mysqli_fetch_assoc($risq1);
        if($pOld["secretID"]==$x["secretID"]){
            $anonimo = $x["anonimo"];
            $titolo = $x["titolo"];
            $descrizione = $x["descrizione"];
            $tag = $x["tag"];
            //$anonimo= mysqli_real_escape_string($conn,$_REQUEST["anonimo"]); non mi serve usare l'escape perchè sovrascrivo la variabile
            $categoria = $x["categoria"];
            $ubicazione = $x["ubicazione"];
            $secretID= $x["secretID"];
        
            if ($anonimo == "true"){
                $anonimo = 1;
            } else{
                $anonimo = 0;
            }
        //inserisco l'ubicazione nel DB se non è presente
        $qIU="INSERT INTO Ubicazioni(descrizione) VALUES('$ubicazione')";
        if(mysqli_query($conn, $qIU)){
            $qIdUb="SELECT idUbicazione FROM Ubicazioni WHERE descrizione = '".$ubicazione."'"; //query selezione idUbicazione
            $rIdUb = mysqli_query($conn,$qIdUb); //esecuzione delle query
            $idUbicazione= mysqli_fetch_assoc($rIdUb);  //risultato della query
        }else{//se è presente la seleziono
            $qIdUb="SELECT idUbicazione FROM Ubicazioni WHERE descrizione = '".$ubicazione."'"; //query selezione idUbicazione
            $rIdUb = mysqli_query($conn,$qIdUb); //esecuzione delle query
            $idUbicazione= mysqli_fetch_assoc($rIdUb);  //risultato della query
          }
        
        
        //seleziono la categoria per l'inserimento nel db
        $qCat= "SELECT idCategoria FROM Categorie WHERE descrizione ='".$categoria."'";
        $risCat=mysqli_query($conn, $qCat);
        if($risCat){
            $cate=mysqli_fetch_assoc($risCat);
        }else{
            echo("errore nella selezione della categoria");
        }
    
        //la variabile secretID viene presa dalla sessione dell'utente che ha effettuato il login
        //query di inserimento problema nel db
        $qProb= "INSERT INTO Problemi (secretID, boolAnonimo, idUbicazione, idCategoria, descrizione, titolo, ModificaDi) VALUES (".$secretID.", ".$anonimo.", ".$idUbicazione["idUbicazione"].",".$cate["idCategoria"]." , '".$descrizione."', '".$titolo."',".$x["idProblema"].")" ;
    
        
        if (mysqli_query($conn, $qProb)) { //se la query va a buon fine eseguo la query per ottenere l'id del problema creato che viene creato in automatico tramite l'auto increment
            //query per ottenere l'id del problema appena creato
    
            $qID= "SELECT idProblema FROM Problemi WHERE ModificaDi = ".$x["idProblema"];
            $risID = mysqli_query($conn, $qID);
            $idProb = mysqli_fetch_assoc($risID);   
            //la variabile $a equivale all'id del problema
            $idNew=$idProb["idProblema"]; 
        } else {
            //altrimenti stampo un messagio d'errore
            echo "Error: ". mysqli_error($conn);
        }
    
        //inserisco lo stato del problema nella tabella che monitora lo stato dei problemi
        $qStato="UPDATE Problemi SET dataRisol = NOW() WHERE idProblema = ".$x["idProblema"]." ;";//imposto la data di risoluzione del problema per non farlo più visualizzare nei problemi aperti
        if(mysqli_query($conn, $qStato)){
            //successivamente inserisco nella tabella di stato dei problemi  lo stato del problema dopo essere stato modificato come problema aperto
            $qStato2="INSERT INTO StatoProblema (idProblema, idStato) VALUES (".$idNew.", 2);";
            if(mysqli_query($conn, $qStato2)){
                //ed in fine imposto lo stato del  problema presistente come "modificato"
                $qStato3="UPDATE StatoProblema SET idStato = 3 WHERE idProblema = ".$x["idProblema"]." ;";
                if(mysqli_query($conn, $qStato3)){
                echo("Prolema modificato correttamente ");
                }
            }else{
                echo("Errore nell'inserimento della modifica in fase 2 ");
                echo$qStato2;
            }
        }else{
            echo("Errore nell'inserimento della modifica in fase 1 ");
        }
    
    
    
        //inserimento tag nel database
    
        $arrayTag= explode(" ", $tag); //divido la singola stringa che ricevo come input dei tag in tanti piccoli tag da inserire nel dizionario o da legare al problema
        
        foreach ($arrayTag as $arrayTag){
            //query di inserimento tag
            $qTag = "INSERT INTO DizionarioTag (descrizione) VALUES ('$arrayTag')";
            $exqTag=mysqli_query($conn,$qTag); 
            //query per ottenere l'id del tag appena inserito nel dizionario
            $qIdTag= "SELECT idTag FROM DizionarioTag WHERE descrizione = '$arrayTag'";
            $risIdTag= mysqli_query($conn,$qIdTag);
            $idTag = mysqli_fetch_assoc($risIdTag);
            $valId = $idTag['idTag'];
            if($valId){                        
                //query di collegamento Tag-Problema
                $qBridge = "INSERT INTO tagBridge (idProblema, idTag) VALUES ($idNew,   $valId)";
                if($conn->query($qBridge)){  //metodo PDO per eseguire la query
                    
                    $k="inserimento tag  avvenuto con successo";
                    echo($k);
                }else{ 
                    echo 'errore!';
                }
            }
        
        }
    
    }

    }else{
        echo mysqli_error($conn);
    }
    mysqli_close($conn);
?>