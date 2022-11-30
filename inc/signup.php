<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include "config.php";

if(isset($_POST['Signup'])){
$username = $_POST['SignupName'];
$reg_number = filter_var($_POST['SignupReg']);
$email =filter_var($_POST['SignupEmail']);
$password =filter_var( $_POST['SignupPassword']);
$cat =filter_var( $_POST['cat']);
$confirm_password = filter_var($_POST['comfirm_Password']);
$signup = filter_var($_POST['Signup']);
if(!isset($signup)){header("Location:index.php");}
if($password != $confirm_password){
		echo "<a class='pwd_mis'>Password mismatch..</a>";
		exit();
}
$password_ = password_hash($password,PASSWORD_DEFAULT);
echo $username."\n";
echo $reg_number."\n";
echo $email."\n";
echo $password_."\n";
$sql = "insert into student_details(name,registration,email,password)values('$username','$reg_number','$email','$password_');";
try{
	$result = mysqli_query($conn, $sql);
    if(!$result){
        echo "<a class='pwd_mis' style='margin-top:10vh'>Database error..</a>";
        exit();
    }
}catch(Exception $e){
	echo "<a class='pwd_mis'>$e	</a>";
    exit();
    }
}

?>