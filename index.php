<?php
	include('includes/config.php');
	$reqErr = $loginErr = "";
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		if(!empty($_POST['userName']) && !empty($_POST['password']) && isset($_POST['login_type'])){
			session_start();
			$userName = $_POST['userName'];
			$password = $_POST['password'];
			$_SESSION['sessLogin_type'] = $_POST['login_type'];
			if($_SESSION['sessLogin_type'] == "parent") {
				//if selected type is parent than check for valid parent.
				$query_selectParent = "SELECT id,userName,password FROM parent WHERE userName='$userName' AND password='$password'";
				$result = mysqli_query($con,$query_selectParent);
				$row = mysqli_fetch_array($result);
				if($row) {
					$_SESSION['id'] =  $row['id'];
					$_SESSION['userName'] = $_POST['userName'];
					$_SESSION['password'] = $_POST['passsword'];
					$_SESSION['parent_login'] = true;
					header('Location:parent/page.php');
				}
				else {
					$loginErr = "* Username or Password is incorrect.";
				}
			}
			else if($_SESSION['sessLogin_type'] == "hospital") {
				//if selected type is hospital than check for valid hospital.
				$query_selectHospital = "SELECT id,userName,password FROM hospital WHERE username='$userName' AND password='$password'";
				$result = mysqli_query($con,$query_selectHospital);
				$row = mysqli_fetch_array($result);
				if($row) {
					$_SESSION['hospital_id'] =  $row['id'];
					$_SESSION['sessUsername'] = $_POST['userName'];
					$_SESSION['sessPassword'] = $_POST['password'];
					$_SESSION['hospital_login'] = true;
					header('Location:hospital/hospital.php');
				}
				else {
					$loginErr = "* Username or Password is incorrect.";
				}
			}
			else if($_SESSION['sessLogin_type'] == "admin") {
				$query_selectAdmin = "SELECT userName,password FROM admin WHERE userName='$userName' AND password='$password'";
				$result = mysqli_query($con,$query_selectAdmin);
				$row = mysqli_fetch_array($result);
					if($row) {
						$_SESSION['admin_login'] = true;
						$_SESSION['sessUsername'] = $_POST['userName'];
						$_SESSION['sessPassword'] = $_POST['password'];
						header('Location:admin/index.php');
					}
					else {
						$loginErr = "* Username or Password is incorrect.";
					}
				}
			}
		else {
			$reqErr = "* All fields are required.";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Login </title>
	<link rel="stylesheet" href="includes/main_style.css" >
</head>
<body class="login-box">
	<h2 style="font-family: Time New Roman;">IMMUNISATION SCHEDULE REMINDER</h2>
	<h1>LOGIN</h1>
	<form action="" method="POST" class="login-form">
	<ul class="form-list">
	<li>
		<div class="label-block"> <label for="login:username">Username</label> </div>
		<div class="input-box"> <input type="text" id="login:username" name="userName" placeholder="Username" /> </div>
	</li>
	<li>
		<div class="label-block"> <label for="login:password">Password</label> </div>
		<div class="input-box"> <input type="password" id="login:password" name="password" placeholder="Password" /> </div>
	</li>
	<li>
		<div class="label-block"> <label for="login:type">Login Type</label> </div>
		<div class="input-box">
		<select name="login_type" id="login:type">
		<option value="" disabled selected>-- Select Type --</option>
		<option value="parent">Parent</option>
		<option value="hospital">Hospital</option>
		<option value="admin">Admin</option>
		</select>
		</div>
	</li>
	<li>
		<input type="submit" value="Login" class="submit_button" /> <span class="error_message"> <?php echo $loginErr; echo $reqErr; ?> </span>
	</li>
	</ul>
	</form>
</body>
</html>