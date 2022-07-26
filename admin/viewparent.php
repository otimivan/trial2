<?php
		include("../includes/header.inc.php");
		include("../includes/nav_admin.inc.php");
		include("../includes/aside_admin.inc.php");
	?>
<?php
	include("connect.php");
	session_start();
	if(isset($_SESSION['admin_login'])) {
		if($_SESSION['admin_login'] == true) {
			$query_selectParent = "SELECT * FROM Parent";
			$result_selectParent = mysqli_query($con,$query_selectParent);
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				if(isset($_POST['chkId'])) {
					$chkId = $_POST['chkId'];
					foreach($chkId as $id) {
						$query_deleteParent = "DELETE FROM Parent WHERE id='$id'";
						$result = mysqli_query($con,$query_deleteParent);
					}
					if(!$result) {
						echo "<script> alert(\"There was some problems deleting Parent\"); </script>";
						header('Refresh:0');
					}
					else {
						echo "<script> alert(\"Parents Deleted Successfully\"); </script>";
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
	<title> View Parent </title>
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
	
	<section>
		<h1>View Parent</h1>
		<form action="" method="POST" class="form">
		<table class="table_displayData">
			<tr>
				<th> <input type="checkbox" onClick="toggle(this)" /> </th>
				<th>Sr. No.</th>
				<th>ID</th>
                <th>Name</th>
				<th>Contact</th>
				<th>Gender</th>
                <th>Address</th>
				<th>Email</th>
				<th>Disctrict</th>
				
                
				
				<th> Edit </th>
			</tr>
			<?php $i=1; while($row_selectParent = mysqli_fetch_array($result_selectParent)) { ?>
			<tr>
				<td> <input type="checkbox" name="chkId[]" value="<?php echo $row_selectParent['id']; ?>" /> </td>
				<td> <?php echo $i; ?> </td>
				<td> <?php echo $row_selectParent['id']; ?> </td>
				<td> <?php echo $row_selectParent['name']; ?> </td>
				<td> <?php echo $row_selectParent['contact']; ?> </td>
				<td> <?php echo $row_selectParent['gender']; ?> </td>
                <td> <?php echo $row_selectParent['address']; ?> </td><br>
				<td> <?php echo $row_selectParent['email']; ?> </td>
                <td> <?php echo $row_selectParent['district']; ?> </td>
               
				


                
				<td> <a href="edit_Parent.php?id=<?php echo $row_selectParent['id']; ?>"><img src="../images/edit.png" alt="edit" /></a> </td>
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