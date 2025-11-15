<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br>
        <?php 
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>
        <br> 
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="Enter Username"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="Password" placeholder="Enter Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                    <input type="submit" name="submit" value="ADD ADMIN" class="btn-primary">
                </td>
                </tr>
            </table>
        </form>
        </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
if(isset($_POST['submit']))
{
    //echo "Successful"
    //1. Get the data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['Password']);
    //2. SQL Query to save the data into database
    $sql = "INSERT INTO tbl_admin SET
        full_name='$full_name',
        username='$username',
        password='$password'
    ";
    //3. executing Query and saving data into database    
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

    //4. check whether the data is inserted or not.
    if($res==TRUE)
    {
        //echo "Successful";
        $_SESSION['add']= "Successful";
        header("location:" .HOMEURL.'admin/manage-admin.php');
    }
    else
    {
        //echo "Unsuccessful";
        $_SESSION['add']= "Unsuccessful";
        header("location:" .HOMEURL.'admin/manage-admin.php');
    }
}


?>