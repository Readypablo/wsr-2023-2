<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include("header.php"); ?>


<?php 
require('db.php');


if(isset($_POST['submit'])){
    


    $phone = stripcslashes($_REQUEST['phone']);
   // $phone = mysqli_real_escape_string($con,$phone);

    $login = stripcslashes($_REQUEST['login']);
  //  $login = mysqli_real_escape_string($con,$login);

    $password = stripcslashes($_REQUEST['password']);
//     $password = mysqli_real_escape_string($con,$password);






        $score_def = 0;

       
    $query = "INSERT INTO `users` (phone, login, password ,score) VALUES ('$phone', '$login', '$password' ,'$score_def')";

    $ult = mysqli_query($con, $query) or die (mysqli_error($con));

    if($ult){
     
        echo "<main><div class='form_error'>
        <h3>все шик.</h3><br/>
        <p class='link'>Вводи сюда это <a href='login_in.php'>Login</a></p>
        </div> </main>";
    }else{
       
        echo "<main><div class='form_error'>
        <h3>не все поля заполнил.</h3><br/>
        <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
        </div> </main>" ;
         }    
    
}

else{



?>





<main>



<form  method="post" id="reg">

<h1 class="login-title">Регистрация</h1>

        <input type="text" class="login-input" name="phone" placeholder="Телефон" required />
        <input type="text" class="login-input"   name="login" placeholder="Логин" required>
        <input type="password" class="login-input" name="password" placeholder="Пароль" required>
        <input type="submit" name="submit" value="Register" class="login-button" >
        <p class="link"><a href="login_in.php">Уже зарегистрированы?</a></p>


</form>

<?php }
 ?>
</main>
