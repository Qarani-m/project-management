<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "PROJECT";

$conn = new mysqli($db_host,$db_user,$db_pass,$db_name);

if(!$conn){
    die("connection failed");
}