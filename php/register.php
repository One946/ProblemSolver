<?php
    require("config/db.php");
    require("config/config.php");
    //prendo le variabili che mi arrivano tramite richiesta HTTP
    $data = file_get_contents("php://input"); //normalmente php non può leggere nella post le variabili json per tanto devo andarle a cercare nel corpo della richiesta
    $x=json_decode($data, true);
$query= "INSERT INTO Utenti (Nome, Cognome,email,CF,password,secretID) VALUES('{$x['nome']}','{$x['cognome']}','{$x['email']}','{$x['cf']}',MD5('{$x['password']}'),{$x['secretID']})";



if($_POST['password'] === $_POST['passwordr']){
    if(mysqli_query($conn, $query)){
        echo'la registrazione è avvenuta con successo';
    }else{
        echo"c'è stato un errore nella registrazione: ".mysqli_error($conn);
    }

}

?>