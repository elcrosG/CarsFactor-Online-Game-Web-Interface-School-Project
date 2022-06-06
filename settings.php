<?php include 'header.php' ?>
<!-- partial:index.partial.html -->
  <div class='game_inner'>
    <div class='game_inner__view--drivers'>
      <div class='drivers_list settings'>
        <div id="container">
        <?php
          if (!isset($_GET['status'])) {
            
           } else {
            if($_GET['status']=='no') { 
          ?>
              <div class="badnotif" style="margin-bottom:5px;">
                <p><i class='bx bx-error-circle' ></i> Error! You didn't create the race.</p>
              </div>
              <?php }?>
              <?php $status = $_GET['status'];
              if($status=='ok') { ?>
              <div class="goodnotif" style="margin-bottom:5px;">
                <p><i class='bx bx-check-circle'></i> You created the race!</p>
              </div>
              <?php }
           }
           ?>
          <form action="process.php" method="post">
            <fieldset>
              <h1 class="title">Create Races</h1>
              <br/>

              <!-- START DIV part-1 PERSONAL INFORMATION -->
              <div id="part-1">
                <h2>Race Information</h2>
                <label for="first-racer">First Racer ID</label>
                <input type="text" name="first-racer" id="first-racer" required>
                <br/>
                <label for="first-racer-carid">First Racer Car ID</label>
                <input type="text" name="first-racer-carid" id="first-racer-carid" required>
                <br/>
                <label for="second-racer">Second Racer ID</label>
                <input type="text" name="second-racer" id="second-racer" required> 
                <br/>
                <label for="second-racer-carid">Second Racer Car ID</label>
                <input type="text" name="second-racer-carid" id="second-racer-carid" required>
                <br/>
                <label for="third-racer">Third Racer ID</label>
                <input type="text" name="third-racer" id="third-racer" required>
                <br/>
                <label for="third-racer-carid">Third Racer Car ID</label>
                <input type="text" name="third-racer-carid" id="third-racer-carid" required>
                <br/>
                <label for="fourth-racer">Fourth Racer ID</label>
                <input type="text" name="fourth-racer" id="fourth-racer" required> 
                <br/>
                <label for="fourth-racer-carid">Fourth Racer Car ID</label>
                <input type="text" name="fourth-racer-carid" id="fourth-racer-carid" required>
                <br/>
                <label for="winner">Winner ID</label>
                <input type="text" name="winner" id="winner" required> 
                <br/>
                <label for="winner_car">Winner Car ID</label>
                <input type="text" name="winner_car" id="winner_car" required> 
                <br/>
                <label for="prize">Prize</label>
                <input type="text" name="prize" id="prize" required> 
                <br/>
                <label for="map-name">Map Name</label>
                <input type="text" name="map-name" id="map-name" required> 
                <br/>
              </div>
              <input class="msg_btn" type="submit" id="submitButton" name="create_race" value="Create Race">
            </fieldset>
          </form>
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
      <a href="settings.php" class='select active'>
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