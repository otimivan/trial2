<?php
	$con = mysqli_connect("localhost","root","");
	mysqli_select_db($con,"Immunisation");
	if(!$con){
			die("Failed to connect");
			}

?>
<?php
define ("HOSTNAME","localhost");
define ("USERNAME","root");
define ("PASSWORD","");
define ("DATABASE","Immunisation");

$dbhandle=new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE) or die("unable to connect to database");

if($dbhandle->connect_error){
	die("connect Failed".$dbhandle->connect_error);
}
?>