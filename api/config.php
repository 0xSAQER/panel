<?php
error_reporting(0);
date_default_timezone_set('Asia/Riyadh');

// Check if running on Vercel (production) or locally
if (getenv('VERCEL_ENV') === 'production') {
    // Use Vercel environment variables
    $hostname = getenv('DB_HOST') ?: 'localhost';
    $username = getenv('DB_USER') ?: '';
    $password = getenv('DB_PASSWORD') ?: '';
    $db = getenv('DB_NAME') ?: '';

    // Project settings (copied from Info.php)
    $NameServer = "Brhom"; 
    $NameKey = "brhom";
    $NameFolder = "ServerBrhom";
} else {
    // Include original config for local development
    require_once "../Brhom/Info.php";
    
    $hostname = "localhost";
    $username = $SQLNameUser;
    $password = $SQLPass;
    $db = $SQLDBName;
}

$link = mysqli_connect($hostname, $username, $password, $db);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?> 