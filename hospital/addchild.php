
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="css/bootstrap.min.css">

<link rel="stylesheet" href="../includes/main_style.css" >
<title>Immunization Reminder</title>
</head>

<body>
<?php
		include("../includes/header.inc.php");
		
		include("../includes/aside_hospital.php");
	?>
	<section>
		<h1>Add Child Details</h1>
		<form method = "POST" action = "#">
								<table width = "600" border ="0" cellspacing ="1" cellpadding = "2">
							
									<tr>
										<td width="250">Name</td>
										<td><input required name = "name" type = "text" ></td>
									</tr>
									<tr>
										<td width="250">Sex</td>
										<td><input required name = "sex" type = "text" ></td>
									</tr>
									<tr>
										<td width="250">Date</td>
										<td><input required name = "sex" type = "date" ></td>
									</tr>
									<tr>
										<td width="250">Parent ID</td>
										<td><input required name = "parentid" type = "text" ></td>
									</tr>
									<tr>
										<td width="250">Immunisation ID</td>
										<td><input  required name = "immunisationid" type = "text" ></td>
									</tr>
									
									<tr>
										<td width="250">Status</td>
										<td><input required name = "status" type = "text" ></td>
									</tr>
									
									<tr>
										<td width = "250"></td>
										<td><input name ="add" type ="submit" id="add" value = "ADD CHILD"></td>
									</tr>

								</table>

								</form>
	</section>
	<?php
					include("../includes/footer.inc.php");
				?>
</body>
</html>
<?php
						// Attempt MySQL server connection. 
						$link = mysqli_connect("localhost", "root", "", "immunisation");
						
						// Check connection
						if($link === false){
							die("ERROR: Could not connect. " . mysqli_connect_error());
						}
						if(isset($_POST['name'])){
						

						
								// Escape user inputs for security
								$name = mysqli_real_escape_string($link, $_REQUEST['name']);
								$sex = mysqli_real_escape_string($link, $_REQUEST['sex']);
								$dob = mysqli_real_escape_string($link, $_REQUEST['dob']);
								$parentid = mysqli_real_escape_string($link, $_REQUEST['parentid']);
								$immunisationid = mysqli_real_escape_string($link, $_REQUEST['immunisationid']);
								$status = mysqli_real_escape_string($link, $_REQUEST['status']);
								





						
						
						// Attempt insert query execution
						$sql = "INSERT INTO child (name,sex,dob,parentid,immunisationid,status) VALUES ('$name', '$sex','$parentid','$immunisationid','$status')";
						if(mysqli_query($link, $sql)){
							echo "Records added successfully.";
						} else{
							echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
						}
					}
						
						// Close connection
						mysqli_close($link);
					?>
			