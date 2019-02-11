<?php
    session_start();
    require("config/db.php");
    require("config/config.php");
    $data=file_get_contents("php://input"); //normalmente php non può leggere nella post le variabili json per tanto devo andarle a cercare nel corpo della richiesta
    $x=json_decode($data, true);

    //$verifica="SELECT * FROM Utenti WHERE email = '{$x['email']}' && password = MD5('{$x['password']}')";
    $verifica="SELECT * FROM Utenti WHERE email = '{$x['email']}' && password ='{$x['password']}'";   //DEBUG
    $a=mysqli_query($conn, $verifica);
    if($a){
        
        $utente=mysqli_fetch_assoc($a);
        $utente = json_encode($utente);
        echo($utente);
    }
    else{
        echo("errore di autenticazione");
    }
    mysqli_close($conn);
?>