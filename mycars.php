<?php include 'header.php';
$cars="SELECT * FROM own WHERE user_id = '".$uTakeInfo['userid']."'";
$carsquery=mysqli_query($connect, $cars);
?>
  <div class='game_inner'>
    <div class='game_inner__view--drivers'>
      <div class='drivers_list'>
      <?php
          if (!isset($_GET['status'])) {
            
           } else {
            if($_GET['status']=='no') { 
          ?>
              <div class="badnotif">
                <p><i class='bx bx-error-circle' ></i> You don't have enough money or you already have this car.</p>
              </div>
              <?php }?>
              <?php $status = $_GET['status'];
              if($status=='ok') { ?>
              <div class="sellgoodnotif">
                <p><i class='bx bx-check-circle'></i> You sold the car!</p>
              </div>
              <?php }
           }
           ?>
        <div class='drivers_list__top'>
          <h1>My Cars</h1>
        </div>
        <div class='drivers_list__list'>
          <div class='d_head'>
            <div class='d_head__item name'>
              Brand
            </div>
            <div class='d_head__item hometown'>
              Model
            </div>
            <div class='d_head__item age'>
              Cost
            </div>
            <div class='d_head__item prize'>
              Performance
            </div>
            <div class='d_head__item action'>
              Cost
            </div>
            
        </div>
        <div class="d_items">
        <?php
            while ($takecars=mysqli_fetch_assoc($carsquery)){
              $carsql="SELECT * FROM car Where car_id = '".$takecars['car_id']."'";
              $carquery=mysqli_query($connect, $carsql);
              $car=mysqli_fetch_array($carquery);
              ?>
              <div class="d_items__item" data-index="0" style="display: block;">
                <div class="name">
                  <p><?php echo $car['brand']?></p>
                </div>
                <div class="hometown">
                  <p><?php echo $car['model']?></p>
                </div>
                <div class="age">
                <p><?php echo $car['cost']?></p>
                  
                </div>             
                <div class="prize">
                  <?php echo $car['performance']?>
                </div>
                <div class="action">
                <form action="process.php" method="post">
                  <input type="hidden" name="money" value="<?php echo $uTakeInfo['money']?>">
                  <input type="hidden" name="userid" value="<?php echo $uTakeInfo['userid']?>">
                  <input type="hidden" name="cost" value="<?php echo $car['cost']?>">
                  <input type="hidden" name="car_id" value="<?php echo $car['car_id']?>">
                  <input class="sell" type="submit" name="sell" value="Sell">
                </form>
                </div>
            </div>
        <?php
            }
        ?>
            

        </div>
              
        </div>
        
      </div>
      <?php include 'chat.php';?>
    </div>
  </div>
  <div class='game_footer'>
    <div class='game_footer__inner'>
      <a href="profile.php" class='select'>
        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/chevronorange.png'>
        Profile
      </a>
      <a href="cars.php" class='select'>
        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/chevronorange.png'>
        Cars
      </a>
      <a href="races.php" class='select'>
        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/chevronorange.png'>
        Races
      </a>
      <a href="mycars.php" class='select active'>
        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/chevronorange.png'>
        My Cars
      </a>
      <a href="credits.php" class='select'>
        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/chevronorange.png'>
        Credits
      </a>
      <a href="settings.php" class='select'>
        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/chevronorange.png'>
        Settings
      </a>
      <a href="logout.php" class='select nextrace'>
        Exit
      </a>
    </div>
  </div>
</div>
<?php include 'footer.php' ?>
