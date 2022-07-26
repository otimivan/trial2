<?php
	include("../includes/config.php");
	session_start();
	if(isset($_SESSION['parent_login'])) {
		if($_SESSION['parent_login'] == true) {
			$id = $_SESSION['id'];
			$query_selectParent = "SELECT * FROM parent WHERE id='$id'";
			$result_selectParent = mysqli_query($con,$query_selectParent);
			$row_selectParent = mysqli_fetch_array($result_selectParent);
			
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
	<title> Parent: Home </title>
	<link rel="stylesheet" href="../includes/main_style.css" >
</head>
<body>
	<?php
		include("../includes/header.inc.php");
		//include("../includes/nav_parent.inc.php");
		include("../includes/aside_parent.inc.php");
	?>
	<section>
		Welcome <?php echo $_SESSION['userName']; ?>
		<p> 
			Thanks, for taking this step, You surely knows the important of <strong> IMMUNISATION</strong> which includes:
				<br><ul>
					<li> Strengthens the child immune System</li>
					<li> Helps in good Development and Growth of the Child</li>
					<li> Strengthening The Bones and Joints</li>
					<li> Energy giving</li>
					<li> etc.</li>
				</ul>
		</p>
		<article>
			<h2>My Profile</h2>
			<table >
			<tr>
				<th>UserName</th>
            <th>Password</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Address</th>
				<th> Edit </th>
			</tr>
			<tr>
				<td> <?php echo $row_selectParent['userName']; ?> </td>
				<td> <?php echo $row_selectParent['password']; ?> </td>
				<td> <?php echo $row_selectParent['email']; ?> </td>
				<td> <?php echo $row_selectParent['contact']; ?> </td>
            <td> <?php echo $row_selectParent['address']; ?> </td>
				<td> <a href="edit_profile.php"><img src="../images/edit.png" alt="edit" /></a> </td>
			</tr>
		</table>
		</article>
	</section>
	<?php
		include("../includes/footer.inc.php");
	?>
</body>
</html>