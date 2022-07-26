<?php
	include("connect.php");
	session_start();
	if(isset($_SESSION['admin_login'])) {
		if($_SESSION['admin_login'] == true) {
			$query_selectHospital = "SELECT * FROM hospital";
			$result_selectHospital = mysqli_query($con,$query_selectHospital);
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				if(isset($_POST['chkId'])) {
					$chkId = $_POST['chkId'];
					foreach($chkId as $id) {
						$query_deleteHospital = "DELETE FROM hospital WHERE id='$id'";
						$result = mysqli_query($con,$query_deleteHospital);
					}
					if(!$result) {
						echo "<script> alert(\"There was some problems deleting hospital\"); </script>";
						header('Refresh:0');
					}
					else {
						echo "<script> alert(\"hospitals Deleted Successfully\"); </script>";
						header('Refresh:0');
					}
				}
			}
		}
		else {
			header('Location:index.php');
		}
	}
	else {
		header('Location:index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title> View Hospital </title>
	<link rel="stylesheet" href="../includes/main_style.css" >

	<script language="JavaScript">
	function toggle(source) {
		checkboxes = document.getElementsByName('chkId[]');
		for(var i=0, n=checkboxes.length;i<n;i++) {
			checkboxes[i].checked = source.checked;
		}
	}
	</script>
</head>
<body>
<?php
		include("../includes/header.inc.php");
		include("../includes/nav_admin.inc.php");
		include("../includes/aside_admin.inc.php");
	?>
	<section>
		<h1>View Hospital</h1>
		<form action="" method="POST" class="form">
		<table class="table_displayData">
			<tr>
				<th> <input type="checkbox" onClick="toggle(this)" /> </th>
				<th>Sr. No.</th>
				<th>Name</th>
                <th>Username</th>
				<th>Email</th>
				<th>Password</th>
                <th>ID</th>
                <th>Date</th>
				
				<th> Edit </th>
			</tr>
			<?php $i=1; while($row_selectHospital = mysqli_fetch_array($result_selectHospital)) { ?>
			<tr>
				<td> <input type="checkbox" name="chkId[]" value="<?php echo $row_selectHospital['id']; ?>" /> </td>
				<td> <?php echo $i; ?> </td>
				<td> <?php echo $row_selectHospital['name']; ?> </td>
				<td> <?php echo $row_selectHospital['userName']; ?> </td>
				<td> <?php echo $row_selectHospital['email']; ?> </td>
				<td> <?php echo $row_selectHospital['password']; ?> </td>
                <td> <?php echo $row_selectHospital['id']; ?> </td>
                <td> <?php echo $row_selectHospital['dateCreated']; ?> </td>
				<td> <a href="edit_hospital.php?id=<?php echo $row_selectHospital['id']; ?>"><img src="../images/edit.png" alt="edit" /></a> </td>
			</tr>
			<?php $i++; } ?>
		</table>
		<input type="submit" value="Delete" class="submit_button"/>
		</form>
	</section>
	<?php
		include("../includes/footer.inc.php");
	?>
</body>
</html>