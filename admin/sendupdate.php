
<!DOCTYPE html>
<html>
<head>
	<title> SEND UPDATES </title>
	<link rel="stylesheet" href="../includes/main_style.css" >
</head>

<body>
	<?php
		include("../includes/header.inc.php");
		include("../includes/nav_admin.inc.php");
		include("../includes/aside_admin.inc.php");
	?>
	
	<section>
		<h1>SEND UPDATES</h1>
		
	
			<form method = "POST" action = "">
			
						<h1>UPDATE</h1>
						<textarea name ="updates" rows="20" cols="50"></textarea>
						
					
				<table width = "600" border ="0" cellspacing ="1" cellpadding = "2">
					
					
					<tr>
						<td width = "250"></td>
						<td><input name ="add" type ="submit" color="white" value = "SEND UPDATES"></td>
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

$link = mysqli_connect("localhost", "root", "", "immunisation");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['updates'])){
 
// Escape user inputs for security
$updates = mysqli_real_escape_string($link, $_REQUEST['updates']);

 
// Attempt insert query execution

$sql = "INSERT INTO updates (updates) VALUES ('$updates')";
}

if(mysqli_query($link, $sql)){
    echo '<script type="text/javascript"> alert("SEND")</script>';
} else{
    echo '<script type="text/javascript"> alert(" You can not Send empty string")</script>';
}

 
// Close connection
mysqli_close($link);
?>


