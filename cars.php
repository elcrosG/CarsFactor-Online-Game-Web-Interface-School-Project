<?php include 'header.php';
$cars="SELECT * FROM car";
$carsquery=mysqli_query($connect, $cars);
?>

  <div class='game_inner'>
    <div class='game_inner__view--drivers'>
      <div class='drivers_list' style="background: none;">
        <div class='drivers_list__list' style="padding: 0;">
          <div class="slide-container">
            <?php  
                while ($takecars=mysqli_fetch_assoc($carsquery)) {?>
                    <div class="wrapper">
                      <div class="clash-card barbarian">
                        <div class="clash-card__image clash-card__image--barbarian">
                          <img src="<?php echo $takecars['carimg']; ?>" alt="barbarian" />
                        </div>
                        <div class="clash-card__unit-name"><?php echo $takecars['brand'].' '.$takecars['model']; ?></div> 
                        <div class="clash-card__unit-stats clearfix">
                          <div class="one-third">
                            <div class="stat"><?php echo $takecars['performance']; ?></div>
                            <div class="stat-value">Performance</div>
                          </div>
                  
                          <div class="one-third">
                            <div class="stat"><?php echo $takecars['cost']; ?><svg data-name="Layer 1" id="Layer_1" viewBox="0 0 7.31 9.56" xmlns="http://www.w3.org/2000/svg">
                              <polyline points="0 9.56 2 7.56 2 0 0 0 0 9.56"></polyline>
                              <polygon points="4.15 3.29 7.31 0 4.48 0 2.67 1.81 2.67 3.29 4.15 3.29"></polygon>
                              <polygon points="2.67 5.33 3.45 6.11 4.87 4.7 4.15 3.97 2.67 3.97 2.67 5.33"></polygon>
                            </svg></div>
                            <div class="stat-value">Cost</div>
                          </div>
                  
                          <div class="one-third no-border">
                            <form action="process.php" method="post">
                              <input type="hidden" name="user_name" value="<?php echo $_SESSION["user_name"]; ?>">
                              <input type="hidden" name="car_id" value="<?php echo $takecars['car_id']; ?>">
                              <input type="hidden" name="cost" value="<?php echo $takecars['cost']; ?>">
                              <input class="msg_btn buy" type="submit" name="buy" value="BUY">
                            </form>
                          </div>
                  
                        </div>
                  
                      </div> <!-- end clash-card barbarian-->
                    </div> <!-- end wrapper -->
                    <?php
                }
                ?>
                

          </div>
          
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
              <div class="goodnotif">
                <p><i class='bx bx-check-circle'></i> You bought the car!</p>
              </div>
              <?php }
           }
           ?>
        </div>
        
      </div>
<?php include 'chat.php'; ?>
    </div>
  </div>
  <div class='game_footer'>
    <div class='game_footer__inner'>
      <a href="profile.php" class='select'>
        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/chevronorange.png'>
        Profile
      </a>
      <a href="cars.php" class='select active'>
        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/chevronorange.png'>
        Cars
      </a>
      <a href="races.php" class='select'>
        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/chevronorange.png'>
        Races
      </a>
      <a href="mycars.php" class='select'>
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
