<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br>
        <?php 
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>

<?php 
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>
        <br> 
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="title" placeholder="Category Title"></td>
                </tr>
                <tr>
                    <td>Select Image:</td>
                    <td><input type="file" name="image" placeholder="Category Title"></td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td><input type="radio" name="featured" value="Yes" >Yes
                    <input type="radio" name="featured" value="No" >No</td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td><input type="radio" name="active" value="Yes">Yes
                    <input type="radio" name="active" value="No" >No</td>
                </tr>
                <tr>
                    <td colspan="2">
                    <input type="submit" name="submit" value="ADD CATEGORY" class="btn-primary">
                </td>
                </tr>
            </table>
        </form>

        <?php
if(isset($_POST['submit']))
{
    //echo "Successful"
    //1. Get the data from form
    $title = $_POST['title'];
    if(isset($_POST['featured']))
    {
        $featured = $_POST['featured'];
    }
    else
    {
        $featured = "No";
    }

    if(isset($_POST['active']))
    {
        $active = $_POST['active'];
    }
    else
    {
        $active = "No";
    }
    //check img selected ornot and set value for img
    //print_r($_FILES['image']);
    //die();//break the code here
    if(isset($_FILES['image']['name']));
    {
        //upload image
        //to upload img we need image name, source path, destinatn
        $image_name = ($_FILES['image']['name']);

        //upload img only if img is selected
        if($image_name !="")
        {

       
        //auto rename img
        $ext = end(explode('.', $image_name));
        $image_name = "Item_Category_".rand(000, 999).'.'.$ext;

        $source_path = $_FILES['image']['tmp_name'];
        $destination_path = "../images/category/".$image_name;

        $upload = move_uploaded_file($source_path, $destination_path);

        if($upload==false)
        {
            $_SESSION['upload'] = "<div class='error>Failed to Upload Image.</div>";
            header('location:'.HOMEURL.'admin/add-category.php');
            die();
        }
    }
    }
    //else {
     //   $image_name="";
    //}
    

    //2. SQL Query to save the data into database
    $sql = "INSERT INTO tbl_category SET
        title='$title',
        image_name='$image_name',
        featured='$featured',
        active='$active'
    ";
    //3. executing Query and saving data into database    
        $res = mysqli_query($conn, $sql) ;//or die(mysqli_error());

    //4. check whether the data is inserted or not.
    if($res==TRUE)
    {
        //echo "Successful";
        $_SESSION['add']= "Successful";
        header("location:" .HOMEURL.'admin/manage-category.php');
    }
    else
    {
        //echo "Unsuccessful";
        $_SESSION['add']= "Unsuccessful";
        header("location:" .HOMEURL.'admin/manage-category.php');
    }
}


?>
        </div>
</div>



<?php include('partials/footer.php'); ?>