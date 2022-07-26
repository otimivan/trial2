<?php
	include("../includes/config.php");
	session_start();
	if(isset($_SESSION['admin_login'])) {
		if($_SESSION['admin_login'] == true) {
			//select last 5 Parent
			$query_selectParent = "SELECT * FROM parent  ORDER BY id DESC LIMIT 5";
			$result_selectParent = mysqli_query($con,$query_selectParent);
			//select last 5 Hospitals
			$query_selectHospital = "SELECT * FROM Hospital ORDER BY id DESC LIMIT 5";
			$result_selectHospital = mysqli_query($con,$query_selectHospital);
			//select last 5 child
			$query_selectChild = "SELECT * FROM child  ORDER BY id DESC LIMIT 5";
			$result_selectChild = mysqli_query($con,$query_selectChild);
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
	<title> Admin: Home </title>
	<link rel="stylesheet" href="../includes/main_style.css" >
</head>
<body>
	<?php
		include("../includes/header.inc.php");
		include("../includes/nav_admin.inc.php");
		include("../includes/aside_admin.inc.php");
	?>
	<section>
		<h1>Welcome Admin</h1>
		<article>
			<h2>Recently Added Parent</h2>
			<table class="table_displayData">
				<tr>
					<th>Sr. No.</th>
					<th>ID</th>
					<th>Name</th>
					<th>Phone</th>
					<th>Gender</th>
					<th>Address</th>
					<!--<th>Email</th>
					<th>District</th>
					<th>SubCounty</th>
					<th>County</th>
					<th>Parish</th>
					<th>Village</th>-->
					<th>Password</th>
					<th>Date</th>
					<th>Username</th>
					
					
				
					
				</tr>
				<?php $i=1; while($row_selectParent = mysqli_fetch_array($result_selectParent)) { ?>
				<tr>
					<td> <?php echo $i; ?> </td>
					<td> <?php echo $row_selectParent['id']; ?> </td>
					<td> <?php echo $row_selectParent['name']; ?> </td>
					<td> <?php echo $row_selectParent['contact']; ?> </td>
					<td> <?php echo $row_selectParent['gender']; ?> </td>
					<td> <?php echo $row_selectParent['address']; ?> </td>
					<!--<td> <//?php echo $row_selectParent['email']; ?> </td>
					<td> <//?php echo $row_selectParent['district']; ?> </td>
					<td> <//?php echo $row_selectParent['subcounty']; ?> </td>
					<td> <//?php echo $row_selectParent['county']; ?> </td>
					<td> <//?php echo $row_selectParent['parish']; ?> </td>
					<td> <//?php echo $row_selectParent['village']; ?> </td>-->
					<td> <?php echo $row_selectParent['password']; ?> </td>
					<td> <?php echo $row_selectParent['dateCreated']; ?> </td>
					<td> <?php echo $row_selectParent['userName']; ?> </td>
					
				</tr>
				<?php $i++; } ?>
			</table>
		</article>
		
		<article>
			<h2>Recently Added Hospitals</h2>
			<table class="table_displayData">
			<tr>
				<th> S/N</th>
				<th> Name</th>
				<th> UserName </th>
				<th> Email </th>
				<th> Password </th>
				<th> ID </th>
				<th> Date</th>
			</tr>
			<?php $i=1; while($row_selectHospital = mysqli_fetch_array($result_selectHospital)) { ?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td> <?php echo $row_selectHospital['name']; ?> </td>
				<td> <?php echo $row_selectHospital['userName']; ?> </td>
				<td> <?php echo $row_selectHospital['email']; ?> </td>
				<td> <?php echo $row_selectHospital['password']; ?> </td>
				<td> <?php echo $row_selectHospital['id']; ?> </td>
				<td> <?php echo $row_selectHospital['dateCreated']; ?> </td>
				
			</tr>
			<?php $i++; } ?>
		</table>
		</article>
		
		<article>
			<h2>Recently Added Child</h2>
			<table class="table_displayData">
			<tr>
				<th> S/N</th>
				<th> ID</th>
				<th> Name </th>
				<th> Sex </th>
				<th> DOB </th>
				<th> Parent ID </th>
				<th> Immunisation ID </th>
				<th> Status</th>
			</tr>
			<?php $i=1; while($row_selectChild = mysqli_fetch_array($result_selectChild)) { ?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td> <?php echo $row_selectChild['id']; ?> </td>
				<td> <?php echo $row_selectChild['name']; ?> </td>
				<td> <?php echo $row_selectChild['sex']; ?> </td>
				<td> <?php echo $row_selectChild['dob']; ?> </td>
				<td> <?php echo $row_selectChild['parentid']; ?> </td>
				<td> <?php echo $row_selectChild['immunisationid']; ?> </td>
				<td> <?php echo $row_selectChild['status']; ?> </td>
				
			</tr>
			<?php $i++; } ?>
		</table>
		</article>
	</section>
	<?php
		include("../includes/footer.inc.php");
	?>
</body>
</html>