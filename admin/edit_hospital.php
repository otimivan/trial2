<?php
	include("../includes/config.php");
	include("../includes/validate_data.php");
	session_start();
	if(isset($_SESSION['admin_login'])) {
		if($_SESSION['admin_login'] == true) {
			$id = $_GET['id'];
			$query_selectHosDetails = "SELECT * FROM hospital WHERE id='$id'";
			$result_selectHosDetails = mysqli_query($con,$query_selectHosDetails);
			$row_selectHosDetails = mysqli_fetch_array($result_selectHosDetails);
			$name = $email =  $userName = $password = "";
			$nameErr = $emailErr = $phoneErr = $usernameErr = $passwordErr = $requireErr = $confirmMessage = "";
			$nameHolder = $emailHolder = $passwordHolder = $usernameHolder = "";
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				if(!empty($_POST['name'])) {
					$nameHolder = $_POST['name'];
					$resultValidate_name = validate_name($_POST['name']);
					if($resultValidate_name == 1) {
						$name = $_POST['name'];
					}
					else{
						$nameErr = $resultValidate_name;
					}
				}
				if(!empty($_POST['email'])) {
					$emailHolder = $_POST['email'];
					$resultValidate_email = validate_email($_POST['email']);
					if($resultValidate_email == 1) {
						$email = $_POST['email'];
					}
					else {
						$emailErr = $resultValidate_email;
					}
				}
				
				if(!empty($_POST['userName'])) {
					$usernameHolder = $_POST['userName'];
					$resultValidate_username = validate_username($_POST['userName']);
					if($resultValidate_username == 1) {
						$username = $_POST['userName'];
					}
					else{
						$usernameErr = $resultValidate_username;
					}
				}
                if(!empty($_POST['password'])) {
					$password= $_POST['password'];
					$resultValidate_password = validate_password ($_POST['password']);
					if($resultValidate_password == 1) {
						$password = $_POST['password'];
					}
					
				}
				if($name != null && $email != null && $username != null && $password != null) {
					$query_UpdateMan = "UPDATE hospital SET name='$name',email='$email',userName='$username',password='$password' WHERE id='$id'";
					if(mysqli_query($con,$query_UpdateMan)) {
						echo "<script> alert(\"Hospital Details Updated Successfully\"); </script>";
						header('Refresh:0;url=viewhospital.php');
					}
					else {
						$requireErr = "Updating Hospital Failed";
					}
				}
				else {
					$requireErr = "* Valid Name, Email, Username & Password are compulsory";
				}
			}
		}
		else {
			header('Location:../index.php');
		}
	}
	else {
		header('Location:../index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Edit Hospital </title>
	<link rel="stylesheet" href="../includes/main_style.css" >
</head>
<body>
	<?php
		include("../includes/header.inc.php");
		include("../includes/nav_admin.inc.php");
		include("../includes/aside_admin.inc.php");
	?>
	<section>
		<h1>Edit Hospital</h1>
		<form action="" method="POST" class="form">
		<ul class="form-list">
		<li>
			<div class="label-block"> <label for="hospital:name">Name</label> </div>
			<div class="input-box"> <input type="text" id="hospital:name" name="name" placeholder=" Enter Name" value="<?php echo $row_selectHosDetails['name']; ?>" required /> </div> <span class="error_message"><?php echo $nameErr; ?></span>
		</li>
		<li>
			<div class="label-block"> <label for="hospital:email">Email</label> </div>
			<div class="input-box"> <input type="text" id="hospital:email" name="email" placeholder="Enter Email" value="<?php echo $row_selectHosDetails['email']; ?>" required /> </div> <span class="error_message"><?php echo $emailErr; ?></span>
		</li>
		
		<li>
			<div class="label-block"> <label for="hospital:username">Username</label> </div>
			<div class="input-box"> <input type="text" id="hospital:username" name="userName" placeholder="Username" value="<?php echo $row_selectHosDetails['userName']; ?>" required /> </div> <span class="error_message"><?php echo $usernameErr; ?></span>
		</li>
        <li>
			<div class="label-block"> <label for="hospital:password">Password</label> </div>
			<div class="input-box"> <input type="password" id="hospital:username" name="password" placeholder="Password" value="<?php echo $row_selectHosDetails['password']; ?>" required /> </div> <span class="error_message"><?php echo $usernameErr; ?></span>
		</li>
		<li>
			<input type="submit" value="Update Hospital" class="submit_button" /> <span class="error_message"> <?php echo $requireErr; ?> </span><span class="confirm_message"> <?php echo $confirmMessage; ?> </span>
		</li>
		</ul>
		</form>
	</section>
	<?php
		include("../includes/footer.inc.php");
	?>
</body>
</html>