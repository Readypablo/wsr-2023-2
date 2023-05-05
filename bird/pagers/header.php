<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flappy Owl
    </title>
    <link rel="icon" href="../dorabotki/iconka.ico" type="image/x-icon">
    <link rel="stylesheet" href="../style/style.css">

</head>
<body>

<header>
    <div class="left-header">
            <img src="../img/def_bird.png" alt="" class="logo-header" >
     <p>  <a href="../index.php">Flappy Owl</a> </p>
    </div>
    <!-- меню горизонтальное -->
    <div class="center-header">
        <p>MEGA SUPER GAMING BIRD</p>
    </div>
    <!-- меню горизонтальное -->
<?php
if(isset($_SESSION["first_name"])){

  echo "<div class='right-header'>
<a href='logaut.php'> <input type='button' value='Выход' class='btn-header'></a>
</div>";

}
else{
    echo "<div class='right-header'>
    <a href='profile.php'> <input type='button' value='Регистрация' class='btn-header'></a>
 </div>";
}
?>
   
</header>