<?php
session_start();
include("../inc/config.php");

$reg = $_SESSION['login']; 
if(isset($_POST['pass_chng'])){
    $old = $_POST['opass'];
    $new = $_POST['npass'];
    $confirm = $_POST['cpass'];
    $reg = $_SESSION['login']; 
    if($new==$confirm){
    $sql1 = "select password from student_details where registration='$reg';";
    $result1 = mysqli_query($conn,$sql1);
    if($result1){
        $rows= mysqli_num_rows($result1);
        if($rows>0){
            while($row=mysqli_fetch_assoc($result1)){
                echo $row['password'];
                if(password_verify($old,$row['password'])==true){
                    echo "Correct";
                    $pass_hash = password_hash($new,PASSWORD_DEFAULT);
                    $sql2 = "update student_details set password= '$pass_hash' where registration='$reg';";
                    $result2 = mysqli_query($conn,$sql2);
                        if($result2){
                            echo "<p style='color:green'>Password Updated Successfully</p>";
                        }else{
                            echo "<p style='color:red'>Something went wrong..try again</p>";
                        }
                }else{
                    echo "<p style='color:red'>Wrong password</p>";
                }
            }
        }

    }
}else{
    echo "<p style='color:red'>Password Mismatch</p>";
}

}
