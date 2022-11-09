<?php
session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/signup.css">
	<title></title>
</head>
<body>



<div id="SigupMain">
	<div class="SigupMain ">
		<div class="logo"><p>Chuka University</p></div>

			<div class="left">
				<img src="../assets/img2.svg">
			</div>
			<div class="right"style="background:; top:vh">
				<div class="h1">
				
					<h1>Sign Up</h1>
				</div>
				<div class="form">
					<form method="POST" action="">
						<input class="input" type="text" name="SignupName" placeholder="Name" value = "martin">
						<input class="input" type="text" name="SignupReg" placeholder="Registration" value="karani">
						<input class="input" type="text" name="SignupEmail" placeholder="Email" value="email@emial">
						<input class="input" name="SignupPassword" placeholder="Password" type="password" value="password">
						<input class="input" name="comfirm_Password" placeholder="Comfirm Password" type="password" value= "password">
						<input type="submit" name="Signup" value="Signup">
					</form>
				</div>
				
				<div class="createAccount Login_">

					<a onclick="" id="yesAcc" href="index.php">Already have an account? Login</a>
				</div>
			</div>
	</div>
</div>



<script type="text/javascript" src="js/login.js"></script>
</body>
</html>
<?php
include "../inc/signup.php"



?>