<?php
require_once "../Info.php";
error_reporting(0);
date_default_timezone_set('Asia/Riyadh');
$hostname = "localhost";
$username = $SQLNameUser;
$password = $SQLPass;
$db = $SQLDBName;

$link=mysqli_connect($hostname,$username,$password,$db);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>