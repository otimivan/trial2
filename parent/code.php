<?php
session_start();
$con = mysqli_connect("localhost","root","","immunisation");

if(isset($_POST['update_parent_data']))
{
    $id = $_POST['parent_id'];

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $district = $_POST['district'];
    $subcounty = $_POST['subcounty'];
    $county = $_POST['county'];
    $parish = $_POST['parish'];
    $village = $_POST['village'];
    $query = "UPDATE parent SET name='$name', gender='$gender', contact='$contact',address='$address',district='$district',subcounty='$subcounty' ,county='$county',parish='$parish',village='$village'WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Data Updated Successfully";
        header("Location: index.php");
    }
    else
    {
        $_SESSION['status'] = "Not Updated";
        header("Location: index.php");
    }
}

?>