<?php 
include("auth_ses.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
        <p> <?php echo  $_SESSION['name']." ". $_SESSION['surname'];?>!
        <a href="logout.php" class="close-ses">выйти</a></p>
        </header>



<?php

require('db.php');

if(isset($_POST['rol'])){

    $rol = stripcslashes ($_REQUEST['rol']);
    $name = stripcslashes ($_REQUEST['name']);
    $surname = stripcslashes ($_REQUEST['surname']);
    $phone = stripcslashes ($_REQUEST['phone']);
    $password = stripcslashes ($_REQUEST['password']);
    $nul_smen = 2023-04-01;
    $nul_smen_en = 2020-05-02;

}



if(isset($_POST["add_polz"])){
    $sql= " INSERT INTO user (role, smena_start , smena_end , phone , password , name ,surname) VALUES ('$rol' , '$nul_smen' , '$nul_smen_en' ,'$phone' ,' $password' ,'$name' ,'$surname') ";
    mysqli_query($con, $sql) or die(mysqli_error($con));
}



?>



    <h1>Админка</h1>
  

    <form action="" method="post" class="form">
        <H2>Создание пользователя</H2>

        <p>роль</p>
        <input type="text" class="txt_inp" name="rol" placeholder="роль">

        <p>имя</p>
        <input type="text" class="txt_inp" name="name" placeholder="имя"><br>
        
        <p>фамилия</p>
        <input type="text" class="txt_inp" name="surname" placeholder="фамилия">
        
        <p>Телефон</p>
        <input type="text" class="txt_inp" name="phone" placeholder="телефон"><br>
        
        <p >Пароль</p>
        <input type="Password" class="txt_inp" name="password" placeholder="Password">
       
        <br>
        <input type="submit" value="войти" class="btn-vxod"  name="add_polz">

        </form>



</body>
</html>