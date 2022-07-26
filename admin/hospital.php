<?php
	include("./admin/connect.php");
	include("./includes/validate_data.php");
	session_start();
	if(isset($_SESSION['admin_login'])) {
		if($_SESSION['admin_login'] == true) {
			$query_hospital = "SELECT * FROM hospital";
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				if(!empty($_POST['$name'])) {
					$nameHolder = $_POST['$name'];
					$name = $_POST['$name'];
				}
				}
				if(isset($_POST['$username'])) {
					$userName = $_POST['$username'];
				}
				if(isset($_POST['$email'])) {
					$email = $_POST['$email'];
				}
				if(isset($_POST['$dateCreated'])) {
					$email = $_POST['$dateCreated'];
				}
				if($name != null && $userName != null && $email != null && $password != null && $id != null && $dateCreated != null) {
					$query_hospital= "INSERT INTO hospital(name,userName,email,pword,id,dateCreated) VALUES('$id','$name','$username','$email','$password')";
					if(mysqli_query($con,$query_hospital)) {
						echo "<script> alert(\"Hospital Added Successfully\"); </script>";
						header('Refresh:0');
					}
					else {
						$requireErr = "Adding Hospital Failed";
					}
			}
				else if($name != null && $price != null && $unit != null && $category != null && $rdbStock == 2) {
						$query_addProduct = "INSERT INTO products(pro_name,pro_desc,pro_price,unit,pro_cat,quantity) VALUES('$name','$description','$price','$unit','$category',NULL)";
					if(mysqli_query($con,$query_addProduct)) {
						echo "<script> alert(\"Hospital Added Successfully\"); </script>";
						header('Refresh:0');
					}
					else {
						$requireErr = "Adding Hospital Failed";
					}
				}
				else {
					$requireErr = "* All Fields are Compulsory with valid values";
				}
			}
		}
		else {
			header('Location:./admin/index.php');
		}
	/*else {
		header('Location:./admin/index.php');
	}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="css/bootstrap.min.css">

<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="./includes/main_style.css" >
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/rightde.js"></script>
<script type="text/javascript" src="js/rightde.js"></script>
<title>Immunization Reminder</title>
</head>
<div class="container">
<div class="row">
<div class="col-md-12">
<img src="./admin/nav.png" width="100%"/>
<h1 class="text-center " style="font-family: Time New Roman">Immunization Schedule  Reminder<br /><small style="font: size 25px;">Immunization Campaign</small></h1>
</div>
</div>
</div>
<body>
	<?php
		include("./includes/aside_hospital.php");
	?>
	<section>
		<h1>Welcome to Hospital Panel</h1>
		<form action="" method="POST" class="form">
</section>
<table border="1">
	<tr><td></td></tr>
</table>
</body>
</html>