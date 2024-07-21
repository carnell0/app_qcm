<?php
    //connexion
    $id = mysqli_connect("localhost", "root","","app_qcm");
    mysqli_query($id, "SET NAMES UTF8");
    if(!$id) echo "La commande a échouée";
?>