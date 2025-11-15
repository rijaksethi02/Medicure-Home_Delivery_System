<?php include('partials/menu.php') ?>  

 <div class="main-content">
 <div class="wrapper">
     <h1>ADMIN</h1>
    <br>
     <?php 
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

        if(isset($_SESSION['user-not-found']))
        {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
        }

        if(isset($_SESSION['pwd-found']))
        {
            echo $_SESSION['pwd-found'];
            unset($_SESSION['pwd-found']);
        }

        if(isset($_SESSION['pwd-not-match']))
        {
            echo $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']);
        }

        if(isset($_SESSION['change-pwd']))
        {
            echo $_SESSION['change-pwd'];
            unset($_SESSION['change-pwd']);
        }

        ?>
        <br><br>
    <table class="tbl-full">
    <tr>
    <th>S.No</th>
    <th>Name</th>    
    <th>Username</th>
    <th>Actions</th>
    </tr>

        <?php 
            //Query to get all admin
            $sql = "SELECT * FROM tbl_admin";
            //execute the query
            $res = mysqli_query($conn, $sql);
            //check whether the query is executed or not
            if($res==TRUE)
            {
                //count rows to check whether we have data in database or not
                $count = mysqli_num_rows($res);

                $sn=1;  //create a variable and assign value
                //check the num of rows
                if($count>0)
                {
                    //we have data in database
                    while($rows=mysqli_fetch_assoc($res))
                    {
                        //while loop to get all the data

                        //get individual data
                        $id=$rows['id'];
                        $full_name=$rows['full_name'];
                        $username=$rows['username'];
                        ?>

                         <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td>
                                <a href="<?php echo HOMEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change PASSWORD</a>
                                <a href="<?php echo HOMEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">UPDATE</a>
                                <a href="<?php echo HOMEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-tertiary">DELETE</a></td>
                            </tr>

                        <?php



                    }
                }
                else{

                }
            }
            
            
            
            
            
            ?>

   
    </table>
    <br><br><br><a href="add-admin.php" class="btn-primary">ADD ADMIN</a>
 </div>
 </div>  

 <?php include('partials/footer.php') ?>