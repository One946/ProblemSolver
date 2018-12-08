<?php
require("config/db.php");
require("config/config.php");

$query= "INSERT INTO Utenti (Nome, Cognome,email,CF,password,secretID) VALUES('{$_POST['nome']}','{$_POST['cognome']}','{$_POST['email']}','{$_POST['cf']}',MD5('{$_POST['password']}'),{$_POST['secretID']})";

echo($query);
echo($_POST['passworr']);

if($_POST['password'] === $_POST['passwordr']){
    if(mysqli_query($conn, $query)){
        $a='la registrazione è avvenuta con successo';
    }else{
        $a="c'è stato un errore nella registrazione: ".mysqli_error($conn);
    }

}

?>