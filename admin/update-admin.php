<?php include('partials/menu.php'); ?>

<div class="main-content">
<div class="wrapper">
<h1>UPDATE Admin</h1>
<br> 

<?php 
    //1. get the id of admin to be updated
$id = $_GET['id'];
//2. create sql query to update admin
$sql = "SELECT * FROM tbl_admin WHERE id=$id";
//execute query
$res = mysqli_query($conn, $sql);
//check query executed or not
if($res==TRUE)
{
    $count = mysqli_num_rows($res);
    if($count==1)
    {
        $row=mysqli_fetch_assoc($res);

        $full_name = $row['full_name'];
        $username = $row['username'];
    }
    else
    {
        header('location:'.HOMEURL.'admin/manage-admin.php');
    }

}


//3. redirect to manange admin page with message.



?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                </tr>
                
                <tr>
                    <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="UPDATE ADMIN" class="btn-primary">
                </td>
                </tr>
            </table>
        </form>
</div>
</div>

<?php
    //check submit button clicked or not
    if(isset($_POST['submit']))
    {
        //get all values from form to update
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        //create sql query to update
        $sql = "UPDATE tbl_admin SET
        full_name = '$full_name',
        username = '$username'
        WHERE id ='$id'
        ";
    //execute query
    $res = mysqli_query($conn, $sql);
    //check query executed or not
    if($res==true)
    {
        $_SESSION['update']  = "<div class='success'>Admin Updated Successfully.</div>";
        //redirect to manage admin page
        header('location:'.HOMEURL.'admin/manage-admin.php');
    }
    else{
        $_SESSION['update']  = "<div class='error'>Unsuccessful.</div>";
        //redirect to manage admin page
        header('location:'.HOMEURL.'admin/manage-admin.php');
    }

    }

?>
<?php include('partials/footer.php'); ?>