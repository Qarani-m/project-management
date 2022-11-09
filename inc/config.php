<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "project";

$conn = new mysqli($db_host,$db_user,$db_pass,$db_name);
echo "die";
if(!$conn){
    die("connection failed");
    
}else{
    echo "Connected good..";
}

?>