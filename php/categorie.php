<?php
    session_start();
    require("config/db.php");
    require("config/config.php");
    $q= "SELECT * FROM Categorie WHERE 1";
    $ris=mysqli_query($conn,$q);
    $cate= mysqli_fetch_all($ris, MYSQLI_ASSOC);
    $categorie=json_encode($cate);
    echo($categorie);   
    mysqli_close($conn);
?>  