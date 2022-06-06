<?php 
  include 'header.php';
  $totalsql="SELECT count(*) as total FROM race WHERE user_ids = '".$uTakeInfo['userid']."'";
  $totalquery=mysqli_query($connect, $totalsql);
  $total=mysqli_fetch_assoc($totalquery);

  $totalRsql="SELECT count(*) as total FROM _join WHERE user_id = '".$uTakeInfo['userid']."'";
  $totalRquery=mysqli_query($connect, $totalRsql);
  $totalR=mysqli_fetch_assoc($totalRquery);

  $totalMsql="SELECT * FROM race WHERE user_ids = '".$uTakeInfo['userid']."'";
  $totalMquery=mysqli_query($connect, $totalMsql);
  $totalMoney=0;
  while($totalM=mysqli_fetch_assoc($totalMquery)){
    $totalMoney += $totalMoney + $totalM['prize'];
  }
  $winrate= ($total['total'] * 100) / $totalR['total'];

  $map1Sql="SELECT count(*) as total FROM race WHERE user_ids = '".$uTakeInfo['userid']."' and map = 'Monaco GP'";
  $map1Sqlquery=mysqli_query($connect, $map1Sql);
  $map1=mysqli_fetch_assoc($map1Sqlquery);
  $map2Sql="SELECT count(*) as total FROM race WHERE user_ids = '".$uTakeInfo['userid']."' and map = 'Intercity İstanbul Park'";
  $map2Sqlquery=mysqli_query($connect, $map2Sql);
  $map2=mysqli_fetch_assoc($map2Sqlquery);
  $map3Sql="SELECT count(*) as total FROM race WHERE user_ids = '".$uTakeInfo['userid']."' and map = 'Nurburging'";
  $map3Sqlquery=mysqli_query($connect, $map3Sql);
  $map3=mysqli_fetch_assoc($map3Sqlquery);
  if($map1['total']>$map2['total'] && $map1['total']>$map3['total']){
    $bestmap = 'Monaco GP';
  }
  if($map2['total']>$map1['total'] && $map2['total']>$map3['total']){
    $bestmap = 'Intercity İstanbul Park';
  }
  if($map3['total']>$map1['total'] && $map3['total']>$map2['total']){
    $bestmap = 'Nurburging';
  }
  $userid = $uTakeInfo['userid'];
  $favcarSQL = "SELECT * FROM race WHERE user_ids='$userid' GROUP BY car_ids ORDER BY count(*) DESC limit 1";
  $favcarquery=mysqli_query($connect, $favcarSQL);
  $favcar=mysqli_fetch_assoc($favcarquery);

  $carsql = "SELECT * FROM car WHERE car_id='".$favcar['car_ids']."'";
  $carquery = mysqli_query($connect, $carsql);
  $car = mysqli_fetch_array($carquery);

  switch($car['car_id']){
    case 1: $profilebg = "car1bg.jpg"; break;
    case 2: $profilebg = "car2bg.jpg"; break;
    case 3: $profilebg = "car3bg.jpg"; break;
    case 4: $profilebg = "car4bg.jpg"; break;
    case 5: $profilebg = "car5bg.jpg"; break;
    case 6: $profilebg = "car6bg.jpg"; break;
  }
?>
<!-- partial:index.partial.html -->
  <div class='game_inner'>
    <div class='game_inner__view--drivers'>
      <div class='drivers_list' style="background: none; padding: 0;">
        <div class='drivers_list__list' style="padding: 0;">
          <div class="profile">
            <div class="profile-avatar">
              <img src="<?php echo $uTakeInfo['user_avatar']; ?>" alt="" class="profile-img">
            </div>
            <img src="<?php echo $profilebg; ?>" alt="" class="profile-cover">
            <div class="profile-menu">
              <div class="profile-menu-username"><?php echo $uTakeInfo["user_name"]; ?></div>
              <div class="profile-menu-link"><i class='bx bx-award orange'></i> <?php echo $total['total'];?></div>
              <div class="profile-menu-link"><i class='bx bx-money orange' ></i> <?php echo $uTakeInfo['money'];?></div>
              <div class="profile-menu-link"><i class='bx bx-star orange' ></i> <?php echo $uTakeInfo["user_level"]; ?></div>
              <div class="profile-menu-link"><i class='bx bxs-flag-checkered orange'></i> <?php echo $totalR["total"]; ?></div>
            </div>
            <div id="box-list">
              <div class="box">
                <div>
                  <h2>Total&nbsp;Earning</h2>
                  <h1><?php echo $totalMoney;?><svg data-name="Layer 1" id="Layer_1" viewBox="0 0 7.31 9.56" xmlns="http://www.w3.org/2000/svg">
                    <polyline points="0 9.56 2 7.56 2 0 0 0 0 9.56"></polyline>
                    <polygon points="4.15 3.29 7.31 0 4.48 0 2.67 1.81 2.67 3.29 4.15 3.29"></polygon>
                    <polygon points="2.67 5.33 3.45 6.11 4.87 4.7 4.15 3.97 2.67 3.97 2.67 5.33"></polygon>
                  </svg></h1>
                </div>  
                  <div class="card-bx"><span class="card"><i class='bx bx-wallet' ></i></span></div>  
              </div>
              <div class="box">
                <div>
                  <h2>Best&nbsp;Map</h2>
                  <h1><?php echo $bestmap; ?></h1>
                </div>  
                  <div class="card-bx"><span class="card"><i class='bx bx-map-alt' ></i></span></div>  
              </div>
              <div class="box">
                <div>
                  <h2>Win&nbsp;Rate</h2>
                  <h1><?php printf("%.1f",$winrate);echo '%'; ?></h1>
                </div>  
                  <div class="card-bx"><span class="card"><i class='bx bx-medal'></i></span></div>  
              </div>
              <div class="box">
                <div>
                  <h2>Favorite&nbsp;Car</h2>
                  <h1><?php echo $car['brand'].' '.$car['model']; ?></h1>
                </div>  
                  <div class="card-bx"><span class="card"><i class='bx bx-car' ></i></span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include 'chat.php'?>
    </div>
  </div>
  <div class='game_footer'>
    <div class='game_footer__inner'>
      <a href="profile.php" class='select active'>
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
