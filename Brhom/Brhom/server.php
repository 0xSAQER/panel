<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
include_once 'config.php';
require_once "Encrypt.php";
session_start();

	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($link, $_POST['username']);
		$password = mysqli_real_escape_string($link, $_POST['password']);

		if (count($errors) == 0) {
			$query = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
			$results = mysqli_query($link, $query);

			if (mysqli_num_rows($results) == 1) {
        $query = mysqli_query($link,"SELECT * FROM `users` WHERE username = '$username'");
        foreach($query as $row){
        $Getid = $row["id"];
        $Last = date("Y/m/d H:m:s");
        
        $update = "UPDATE `users` SET LastLogin = '$Last' WHERE id = $Getid";
        if ($link->query($update) === TRUE);

        $GetIP = $_SERVER["REMOTE_ADDR"];
        $LogEcho = 'Login : '. $username ." , " ."ip : " . $GetIP ." , ". 'Time : '. date("Y/m/d H:m:s");
        $AddLoG = "INSERT INTO `log` (`Log`, `Set`) VALUES ('$LogEcho', 'INSERT')";
        if ($link->query($AddLoG) === TRUE);
			if ($row["rank"] == "Control") {
				$_SESSION['usernameGu'] = base64_encode(strToHex (base64_encode(strToHex (base64_encode($username)))));
				$_SESSION['passwordGu'] = base64_encode(strToHex (base64_encode(strToHex (base64_encode($password)))));
				$_SESSION['usernameGuA'] = base64_encode(strToHex (base64_encode(strToHex (base64_encode($username)))));
				$_SESSION['passwordGuA'] = base64_encode(strToHex (base64_encode(strToHex (base64_encode($password)))));
				$_SESSION['UserName'] = base64_encode(strToHex (base64_encode(strToHex (base64_encode($username)))));
				echo "<script>window.location = 'index.php'</script>";
			} else {
			$_SESSION['usernameGuA'] = base64_encode(strToHex (base64_encode(strToHex (base64_encode($username)))));
			$_SESSION['passwordGuA'] = base64_encode(strToHex (base64_encode(strToHex (base64_encode($password)))));
			$_SESSION['UserName'] = base64_encode(strToHex (base64_encode(strToHex (base64_encode($username)))));
			echo "<script>window.location = 'Admin.php'</script>";
			}
		}
} else {
}}}
?>