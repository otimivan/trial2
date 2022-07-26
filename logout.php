<?php
	include("includes/config.php");
	session_start();
	if(isset($_SESSION['admin_login']) || isset($_SESSION['hospital_login']) || isset($_SESSION['parent_login'])) {
		session_destroy();
		//		echo "<h2 style=\"color:#009688\">You will be redirected to Login page in 3 seconds...</h2>";
		header('Refresh:2;url="index.php"');
	}
	else {
			header('Location:../index.php');
	}
?>