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

    <h1>Официант</h1>

    <?php 

    require('db.php');
    $status = stripcslashes ($_REQUEST['status']);
    $info = stripcslashes ($_REQUEST['info']);
    $date = stripcslashes ($_REQUEST['date']);
    $oplata = stripcslashes ($_REQUEST['oplata']);
  
    if(isset($_POST["akaz"])){
        $sql= " INSERT INTO `zakaz` (status, info , date , status_oplata ) VALUES ('$status' , '$info' , '$date' ,'$oplata') ";
        mysqli_query($con, $sql) or die(mysqli_error($con));
    }
    ?>


    <form action="" method="post" class="form"  id="form-add" >
        <H2>Создание заказа</H2>

        <p>статус</p>
        <input type="text" class="txt_inp" name="status" placeholder="статус">

        <p>инфо</p>
        <input type="text" class="txt_inp" name="info" placeholder="инфо"><br>
        
        <p>дата</p>
        <input type="datetime-local" class="txt_inp" name="date" placeholder="дата">
        
        <p>оплата</p>
        <input type="text" class="txt_inp" name="oplata" placeholder="оплата"><br>
        
        <br>
        <input type="submit" value="Добавить" class="btn-vxod"  name="akaz" >

   
        </form>


<br><br><br><br>








        
    <div  class="form" > 
        <H2>Все заказы</H2>

<?php 
   $query= "SELECT * FROM `zakaz`";
   $result = mysqli_query($con, $query) or die;
   for($data = []; $row = mysqli_fetch_assoc($result); $data[]=$row){
    $i++;
   }
    
   foreach($data as $elem){
    // поиск по  дате 
    // if($elem['date'] > '2023-04-01')
    // {
    // }
    $idd_info = $elem['id'];
    $idd_op= $elem['id'];
    $idd_ot= $elem['id'];
        echo "<div class='smena-block'>";
        echo "<table class='t-zakaz'>";
        echo "<th>статус</th>";
        echo "<th>инфо</th>";
        echo "<th>время принятия</th>";
        echo "<th>оплата</th>";
       
        echo "<tr>";
       
        echo "<td>".$elem['status']."</td>";
        echo "<td>"."<form method='POST'><textarea name='info_zak'>".$elem['info']."</textarea><input type='submit' value='изменить' name='$idd_info-2'></form>"."</td>";
        echo "<td>".$elem['date']."</td>";

       
     

        echo "<td>".$elem['status_oplata']."</td>";
    if($elem['status_oplata'] == 'Ожидается' ){
           
        echo "<td>"."<form method='POST'><input type='submit' value='оплачен' name='$idd_op'></form>"."</td>";
       
        echo "<td>"."<form method='POST'><input type='submit' value='отменен' name='$idd_ot-1'></form>"."</td>";
     }
        echo "</tr>";
        echo "</table>";
        echo "</div>";
    }


    if(isset($_POST["$idd_info-2"])){
        $info = $_POST["info_zak"];
        $query_inf= "UPDATE `zakaz` SET info ='$info' WHERE id = '$idd_info' ";
        mysqli_query($con, $query_inf) or die(mysqli_error($con));
        header("Refresh: 0");
    }
   

    if(isset($_POST["$idd_ot-1"])){
        $query_ot= "UPDATE `zakaz` SET status_oplata ='Отменен' WHERE id = '$idd_ot' ";
        mysqli_query($con, $query_ot) or die(mysqli_error($con));
        header("Refresh: 0");
    }

    if(isset($_POST["$idd_op"])){
        $query_op= "UPDATE `zakaz` SET status_oplata ='Оплачен' WHERE id = '$idd_op' ";
        mysqli_query($con, $query_op) or die(mysqli_error($con));
        header("Refresh: 0");
    }
?>


</div>
   
        <br><br><br><br>
  



        

  
</body>
</html>