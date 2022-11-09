<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');


include("config.php");
session_start();


$reg_number = htmlspecialchars($_POST['reg_no']);
$pwd = htmlspecialchars($_POST['LoginPassword']);
$signup = filter_var($_POST['login']);


if(!isset($signup)){header("Location:index.php");}
// echo "sfs";

$sql = "select password from student_details where reg_no = '$reg_number'";

$results = mysqli_query($conn,$sql);
if($results==false){
    echo "sfs";
}


$rows= mysqli_num_rows($results);
echo $rows;
if(mysqli_num_rows($results) > 0){
    echo mysqli_num_rows($results) ;
    while($row = mysqli_fetch_assoc($results)){
        $hash = $row['password'];
        if(password_verify($pwd,$hash)==true){
            $_SESSION['login'] = "GREEN";
            header("Location:../views/dash.php");
        }
    }

}