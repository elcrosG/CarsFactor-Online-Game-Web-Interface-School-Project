<?php include 'header.php';
$races="SELECT * FROM race";
$racequery=mysqli_query($connect, $races);
?>
  <div class='game_inner'>
    <div class='game_inner__view--drivers'>
      <div class='drivers_list'>
        <div class='drivers_list__top'>
          <h1>Races</h1>
        </div>
        <div class='drivers_list__list'>
          <div class='d_head'>
            <div class='d_head__item name'>
              Winner
            </div>
            <div class='d_head__item hometown'>
              Map
            </div>
            <div class='d_head__item age'>
              Date
            </div>
            <div class='d_head__item prize'>
              Prize
            </div>
            <div class='d_head__item action'>
              Participants
            </div>
          </div>
        <div class="d_items">
        <?php
            while ($takerace=mysqli_fetch_assoc($racequery)){
              $usersql="SELECT * FROM users Where userid = '".$takerace['user_ids']."'";
              $userquery=mysqli_query($connect, $usersql);
              $user=mysqli_fetch_array($userquery);
              $mapsql="SELECT * FROM map Where map_name = '".$takerace['map']."'";
              $mapquery=mysqli_query($connect, $mapsql);
              $map=mysqli_fetch_array($mapquery);
              ?>
              <div class="d_items__item" data-index="0" style="display: block;">
                  <div class="name">
                    <p><?php echo $user['user_name']?></p>
                  </div>
                  <div class="hometown">
                    <img src="<?php echo $map['mapimg']?>">
                    <p><?php echo $takerace['map']?></p>
                  </div>
                  <div class="age">
                    <p><?php echo $takerace['date']?></p>
                  </div>             
                  <div class="prize">
                    <svg data-name="Layer 1" id="Layer_1" viewBox="0 0 7.31 9.56" xmlns="http://www.w3.org/2000/svg">
                    <polyline points="0 9.56 2 7.56 2 0 0 0 0 9.56"></polyline>
                    <polygon points="4.15 3.29 7.31 0 4.48 0 2.67 1.81 2.67 3.29 4.15 3.29"></polygon>
                    <polygon points="2.67 5.33 3.45 6.11 4.87 4.7 4.15 3.97 2.67 3.97 2.67 5.33"></polygon>
                    </svg>
                    <p><?php echo $takerace['prize']?></p>
                  </div>
                  <div class="action">
                    <p>4</p>
                  </div>
                  
              </div>
        <?php
            }
        ?>


        </div>            
        </div>
      </div>
      <?php include 'chat.php'?>
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
      <a href="races.php" class='select active'>
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