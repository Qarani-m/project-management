<?php 
session_start();
if(!isset($_SESSION['login'])){
    header("Location:index.php");
}
?>







<?php include "../partials/navbar.php"?>
<?php include "../partials/side_bar.php"?>

<link rel="stylesheet" href="../css/upload.css">
<style>
    #file_type{
        border:none;
        width: 13vw;
        border-radius:2vh;
        height: 4.5vh;
        border: 1px solid crimson;
        margin-top: -6vh;
    }
</style>
<div class="upload">
    <div class="max">
        <p>Maximum file size allowed is 5mb</p>
    </div>
    <div class="main" id="main">
        <p>
        </p>
        <form  method= "post" action="" enctype="multipart/form-data">
            <select name="file_name" id="file_select" >
                <option value="system_proposal">System Proposal</option>
                <option value="system_requirements">System Requirements and Specification</option>
                <option value="system_design">System design Document</option>
                <option value="actual_sys">Actual System Development</option>
                <option value="implementation_testing">Implementation & Testing</option>
                <option value="documentation">Final System Documentation</option>
            </select>
                <p></p>
            <label for="file_upload" id= "label">
               Select file <input id="file_upload" type="file" name="upload_file" id="" >
            </label>
            <button type="submit" name = "send"id = "submit_">Upload</button>
        </form>
    </div>
</div>
<script src="../js/upload.js"></script>
<?php
include "../inc/config.php";
error_reporting(E_ALL);
ini_set('display_errors', '1');
$conn__ = new PDO("mysql:host=localhost;dbname=PROJECT","root","");
if(isset($_POST["send"])){
$file_name = $_POST['file_name'];
$_SESSION['file_name'] = $file_name;
$name = $_FILES['upload_file']['name'];
$type = $_FILES['upload_file']['type'];
$data = file_get_contents($_FILES['upload_file']['tmp_name']);
$stmt =  $conn__-> prepare("insert into files(reg_number,file_cat,name,mime,data) values(?,?,?,?,?)");
$stmt->bindParam(1,$_SESSION['login']);
$stmt->bindParam(2,$file_name);
$stmt->bindParam(3,$name);
$stmt->bindParam(4,$type);
$stmt->bindParam(5,$data);
$file = $_SESSION['file_name'];
if(check_duplicates($file,$conn)==1){
    exit();
    }else{
        if($stmt->execute()){
            $reg = $_SESSION["login"];
            $file = $_SESSION['file_name'];
            $sql2= "insert into status(reg_number, file_name, submitted,reviewed) values('$reg','$file',true,false)";
            echo "<p style='position:absolute;top:70vh; left: 55vw; color: green'class='fileSuccess'>File inserted successfully</p>";
            if(check_duplicates($file,$conn)==1){
                echo "error : 82";
                exit();
            }
            mysqli_query($conn,$sql2);
        }else{
            echo "<p style='position:absolute;top:70vh; left: 55vw; color: green'class ='fileFailure'>A problem occured please try again...</p>";
        }
    }
}
function check_duplicates($file,$conn){
    return 0;
}
?>