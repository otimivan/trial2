<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="../includes/main_style.css" >

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Immunization Reminder</title>
</head>
<?php
		include("../includes/header.inc.php");
		
		include("../includes/aside_parent.inc.php");
	?>

<body>	
			
				
				<section>
				
						



								
								<form action="Profile_update.php" method="post">
								<table width = "600" border ="0" cellspacing ="1" cellpadding = "2">
							<h1>Edit your Profile</h1>
									<tr>
										<td width="250">Username</td>
										<td><input required name = "userName" type = "text" ></td>
									</tr>
									<tr>
										<td width="250">Phone</td>
										<td><input required name = "contact" type = "text" ></td>
									</tr>
									<tr>
										<td width="250">Address</td>
										<td><input  required name = "address" type = "text" ></td>
									</tr>
									
									<tr>
										<td width="250">Password</td>
										<td><input required name = "village" type = "pasword" ></td>
									</tr>
									
									<tr>
										<td width = "250"></td>
										<td></td>
									</tr>
									<tr>
										<td width = "250"></td>
										<td><input name ="add" type ="submit" id="add" value = "EDIT PROFILE"></td>
									</tr>

								</table>

								</form>
							</section>
                            </body>
				<?php
					include("../includes/footer.inc.php");
				?>
</html>
