<?php 
session_start();
if(!isset($_SESSION['login'])){
    header("Location:index.php");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profile.css">
    <title>Document</title>
</head>
<body>
<?php include "../partials/navbar.php"?>
<?php include "../partials/side_bar.php"?>



<style>
.main{
    padding:3vh 0px 0vh 0vw;
    position:relative;
    margin-top:-5vh;   

}

.students{
    position:absolute;
    /* background-color: green; */
    width:50%;
}
.lec{
    position:absolute;
    width:50%;
    left:35vw;

}
.main input,.password input{
width:90%;
margin-left: 1vw;

}
.password input{
    background-color: white;
    border:1px solid black;
    color:black;
}
.password{
    width:50%;
    position: absolute;
    top:37vh;
    left:34vw;
}
</style>















<?php
if(!isset($_SESSION['login'])){session_start();}
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
                if(password_verify($old,$row['password'])==true){
                    $pass_hash = password_hash($new,PASSWORD_DEFAULT);
                    $sql2 = "update student_details set password= '$pass_hash' where registration='$reg';";
                    $result2 = mysqli_query($conn,$sql2);
                        if($result2){
                            echo "<p style='color:green;position:absolute;top:70vh;left:10vw'>Password Updated Successfully</p>";
                        }else{
                            echo "<p style='color:red;position:absolute;top:70vh;left:10vw'>Something went wrong..try again</p>";
                        }
                }else{
                    echo "<p style='color:red;position:absolute;top:70vh;left:10vw'>Wrong password</p>";
                }
            }
        }

    }
}else{
    echo "<p style='color:red;position:absolute;top:70vh;left:10vw'>Password Mismatch</p>";
}
}
?>


<div class="main">
    <form method="POST" action="../inc/profile.php">
        <div class="students">
        <p>Name</p>
        <input type="text" name="name" id="name" placeholder=<?php echo $_SESSION['username'] ?> disabled>
        <p>Registration number</P>
        <input type="text" name="name" id="name" placeholder=<?php echo $_SESSION['regg']?> disabled>
        <p>Email</P>
        <input type="text" name="email" id="name" placeholder=<?php echo $_SESSION['email']?> disabled>
        <p>Phone number</p>
        <input type="text" name="Phone_no" id="name" placeholder=<?php echo $_SESSION['phone']?> disabled>
        <p>Thematic area</p>
        <input type="text" name="name" id="name" placeholder="Machine learning" disabled>
        </div>

        <div class="lec">
        <p>Lecturer assigned</p>
        <input type="text" name="name" id="name" placeholder="Muthengi" disabled>
        <p>Lecturer number</p>
        <input type="text" name="name" id="name" placeholder="0704847676" disabled>
        <p>Lecturer email</p>
        <input type="text" name="name" id="name" placeholder="muthengi@email" disabled>
        </div>
     
    </form>
    <div class="password">
        <span>Change password</span>
        <form action="" method="post">
            <input type="password" name="opass" id="opassword" placeholder="Old password">
            <input type="password" name="npass" id="npassword" placeholder="New password">
            <input type="password" name="cpass" id="cpassword" placeholder="Confirm passwor">
            <input style='background:crimson' type="submit" name="pass_chng" id="cpassword" value="change password">
        </form>
    </div>
</div>
<script src="../js/profile.js"></script>
</body>
</html>