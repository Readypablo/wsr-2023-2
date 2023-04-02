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

    <h1>Повар</h1>
  
    <div  class="form" >
        <H2>Все заказы</H2>

        <?php 
   require('db.php');
   $query= "SELECT * FROM `zakaz`";
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
        $idd = $elem['id'];
        if($elem['status'] == 'Готовится'){
        echo "<td>"."<form  method='post'><input type='submit' value='Готов' name='$idd'></form>"."</td>";
        if(isset($_POST["$idd"])){
            $query= "UPDATE `zakaz` SET status ='Готов' WHERE id = '$idd' ";
            mysqli_query($con, $query) or die(mysqli_error($con));
            header("Refresh: 0");
           }
        }
        echo "<td>".$elem['status_oplata']."</td>";
        echo "</tr>";
        echo "</table>";
        echo "</div>";
   
   }


?>

</div>


</body>
</html>