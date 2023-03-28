
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registr/style.css">
    <title>Document</title>
</head>
<body>




<?php 
require('registr/db.php');
session_start();

if(isset($_POST['phone'])){
    $phone = stripcslashes($_REQUEST['phone']);
    $phones =  mysqli_real_escape_string($con, $phone);

    $password = stripcslashes($_REQUEST['password']);
    $password =  mysqli_real_escape_string($con, $password);


    $query= "SELECT * FROM `user` WHERE phone ='$phone' AND password ='$password'";


    $result = mysqli_query($con, $query) or die;
    $rows = mysqli_num_rows($result);
     if($rows==1){
        if($result){
            $main_user = mysqli_fetch_assoc($result);
          
            $_SESSION['name'] = $main_user['name'];
            $_SESSION['surname'] = $main_user['surname'];
            $_SESSION['role'] = $main_user['role'];
            $_SESSION["first_name"] = $phone;

            if($main_user['role'] == 'Администратор'){
                header("Location: registr/dashboard.php");
            }
            if($main_user['role'] == 'Повар'){
                header("Location: registr/dashboard_pov.php");
            }
            if($main_user['role'] == 'Официант'){
                header("Location: registr/dashboard_off.php");
            }



           
        }
    } else{
        echo "<div class='eror'>
        <h1>НЕПРАВИЛЬНО.</h1><br/>
        <p class='link'>Click here to <a href='index.php'>Login</a> again.</p>
        </div>";
    }
}else{ ?>
    <h1>вход в систему</h1>
    <form action="" method="post" class="form">
        
<p>Телефон</p>
<input type="text" class="txt_inp" name="phone" placeholder="телефон"><br>
<p >Пароль</p>
<input type="Password" class="txt_inp" name="password" placeholder="Password">
<br>
<input type="submit" value="войти" class="btn-vxod"  name="submit">
</form>
<?php }?>

</body>
</html>