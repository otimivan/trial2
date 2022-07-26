<!-- PHP code to establish connection with the localserver -->
<?php
		include("../includes/header.inc.php");
		//include("../includes/nav_parent.inc.php");
		include("../includes/aside_parent.inc.php");
	?>
<?php
 
// Username is root
$user = 'root';
$password = '';
 
// Database name is geeksforgeeks
$database = 'immunisation';
 
// Server is localhost with
// port number 3306
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user,
                $password, $database);
 
// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
 
// SQL query to select data from database
$sql = " SELECT * FROM messages ORDER BY id DESC ";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="css/bootstrap.min.css">

<link rel="stylesheet" href="../includes/main_style.css" >
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Immunization Reminder</title>
</head>
 
<body>
    <section>
        <h1>immunisation message ready here</h1>
        <!-- TABLE CONSTRUCTION -->
        <form action="" method="POST">
            <table>
                
                <textarea width ="40%">
                <?php echo $_SESSION['message']; ?>
	
                </textarea>
            </table>
                
            
                    
                    
                    		
        </form>

    </section>
</body>

<?php
		include("../includes/footer.inc.php");
	?>

 
</html>