<?php //BACHECA VISUALIZZAZIONE PROBLEMI
    require("config/db.php");
    require("config/config.php");
$data = file_get_contents('php://input'); //sto passando dati tramite il body http invece che direttamente dal form pertanto devo utilizzare questa funzione per accedere al contenuto
$arrayTag= explode(" ", $data);
$prob=[];

for ($i=0; $i<count($arrayTag); $i++){
    $query1 = "SELECT * FROM Problemi  WHERE idProblema IN (SELECT idProblema FROM tagBridge WHERE idTag IN (SELECT idTag FROM DizionarioTag WHERE descrizione = '{$arrayTag[$i]}'))";
    //Prendi il risultato
    $ris1 =mysqli_query($conn, $query1);
    if($ris1){
    //Inserisco il risultato della query in un array associativo
        $a= mysqli_fetch_all($ris1,MYSQLI_ASSOC);
        if(!is_null($a)){
            array_push($prob,$a);
        } else{
            continue;
        }
        mysqli_free_result($ris);
    }
}
$response=json_encode($prob);
echo($response);
mysqli_close($conn);

?>