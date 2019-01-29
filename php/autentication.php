<?php
    session_start();
    require("config/db.php");
    require("config/config.php");
    //query di match tra email e password
        //se va a buon fine prendo tutto da utente e inizializzo la sessione
        //select * from Utenti where email= 'giuseppe.dagostin94@gmail.com' && password=MD5('password')
    $data=file_get_contents("php://input"); //normalmente php non può leggere nella post le variabili json per tanto devo andarle a cercare nel corpo della richiesta
    $x=json_decode($data, true);

    //$verifica="SELECT * FROM Utenti WHERE email = '{$x['email']}' && password = MD5('{$x['password']}')";
    $verifica="SELECT * FROM Utenti WHERE email = '{$x['email']}' && password ='{$x['password']}'";   //DEBUG
    $a=mysqli_query($conn, $verifica);
    if($a){
        
        $utente=mysqli_fetch_assoc($a);
        //$_SESSION["secretID"] = $utente['secretID'];
        $utente = json_encode($utente);
        echo($utente);
    }
    else{
        echo("errore di autenticazione");
    }
?>