<?php
    require("config/db.php");
    require("config/config.php");
    //prendo le variabili che mi arrivano tramite richiesta HTTP
    $data = file_get_contents("php://input"); //normalmente php non può leggere nella post le variabili json per tanto devo andarle a cercare nel corpo della richiesta
    $x=json_decode($data, true);


    //inizializzazione variabili da inserire nel db

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
    
    
//***************************************************************************** */

$qIU="INSERT INTO Ubicazioni(descrizione) VALUES('$ubicazione')";
if(mysqli_query($conn, $qIU)){
    $qIdUb="SELECT idUbicazione FROM Ubicazioni WHERE descrizione = '".$ubicazione."'"; //query selezione idUbicazione
    $rIdUb = mysqli_query($conn,$qIdUb); //esecuzione delle query
    $idUbicazione= mysqli_fetch_assoc($rIdUb);  //risultato della query
}else{
    $qIdUb="SELECT idUbicazione FROM Ubicazioni WHERE descrizione = '".$ubicazione."'"; //query selezione idUbicazione
    $rIdUb = mysqli_query($conn,$qIdUb); //esecuzione delle query
    $idUbicazione= mysqli_fetch_assoc($rIdUb);  //risultato della query
  }


//**********************************************************+ */


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
    //$qProb= "INSERT INTO Problemi (secretID, boolAnonimo, idUbicazione, idCategoria, descrizione, titolo) VALUES (".$_SESSION["secretID"].", ".$anonimo.", ".$idUbicazione["idUbicazione"].",".$cate["idCategoria"]." , '".$descrizione."', '".$titolo."')" ;
    $qProb= "INSERT INTO Problemi (secretID, boolAnonimo, idUbicazione, idCategoria, descrizione, titolo) VALUES (".$secretID.", ".$anonimo.", ".$idUbicazione["idUbicazione"].",".$cate["idCategoria"]." , '".$descrizione."', '".$titolo."')" ;

   
    if (mysqli_query($conn, $qProb)) { //se la query va a buon fine eseguo la queri per ottenere l'id del problema creato che viene creato in automatico tramite l'auto increment
        //query per ottenere l'id del problema appena creato

        $qID= "SELECT idProblema FROM Problemi WHERE (boolAnonimo = '$anonimo') &&  (descrizione = '$descrizione') && (titolo = '$titolo')";
        $risID = mysqli_query($conn, $qID);
        $idProb = mysqli_fetch_assoc($risID);   
        //la variabile $a equivale all'id del problema
        $a=$idProb["idProblema"]; 
    } else {
        //altrimenti stampo un messagio d'errore
        echo "Error: ". mysqli_error($conn);
    }



    //inserimento tag nel database

    $arrayTag= explode(" ", $tag); //divido la singola stringa che ricevo come input dei tag in tanti piccoli tag da inserire nel dizionario o da legare al problema
    var_dump($arrayTag);
    
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
            if($conn->query($qBridge)){  //metodo PDO per eseguire la query
                
                $k="inserimento tag  avvenuto con successo";
                echo($k);
            }else{ 
                echo 'errore!';
            }
        }
    
    } 
   
mysqli_close($conn);

?>