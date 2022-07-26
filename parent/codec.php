<?php
session_start();
$con = mysqli_connect("localhost","root","","immunisation");

if(isset($_POST['update_child_data']))
{
    $name = $_POST['name'];
    $sex = $_POST['sex']; 
    $query = "UPDATE child SET name='$name', sex='$sex' WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Data Updated Successfully";
        header("Location: indexc.php");
    }
    else
    {
        $_SESSION['status'] = "Not Updated";
        header("Location: indexc.php");
    }
}

?>