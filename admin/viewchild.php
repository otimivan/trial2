<?php
	include("connect.php");
	session_start();
	if(isset($_SESSION['admin_login'])) {
		if($_SESSION['admin_login'] == true) {
			$query_selectChild = "SELECT * FROM child";
			$result_selectChild = mysqli_query($con,$query_selectChild);
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				if(isset($_POST['chkId'])) {
					$chkId = $_POST['chkId'];
					foreach($chkId as $id) {
						$query_deleteChild = "DELETE FROM child WHERE id='$id'";
						$result = mysqli_query($con,$query_deleteChild);
					}
					if(!$result) {
						echo "<script> alert(\"There was some problems deleting child\"); </script>";
						header('Refresh:0');
					}
					else {
						echo "<script> alert(\"childs Deleted Successfully\"); </script>";
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
	<title> View Child </title>
	<link rel="stylesheet" href="style.css" >
	<script language="JavaScript">
	function toggle(source) {
		checkboxes = document.getElementsByName('chkId[]');
		for(var i=0, n=checkboxes.length;i<n;i++) {
			checkboxes[i].checked = source.checked;
		}
	}
	</script>
	<link rel="stylesheet" href="../includes/main_style.css" >
</head>
<body>
<?php
		include("../includes/header.inc.php");
		include("../includes/nav_admin.inc.php");
		include("../includes/aside_admin.inc.php");
	?>
	<section>
		<h1>View Child</h1>
		<form action="" method="POST" class="form">
		<table class="table_displayData">
			<tr>
				<th> <input type="checkbox" onClick="toggle(this)" /> </th>
				<th>Sr. No.</th>
				<th>ID</th>
                <th>Name</th>
				<th>Sex</th>
				<th>Date Of Birth</th>
                <th>Parent ID</th>
                <th>Immunisation ID</th>
                <th>Status</th>
				
				<th> Edit </th>
			</tr>
			<?php $i=1; while($row_selectChild = mysqli_fetch_array($result_selectChild)) { ?>
			<tr>
				<td> <input type="checkbox" name="chkId[]" value="<?php echo $row_selectChild['id']; ?>" /> </td>
				<td> <?php echo $i; ?> </td>
				<td> <?php echo $row_selectChild['id']; ?> </td>
				<td> <?php echo $row_selectChild['name']; ?> </td>
				<td> <?php echo $row_selectChild['sex']; ?> </td>
				<td> <?php echo $row_selectChild['dob']; ?> </td>
                <td> <?php echo $row_selectChild['parentid']; ?> </td>
                <td> <?php echo $row_selectChild['immunisationid']; ?> </td>
                <td> <?php echo $row_selectChild['status']; ?> </td>
				<td> <a href="edit_child.php?id=<?php echo $row_selectChild['id']; ?>"><img src="../images/edit.png" alt="edit" /></a> </td>
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