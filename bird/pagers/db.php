<?php


$host="localhost";
$user ="root";
$pas="";
$db_name="bird_users";
$con = mysqli_connect($host, $user, $pas, $db_name);

if(mysqli_connect_errno()){
    echo "failed".mysqli_connect_errno();
}

?>