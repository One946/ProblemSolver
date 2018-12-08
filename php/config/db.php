<?php
    $conn = mysqli_connect("localhost", "superuser", "Cavallo2_","problemSolver");

    //controllo connessione
    if(mysqli_connect_errno()){
        echo "connessione a mysql fallita". mysqli_connect_errno();
    }


?>