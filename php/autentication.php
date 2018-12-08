<?php
    session_start();
    require("config/db.php");
    require("config/config.php");
    //query di match tra email e password
        //se va a buon fine prendo tutto da utente e inizializzo la sessione
        //select * from Utenti where email= 'giuseppe.dagostin94@gmail.com' && password=MD5('password')
    $verifica="SELECT * FROM Utenti WHERE email = '{$_POST['email']}' && password = MD5('{$_POST['password']}')";  
    $a=mysqli_query($conn, $verifica);
    if($a){
        $utente=mysqli_fetch_assoc($a);
        $_SESSION["secretID"] = $utente['secretID'];
        var_dump($utente);
    }
    
    $benvenuto="Bentornato ".$utente["Nome"]." ".$utente["Cognome"];
    $post= "SELECT COUNT(idProblema) AS NumPost FROM Problemi WHERE secretID = '".$utente["secretID"]."'";
    $f = mysqli_query($conn, $post);
    $numpost= mysqli_fetch_assoc($f);
    $pp="Hai effettuato ".$numpost["NumPost"]." post";
    
    
   // $_SESSION["secretID"] = $utente['secretID'];
    
?>