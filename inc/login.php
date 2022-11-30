<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include("config.php");
session_start();

$reg_number = htmlspecialchars($_POST['reg_no']);
$pwd = htmlspecialchars($_POST['LoginPassword']);
$signup = filter_var($_POST['login']);

if(!isset($signup)){header("Location:index.php");}
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

        }
    }

}

?>