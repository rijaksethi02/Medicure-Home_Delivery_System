<?php include('../config/constants.php'); ?>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="../css/admin.css">
</head>

<body bgcolor="#ffcccc">

    <div class="login">
    <h1 class="text-center">Login</h1>

    <?php
    if(isset($_SESSION['login']))
    {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
    if(isset($_SESSION['no-login-message']))
    {
        echo $_SESSION['no-login-message'];
        unset($_SESSION['no-login-message']);
    }
    
    ?>
    <br>
    <form action="" method="POST" class="text-center">
    <br>Username:<br>
    <input type="text" name="username" placeholder="Enter Username"><br><br>
    Password:<br>
    <input type="password" name="password" placeholder="Enter Password"><br><br>
    
    <input type="submit" name="submit" value="Login" class="btn-primary">
    </form>
    </div>
</body>
</html>

<?php
    //check submit button clicked or not
    if(isset($_POST['submit']))
    {
        //get all values from form to update
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        //create sql query to update
        $sql = "SELECT * FROM tbl_admin WHERE username= '$username' AND PASSWORD = '$password'";
    //execute query
    $res = mysqli_query($conn, $sql);
    //check query executed or not
    $count = mysqli_num_rows($res);

    if($count==1)
    {
        $_SESSION['login']  = "<div class='success'>Login Successful.</div>";

        $_SESSION['user'] = $username; //to check user login or logout


        //redirect to manage admin page
        header('location:'.HOMEURL.'admin/');
    }
    else
    {
        $_SESSION['login']  = "<div class='error text-center'>Login Unsuccessful.</div>";
        //redirect to login page
        header('location:'.HOMEURL.'admin/login.php');
    }
    
    

    }

?>