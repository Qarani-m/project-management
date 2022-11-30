<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
$conn = new PDO("mysql:host=localhost;dbname=PROJECT","root","");
if(isset($_POST["send"])){
$name = $_FILES['upload_file']['name'];
$type = $_FILES['upload_file']['type'];
$data = file_get_contents($_FILES['upload_file']['tmp_name']);
$stmt =  $conn-> prepare("insert into files(name,mime,data) values(?,?,?)");
$stmt->bindParam(1,$name);
$stmt->bindParam(2,$type);
$stmt->bindParam(3,$data);
if($stmt->execute()){
    exit();
    echo "<p>Insert good</p>";
}else{
    echo var_dump($stmt->errorInfo());
    }
}
?>