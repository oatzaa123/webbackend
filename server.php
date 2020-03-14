<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "flexmessage";

    $connect = mysqli_connect($servername,$username,$password,$dbname);

    if(!$connect){
        die('connection failed'.mysqli_connect_error());
    }
?>