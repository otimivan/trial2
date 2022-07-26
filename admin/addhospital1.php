<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="../includes/main_style.css" >

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Immunization Reminder</title>
</head>

<body>	
			<?php
				include("../includes/header.inc.php");
				include("../includes/nav_admin.inc.php");
				include("../includes/aside_admin.inc.php");
			?>
				
				<section>
				
						



								
								<form method = "POST" action = "addhospital1.php">
								<table width = "600" border ="0" cellspacing ="1" cellpadding = "2">
							<h1>Add Hospital</h1>
									<tr>
										<td width="250">Name</td>
										<td><input required name = "name" type = "text" ></td>
									</tr>
									<tr>
										<td width="250">UserName</td>
										<td><input required name = "userName" type = "text" ></td>
									</tr>
									<tr>
										<td width="250">Email</td>
										<td><input required name = "email" type = "text" ></td>
									</tr>
									<tr>
										<td width="250">Password</td>
										<td><input  required name = "password" type = "password" ></td>
									</tr>
									<tr>
										<td width="250">Date</td>
										<td><input required name = "dateCreated" type = "date" ></td>
									</tr>
									<tr>
										<td width = "250"></td>
										<td></td>
									</tr>
									<tr>
										<td width = "250"></td>
										<td><input name ="add" type ="submit" id="add" value = "ADD HOSPITAL"></td>
									</tr>

								</table>

								</form>
							</section>
				

</body>
				<?php
					include("../includes/footer.inc.php");
				?>
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
								$userName = mysqli_real_escape_string($link, $_REQUEST['userName']);
								$email = mysqli_real_escape_string($link, $_REQUEST['email']);
								$password = mysqli_real_escape_string($link, $_REQUEST['password']);
								$dateCreated = mysqli_real_escape_string($link, $_REQUEST['dateCreated']);
						
						
						// Attempt insert query execution
						$sql = "INSERT INTO hospital (name, userName, email,password,dateCreated) VALUES ('$name', '$userName', '$email','$password','$dateCreated')";
						if(mysqli_query($link, $sql)){
							echo "Records added successfully.";
						} else{
							echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
						}
					}
						
						// Close connection
						mysqli_close($link);
					?>
			