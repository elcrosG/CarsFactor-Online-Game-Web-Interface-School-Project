<?php
    $connect = new mysqli("localhost", "root", "", "carsfactor");
    $connect->set_charset("utf8");
    if ($connect->connect_error) {
        die("Error: " . $connect->connect_error);
    }

if (isset($_POST['login'])){

  $user_name=$_POST['user_name'];
  $user_pass=md5($_POST['user_pass']);

  if ($user_name && $user_pass) {

    $query=mysqli_query($connect, "select * from users where user_name='$user_name' and password='$user_pass'");

    $count=mysqli_num_rows($query);

    if ($count>0) {
      session_start();
      $_SESSION["user_name"]=$user_name;
      header('Location:profile.php');
    }
    else{
      header('Location:login.php?no');
    }
  }
}
if (isset($_POST['register'])) {
  $user_pass = md5($_POST['user_pass']);
  $add_user=mysqli_query($connect, "insert into users (user_name, password) VALUES ('".$_POST['user_name']."','".$user_pass."')");
  header("Location:login.php?rg=ok ");
}
if (isset($_POST['send_message'])) {
  $user_name=$_POST['user_name'];
  $user=mysqli_query($connect, "select * from users where user_name='$user_name'");
  $result = mysqli_fetch_array($user);
  $date=date('H:i:s');
  $add_message=mysqli_query($connect, "insert into messages (user_id, content, mDate) VALUES ('".$result['userid']."','".$_POST['content']."','".$date."')");
  $referer = $_SERVER['HTTP_REFERER'];
  header("Location: $referer");
}
if (isset($_POST['buy'])) {
  $user_name=$_POST['user_name'];
  $user=mysqli_query($connect, "select * from users where user_name='$user_name'");
  $result = mysqli_fetch_array($user);
  $car=mysqli_query($connect, "select * from own where user_id='".$result['userid']."'");
  $control = false;
  while($cresult = mysqli_fetch_assoc($car)){
    if($cresult['car_id']==$_POST['car_id']){
      $control = true;
    }
  }
  if($control || ($_POST['cost']>$result['money'])){
    header("Location:cars.php?status=no");
  }
  else{
    $money = $result['money'] - $_POST['cost'];
    $add_car=mysqli_query($connect, "insert into own (user_id, car_id) VALUES ('".$result['userid']."','".$_POST['car_id']."')");
    $up_money=mysqli_query($connect, "update users set money='$money' where userid = '".$result['userid']."'");
    header("Location:cars.php?status=ok");
  }

}

if (isset($_POST['create_race'])) {
  $user_id=$_POST['winner'];
  $user=mysqli_query($connect, "select * from users where userid='$user_id'");
  $result = mysqli_fetch_array($user);
  $money = $result['money'] + $_POST['prize'];
  $up_money=mysqli_query($connect, "update users set money='$money' where userid = '".$result['userid']."'");
  $add_race=mysqli_query($connect, "insert into race (date, prize, user_ids, map, car_ids) VALUES ('".date("Y-m-d")."','".$_POST['prize']."','".$_POST['winner']."','".$_POST['map-name']."','".$_POST['winner_car']."')");
  $race_id= mysqli_insert_id($connect);
  $add_join=mysqli_query($connect, "insert into _join (user_id, car_id, race_id, map_name) VALUES ('".$_POST['first-racer']."','".$_POST['first-racer-carid']."','".$race_id."','".$_POST['map-name']."')");
  $add_join=mysqli_query($connect, "insert into _join (user_id, car_id, race_id, map_name) VALUES ('".$_POST['second-racer']."','".$_POST['second-racer-carid']."','".$race_id."','".$_POST['map-name']."')");
  $add_join=mysqli_query($connect, "insert into _join (user_id, car_id, race_id, map_name) VALUES ('".$_POST['third-racer']."','".$_POST['third-racer-carid']."','".$race_id."','".$_POST['map-name']."')");
  $add_join=mysqli_query($connect, "insert into _join (user_id, car_id, race_id, map_name) VALUES ('".$_POST['fourth-racer']."','".$_POST['fourth-racer-carid']."','".$race_id."','".$_POST['map-name']."')");
  header("Location:settings.php?ok");
}
if (isset($_POST['sell'])) {
  $user_id=$_POST['userid'];
  $money = $_POST['money'] + $_POST['cost'];
  $up_money=mysqli_query($connect, "update users set money='$money' where userid = '$user_id'");
  $delete_car=mysqli_query($connect, "delete from own where user_id = '$user_id' and car_id = '".$_POST['car_id']."'");
  header("Location:mycars.php?status=ok");
}

?>