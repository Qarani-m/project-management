<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
if (!isset($_SESSION["login"])){
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dash.css">
    <title>Document</title>
</head>
<body>
    <div class="testlinks" style="position: absolute;z-index:9;top:30vh">
           <a href="index.php">index</a><a href="signup.php">signup</a><a href="../inc/logout.php">logout</a>
    </div>

<!-- overview / progress -->
<!-- lec remarks -->
<!-- remaining -->
<div class="big">
<nav class="navbar">
        <ul>
            <div>
                <a href=""><li>Overview</li></a>
                <a href=""><li>Lecturers remarks</li></a>
                <a href=""><li>Overview</li></a>
            </div>
            
            <a href=""><li>logout</li></a>
        </ul>
    </nav>
    <div class="left">
        
    </div>
    <div class="abt">
        <p>Qarani-m</p>
    </div>
</div>
    
    
</body>
</html>