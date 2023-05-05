<?php include('sesion.php');?>
<?php include("header.php"); ?>

<main>




<div class="flex">

    <div class="canvas_game">
        <canvas id="canvas" width="288" height="512"></canvas>

        <input type="button" value="Играть" id="btn-restart" onclick="restart_btn()">

        <input type="button" value="Играть" id="btn-start" onclick="start_btn()">

</div>

    <div class="table_bird">
    <p >Ваш счет:  <span id="score"></span></p>
    <p >Лучший счет: <span> <?php echo $_SESSION['score']; ?></span></p>
      
    <h3>Скины</h3>

        <div class="scin_bird">

        
            <div id="scin_1"><img src="../img/def_bird.png" title="не открыт"  class="scin_img">
            <input type="button" value="Дефолт" class="name_scin " onclick="daefolt()">
            <p>0</p>
        </div>
            
            <div id="scin_2">
                <?php 
                if($_SESSION['score'] >=50){
                    echo"<img src='../img/cool_bird.png' class='scin_img'>";
                }
                else{
                    echo"<img src='../img/none.png' title='Не открыт' class='scin_img' >";
               
                }
                ?>
                  <input type="button" value="Крутой" class="name_scin" <?php  if($_SESSION['score'] >=50){echo"onclick='cool()'";}?>>
                  <p>50</p>
            </div>

            <div id="scin_3">
            <?php 
                if($_SESSION['score'] >=100){
                    echo"<img src='../img/lega.png' class='scin_img'>";
                }
                else{
                    echo"<img src='../img/none.png' title='Не открыт' class='scin_img'  >";
               
                }
                ?>
           <input type="button" value="Лега" class="name_scin" <?php  if($_SESSION['score'] >=100){echo"onclick='lega()'";}?>>
            <p>120</p>

            </div>
            
        </div>

    </div>

</div>
</main>




    <script src="../js/birdscript.js"></script>
    <script src="../js/script.js"></script> 
</body>
</html>