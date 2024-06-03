<?php
    $server="localhost";
    $user="pavan";
    $password="Pavan@123";
    $db_name="pavanKarnati";
    $conn = new mysqli($server,$user,$password,$db_name);
    if($conn->connect_error){
        die("connected failed".$conn->connect_error);

    }
    echo "connected Succesfully";
?>