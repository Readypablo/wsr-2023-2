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



    $rol = stripcslashes ($_REQUEST['rol']);
    $name = stripcslashes ($_REQUEST['name']);
    $surname = stripcslashes ($_REQUEST['surname']);
    $phone = stripcslashes ($_REQUEST['phone']);
    $password = stripcslashes ($_REQUEST['password']);
    $nul_smen = '2023-04-01';
    $nul_smen_en = '2020-05-02';




if(isset($_POST["add_polz"])){


    $sql= " INSERT INTO `user` (role, smena_start , smena_end , phone , password , name ,surname) VALUES ('$rol' , '$nul_smen' , '$nul_smen_en' ,'$phone' ,' $password' ,'$name' ,'$surname') ";
    mysqli_query($con, $sql) or die(mysqli_error($con));
}




?>



    <h1>Админка</h1>
  

    <input type="button" value="Добавить Работника"  class="btn-panel" id="add-hum"  onclick="add_hum()">
    <input type="button" value="Просмотреть всех работников"  class="btn-panel" id="all-hum" onclick="all_hum()"> 
    <input type="button" value="Просмотреть все смены"  class="btn-panel"  id="all-smena"  onclick="all_smena()">



    <form action="" method="post" class="form" id="form-add" >
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
        <input type="submit" value="Добавить" class="btn-vxod"  name="add_polz" false>

   
        </form>




        <form method="POST" class="form" id="form-hum">
     
<table border="1">

<th>роль</th>
<th>начало смены</th>
<th>конец смены</th>
<th>телефон</th>
<th>пароль</th>
<th>имя</th>
<th>фамилия</th>
<?php 
   
    $query= "SELECT * FROM `user` ";
    $result = mysqli_query($con, $query) or die;
    
    for($data = []; $row = mysqli_fetch_assoc($result); $data[]=$row)
    $i++;
    ;
    
    foreach($data as $elem){
    
        echo "<tr>";
        echo "<td>".$elem['role']."</td>";
        echo "<td>".$elem['smena_start']."</td>";
        echo "<td>".$elem['smena_end']."</td>";
        echo "<td>".$elem['phone']."</td>";
        echo "<td>".$elem['password']."</td>";
        echo "<td>".$elem['name']."</td>";
        echo "<td>".$elem['surname']."</td>";
        echo "</tr>";
    }
    

   



?>



</table>


<?php 



$smena_start = stripcslashes ($_REQUEST['n_smena']);
$smena_end= stripcslashes ($_REQUEST['e_smena']);
$surname_smena= stripcslashes ($_REQUEST['surname']);

if(isset($_POST["add_smena"])){




    $update= "UPDATE user SET smena_start = '$smena_start' , smena_end = '$smena_end'  WHERE surname = '$surname_smena'";
    mysqli_query($con, $update) or die(mysqli_error($con));



}
?>
 
<h2>Назначить на смену</h2>

<p>фамилия</p>
        <input type="text" class="txt_inp" name="surname" placeholder="фамилия"><br>
        

        <p>начало смены</p>
        <input type="date" class="txt_inp" name="n_smena" placeholder="начало"><br>
        
        <p>конец смены</p>
        <input type="date" class="txt_inp" name="e_smena" placeholder="конец"><br>
        <br>
        <input type="submit" value="Назначить" class="btn-vxod"  name="add_smena" >


        </form>




        <form  class="form" id="form-smena">
        <H2>Все заказы</H2>


        <?php 
   
   $query= "SELECT * FROM `zakaz` ";
   $result = mysqli_query($con, $query) or die;
   
   for($data = []; $row = mysqli_fetch_assoc($result); $data[]=$row)
   $i++;
   ;
   
   foreach($data as $elem){
    // поиск по  дате 
    // if($elem['date'] > '2023-04-01')
    // {
    // }
    
        echo "<div class='smena-block'>";
        echo "<table class='t-zakaz'>";
        echo "<th>статус</th>";
        echo "<th>инфо</th>";
        echo "<th>время принятия</th>";
        echo "<th>оплата</th>";
        echo "<tr>";
        echo "<tr>";
        echo "<td>".$elem['status']."</td>";
        echo "<td>".$elem['info']."</td>";
        echo "<td>".$elem['date']."</td>";
        echo "<td>".$elem['status_oplata']."</td>";
    
        echo "</tr>";
        echo "</table>";
        echo "</div>";
   
   }
   

  



?>

        </form>


 


<script src="js.js"></script>
</body>
</html>