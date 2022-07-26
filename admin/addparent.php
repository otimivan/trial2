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
				
						



								
								<form method = "POST" action = "#">
								<table width = "600" border ="0" cellspacing ="1" cellpadding = "2">
							<h1>Add Parent</h1>
									<tr>
										<td width="250">Name</td>
										<td><input required name = "name" type = "text" ></td>
									</tr>
									<tr>
										<td width="250">Phone</td>
										<td><input required name = "contact" type = "text" ></td>
									</tr>
									<tr>
										<td width="250">Gender</td>
										<td><input required name = "gender" type = "text" ></td>
									</tr>
									<tr>
										<td width="250">Address</td>
										<td><input  required name = "address" type = "text" ></td>
									</tr>
									<tr>
										<td width="250">Email</td>
										<td><input required name = "email" type = "email" ></td>
									</tr>
									<tr>
										<td width="250">District</td>
										<td><input required name = "district" type = "text" ></td>
									</tr>
									<tr>
										<td width="250">Subcounty</td>
										<td><input required name = "subcounty" type = "text" ></td>
									</tr>
									<tr>
										<td width="250">County</td>
										<td><input required name = "county" type = "text" ></td>
									</tr>
									<tr>
										<td width="250">Parish</td>
										<td><input required name = "parish" type = "text" ></td>
									</tr>
									<tr>
										<td width="250">Village</td>
										<td><input required name = "village" type = "text" ></td>
									</tr>
									<tr>
										<td width="250">Password</td>
										<td><input required name = "village" type = "pasword" ></td>
									</tr>
									<tr>
										<td width="250">Date</td>
										<td><input required name = "dateCreated" type = "date" ></td>
									</tr>
									<tr>
										<td width="250">Username</td>
										<td><input required name = "userName" type = "text" ></td>
									</tr>
									<tr>
										<td width = "250"></td>
										<td></td>
									</tr>
									<tr>
										<td width = "250"></td>
										<td><input name ="add" type ="submit" id="add" value = "ADD PARENT"></td>
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
								$contact = mysqli_real_escape_string($link, $_REQUEST['contact']);
								$gender = mysqli_real_escape_string($link, $_REQUEST['gender']);
								$address = mysqli_real_escape_string($link, $_REQUEST['address']);
								$userName = mysqli_real_escape_string($link, $_REQUEST['userName']);
								$email = mysqli_real_escape_string($link, $_REQUEST['email']);
								$password = mysqli_real_escape_string($link, $_REQUEST['password']);
								$dateCreated = mysqli_real_escape_string($link, $_REQUEST['dateCreated']);
								$district = mysqli_real_escape_string($link, $_REQUEST['district']);
								$subcounty = mysqli_real_escape_string($link, $_REQUEST['subcounty']);
								$county = mysqli_real_escape_string($link, $_REQUEST['county']);
								$parish = mysqli_real_escape_string($link, $_REQUEST['parish']);
								$village = mysqli_real_escape_string($link, $_REQUEST['village']);





						
						
						// Attempt insert query execution
						$sql = "INSERT INTO parent (name,contact,gender,address,email,district,subcounty,county,parish,village,password,dateCreated, userName) VALUES ('$name', '$contact','$gender','$address','$email','$district','$subcounty','$county','$parish','$village','$password','$dateCreated','$userName')";
						if(mysqli_query($link, $sql)){
							echo "Records added successfully.";
						} else{
							echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
						}
					}
						
						// Close connection
						mysqli_close($link);
					?>
			