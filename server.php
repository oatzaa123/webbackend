<?php
    $servername = "us-cdbr-iron-east-04.cleardb.net";
    $username = "b04445289daf70";
    $password = "f9c7c57b";
    $dbname = "	heroku_6876a6ae8580ca8";

    $connect = mysqli_connect($servername,$username,$password,$dbname);

    if(!$connect){
        die('connection failed'.mysqli_connect_error());
    }
?>
