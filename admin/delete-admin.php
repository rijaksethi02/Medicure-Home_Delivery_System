<?php 

//include constants.php
include('../config/constants.php');

//1. get the id of admin to be deleted
$id = $_GET['id'];
//2. create sql query to delete admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";
//execute query
$res = mysqli_query($conn, $sql);

//check query executed or not
if($res==TRUE)
{
    $_SESSION['delete'] = "<div class='success'>ADMIN Deleted Successfully</div>";
    header('location:'.HOMEURL.'admin/manage-admin.php');
}
else
{
    $_SESSION['delete'] = "<div class='error'>Unsuccessful</div>";
    header('location:'.HOMEURL.'admin/manage-admin.php');
}

//3. redirect to manange admin page with message.


?>