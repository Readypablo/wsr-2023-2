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
        <p>Flappy Owl</p>    
    </div>
    <!-- меню горизонтальное -->
    <div class="center-header">
        <p>MEGA SUPER GAMING BIRD</p>
    </div>
    <!-- меню горизонтальное -->
    <div class="right-header">
        <a href="pagers/profile.php"> <input type="button" value="Регистрация" class="btn-header"></a>
    </div>
</header>

<main>

    <!-- <canvas id="canvas" width="288" height="512"></canvas>

    <input type="button" value="заного" id="btn-restart" onclick="restart_btn()">
 -->


<div class="info_game">
    <div class="block_txt">
        <p>Flappy Bird - это игра, в которой вы нажимаете на экран, чтобы заставить птицу летать.
             Некоторых людей эта игра расстраивает, как будто вы попадаете в трубу, ваша птица падает, и вы перезапускаете игру. Однако некоторые люди считают, что не полное сосредоточение на игре или сосредоточение только на нижней трубе помогает вам получить более высокий балл. Это не было доказано.</p>
    </div>

    <div class="block_img">
        <img src="img/def_bird.png" class="img_size">
    </div>
</div>




<div class="statisctik_game">

    <div class="statisctik_info">
        <p><span>Flappy Bird</span>  - это больше, чем простая игра. Это феномен, который завоевал миллионы сердец
            Это новая возможность преодолеть свои личные рекорды и побить рекорды.<p>
    </div>

    <div class="statisctik_section">
        <div class="statistick">
            <p><span>9813</span><br>Абсолютный рекорд</p>
        </div>
        <div class="statistick">
            <p><span>300млн+</span><br>Скачиваний</p>
        </div>
        <div class="statistick">
            <p><span>1000+</span><br>Аналогов игры</p>
        </div>
    </div>

</div>




<div class="table_score">
    <div><h1>Таблица рекордов</h1></div>

    <div class="block_info_records">
        
        <div class="name">Имя </div>    
        <div class="space_bot"></div>    
        <div class="us_score">Счет</div>    
    </div>


    <?php 
    require('pagers/db.php');
    $query= "SELECT * FROM `users` ORDER BY score DESC ";
    $result = mysqli_query($con, $query) or die;
    
    for($data = []; $row = mysqli_fetch_assoc($result); $data[]=$row)
    $i++;
    ;
    $num=0;
    foreach($data as $elem){
    $num=$num+1;
        echo "<div class='block_info_records'>";
        echo "<div class='id_us'>$num</div>";
        echo "<div class='name'>".$elem['login']."</div>";
        echo "<div class='space_bot'></div>   ";
        echo "<div class='us_score'>".$elem['score']."</div>   ";
        echo "</div>";
    }
    

   
    ?>









</div>





</main>





  
<script src="../js/script.js"></script>
</body>
</html>