<html>
<head>
	<title> IMMUNISATION REMINDER</title>
	<link rel="stylesheet" href="../includes/main_style.css" >
</head>
<body>
	<?php
		include("../includes/header.inc.php");
		include("../includes/aside_parent.inc.php");
	?>
<?php
 
 session_start();
 include("../includes/config.php");
 if(isset($_POST['edit']))
 {
    $id=$_SESSION['id'];
    $userName=$_POST['userName'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $select= "select * from parent where id='$id'";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['id'];
    if($res === $id)
    {
   
       $update = "update parent set userName='$userName',password='$password',phone='$phone',address='$address' where id='$id'";
       $sql2=mysqli_query($conn,$update);
if($sql2)
       { 
           /*Successful*/
           header('location:page.php');
       }
       else
       {
           /*sorry your profile is not update*/
           header('location:edit_profile.php');
       }
    }
    else
    {
        /*sorry your id is not match*/
        header('location:edit_profile.php');
    }
 }
?>
<?php
					include("../includes/footer.inc.php");
				?>