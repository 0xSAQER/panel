<?php
require_once "Encrypt.php";
include_once 'config.php';
session_start();

if (empty($_SESSION['usernameGu']) && empty($_SESSION['usernameGuA'])) {
		echo "<script>window.location = 'login.php'</script>";
} else {
    $username = base64_decode(hexToStr (base64_decode(hexToStr (base64_decode($_SESSION["usernameGuA"])))));
    $password = base64_decode(hexToStr (base64_decode(hexToStr (base64_decode($_SESSION["passwordGuA"])))));

    $query = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
	$results = mysqli_query($link, $query);
    if (mysqli_num_rows($results) == 0) {
    echo "<script>window.location = 'login.php'</script>";
    } else {
    $rand = '@&#^@HJSNJEC[]FDCNE=-38473DNDJNIEDJWOKSXWOXJCNEDHXNSJ!&^%';
    $RandomRoom = substr(str_shuffle($rand),1,30);
    $sql = "INSERT INTO `room` (Room) VALUES ('$RandomRoom')";
    if ($link->query($sql) === TRUE);
    $_SESSION["Room"] = $RandomRoom;
    }
    }

if(isset($_POST['logout'])){
	unset($_SESSION['usernameGu']);
	unset($_SESSION['usernameGuA']);
	echo "<script>window.location = 'login.php'</script>";
	exit();
}
?>