<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CarsFactor Login/Register</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container z-depth-2">
	<ul class="tabs">
		<li class="tab col s3"><a class="white-text active" href="#login">login</a></li>
		<li class="tab col s3"><a class="white-text" href="#register">register</a></li>
	</ul>
	<div id="login" class="col s12">
		<form class="col s12" action="process.php" method="post">
			<div class="form-container">
				<br>
				<div class='head_logo'>
					<div class='head_logo__logo'>
					  <img src='racing.png'>
					</div>
					<div class='head_logo__title'>
					  <h2>CARS FACTOR</h2>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input name="user_name" id="user_name" type="text" class="validate">
						<label for="user_name">User Name</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input name="user_pass" id="user_pass" type="password" class="validate">
						<label for="user_pass">Password</label>
					</div>
				</div>
				<br>
				<center>
					<button class="btn waves-effect waves-light" type="submit" name="login">Connect</button>
				</center>
			</div>
		</form>
		<?php
          if (!isset($_GET['rg'])) {
            
           } else {
            if($_GET['rg']=='no') { 
          ?>
              <div class="badnotif" style="margin-bottom:5px; backgroud:none; border:none; font-size:14px;">
                <p><i class='bx bx-error-circle' ></i> Error!</p>
              </div>
              <?php }?>
              <?php $status = $_GET['rg'];
              if($status=='ok') { ?>
              <div class="goodnotif" style="margin-bottom:5px; backgroud:none; border:none; font-size:14px;">
                <p><i class='bx bx-check-circle'></i> Registration complete! You can login now.</p>
              </div>
              <?php }
           }
           ?>
	</div>
	<div id="register" class="col s12">
		<form class="col s12" action="process.php" method="post">
			<div class="form-container">
				<br>
				<div class='head_logo'>
					<div class='head_logo__logo'>
					  <img src='racing.png'>
					</div>
					<div class='head_logo__title'>
					  <h2>CARS FACTOR</h2>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input name="user_name" id="user_name" type="text" class="validate">
						<label for="user_name">User Name</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input name="user_pass" id="password" type="password" class="validate">
						<label for="password">Password</label>
					</div>
				</div>
				<center>
					<button class="btn waves-effect waves-light" type="submit" name="register">Register</button>
				</center>
			</div>
		</form>
	</div>
</div>
<!-- partial -->
  <script src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js'></script><script  src="./script.js"></script>

</body>
</html>
