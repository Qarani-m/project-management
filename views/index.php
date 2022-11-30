<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<title></title>
</head>
<body>



<style>
	body{
		background:white;
	}
	.right,.left{
		background:none;
	}
</style>
<div id="mainLogin">
	<section class="mainSection">
		<div class="logo"><p>Chuka University</p></div>
			<div class="left">
				<img src="../assets/img1.svg">
			</div>
			<div class="right">
				<div class="h1">
					<h1>Login</h1>
				</div>
				<div class="form">
					<form method="post" action="">
						<input class="input" type="text" name="reg_no" placeholder="reg no" value= "karani2">
						<input class="input" name="LoginPassword" placeholder="password" type="password" value="password">
						<input type="submit" name="Login" value="Login">
					</form>
				</div>
				<div class="forgot">
					<!-- <p><a href="">Forgot password</a></p> -->
				</div>
				<div class="createAccount">
										<!-- <a id="noAcc" onclick="" href="signup.php">Dont have an account? Sign up</a> -->
				</div>
			</div>
	</section>
</div>
<script type="text/javascript" src="js/login.js"></script>
</body>
</html>

<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include("../inc/config.php");
session_start();


if(isset($_POST['Login'])){
$reg_number = htmlspecialchars($_POST['reg_no']);
$pwd = htmlspecialchars($_POST['LoginPassword']);
$sql = "select * from student_details where registration = '$reg_number'";
$results = mysqli_query($conn,$sql);
if($results==false){
    echo "<script>alert('No user with that usernam:')</script>";
}
// $rows= mysqli_num_rows($results);
if(mysqli_num_rows($results) > 0){
    echo mysqli_num_rows($results) ;
    while($row = mysqli_fetch_assoc($results)){
        $hash = $row['password'];
        $name = $row['name'];
        $email =$row['email'];
        $reg__=$row['registration'];
        $phone = $row["phone_number"];
        $_SESSION['username'] = $name;
        $_SESSION['email'] =$email;
        $_SESSION['regg']=$reg__;
        $_SESSION['phone']=$phone;
        if(password_verify($pwd,$hash)==true){
            $_SESSION['login'] = $reg_number;
            header("Location:../views/dash.php");
        }else{
				echo "<p style='color:red'>Wrong username / password</>";
        }
    }

}else{
	echo "<p style='color:red;position:absolute;top:30vw;left:65vw'>Wrong username / password</>";
}


}

?>