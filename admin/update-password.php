<?php include('partials/menu.php'); ?>


<div class="main-content">
<div class="wrapper">
<h1>Change PASSWORD</h1>
<br> 

<?php 
  if(isset($_GET['id']))
  {
      $id=$_GET['id'];
  }



?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Old Password:</td>
                    <td><input type="password" name="old_password" placeholder="Old Password"></td>
                </tr>
                <tr>
                    <td>New Password:</td>
                    <td><input type="password" name="new_password" placeholder="New Password"></td>
                </tr>

                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" name="confirm_password" placeholder="Confirm Password"></td>
                </tr>
                
                <tr>
                    <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="Change PASSWORD" class="btn-primary">
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
        $old_password = md5($_POST['old_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);
        //create sql query to update
        $sql = "SELECT * FROM tbl_admin WHERE id = $id AND PASSWORD= '$old_password'";
    //execute query
    $res = mysqli_query($conn, $sql);
    //check query executed or not
    if($res==true)
    {
        $count=mysqli_num_rows($res);

        if($count==1)
        {
        if($new_password==$confirm_password)
        {
            
        $sql2 = "UPDATE tbl_admin SET
        password='$new_password'
        WHERE id=$id ";

        $res2 = mysqli_query($conn, $sql2);

        if($res2==true)
        {
            $_SESSION['change-pwd']  = "<div class='success'>Password Changed Successfully.</div>";
            header('location:'.HOMEURL.'admin/manage-admin.php');
        }
        else
        {
            $_SESSION['pwd-not-match']  = "<div class='error'>Failed.</div>";
            header('location:'.HOMEURL.'admin/manage-admin.php');
        }
        
        }
        else{
            $_SESSION['pwd-not-found']  = "<div class='error'>Password did not match.</div>";
            //redirect to manage admin page
            header('location:'.HOMEURL.'admin/manage-admin.php'); 
        }
    }
    else{
        $_SESSION['user-not-found']  = "<div class='error'>User Not Found.</div>";
        //redirect to manage admin page
        header('location:'.HOMEURL.'admin/manage-admin.php');
    }
}

    }

?>
<?php include('partials/footer.php'); ?>