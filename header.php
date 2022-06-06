<?php
include 'connect.php';

session_start();
if (!isset($_SESSION["user_name"])){
    header('Location:login.php');
}
$query1="SELECT * FROM users WHERE user_name = '".$_SESSION["user_name"]."'";
$uQuery=mysqli_query($connect, $query1);
$uTakeInfo=mysqli_fetch_array($uQuery);
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Cars Factor</title>
  <link rel="stylesheet" href="./style.css">
  <head>
  <link rel="icon" type="image/ico" href="favicon.ico">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css'>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css'>
</head>
<body>
<canvas class='grain'></canvas>
<div class='game'>
  <div class='game_head'>
    <div class='game_head__inner'>
      <div class='head_logo'>
        <div class='head_logo__logo'>
          <img src='racing.png'>
        </div>
        <div class='head_logo__title'>
          <h2>CARS FACTOR</h2>
          <p class='orange'>Cutthroat Competition</p>
        </div>
      </div>
      <div class='head_right'>
        <div class='head_nextrace'>
          <img src="<?php echo $uTakeInfo["user_avatar"]; ?>" alt="" class="head-profile-img">
          <div class='head_nextrace__info'>
            <h3><?php echo $_SESSION["user_name"]; ?></h3>
            <p class='orange'>Level <?php echo $uTakeInfo["user_level"]; ?></p>
          </div>
          <div class='head_kash'>
            <div class='head_kash__kash'>
              <h3><?php echo $uTakeInfo["money"]; ?></h3>
            </div>
            <div class='head_kash__icon'>
              <svg data-name='Layer 1' id='Layer_1' viewbox='0 0 7.31 9.56' xmlns='http://www.w3.org/2000/svg'>
                <polyline points='0 9.56 2 7.56 2 0 0 0 0 9.56'></polyline>
                <polygon points='4.15 3.29 7.31 0 4.48 0 2.67 1.81 2.67 3.29 4.15 3.29'></polygon>
                <polygon points='2.67 5.33 3.45 6.11 4.87 4.7 4.15 3.97 2.67 3.97 2.67 5.33'></polygon>
              </svg>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>