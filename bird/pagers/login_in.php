<?php include("header.php") ?>

<?php
    require('db.php');
    session_start();

    if (isset($_POST['login'])) {
        $login = stripslashes($_REQUEST['login']);    
        $login = mysqli_real_escape_string($con, $login);

        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

   // Проверьте, существует ли пользователь в базе данных
        $query = "SELECT * FROM `users` WHERE login='$login'
                     AND password='$password'";

        $result = mysqli_query($con , $query) or die ;
        $rows = mysqli_num_rows($result);
        if( $rows==1){

            // берем данные из базы чтоб потом их передать
            if($result){
                $main_user = mysqli_fetch_assoc($result);
                $_SESSION['first_name'] = $main_user['login'];
                $_SESSION['score'] = $main_user['score'];
                header("Location: profile_user.php");
        }

        }else{
            echo "<main><div class='form_error'>
            <h1>Неправильный ввод</h1><br/>
            <p class='link'>Вернуться к <a href='login_in.php'>Входу</a>.</p>
            </div></main>";
        }
    }else{
?>




<main>

<form  method="post">

<h1 class="login-title">Вход</h1>

      
        <input type="text" class="login-input"   name="login" placeholder="Логин" required>
        <input type="password" class="login-input" name="password" placeholder="Пароль" required>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="profile.php">Еще не зарегистрированы?</a></p>


</form>

<?php } ?>

</main>