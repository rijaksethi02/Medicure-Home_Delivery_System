<?php include('partials/menu.php'); ?>

<?php 
if(isset($_GET['id']))
{
    //1. get the id of admin to be updated
$id = $_GET['id'];
//2. create sql query to update admin
$sql2 = "SELECT * FROM tbl_item WHERE id=$id";
//execute query
$res2 = mysqli_query($conn, $sql2);

$row2 = mysqli_fetch_assoc($res2);

$title = $row2['title'];
$description = $row2['description'];
$price = $row2['price'];
$current_image = $row2['image_name'];
$current_category = $row2['category_id'];
$featured = $row2['featured'];
$active = $row2['active'];
}
    else
    {
        header('location:'.HOMEURL.'admin/manage-item.php');
    }

?>

<div class="main-content">
    <div class="wrapper">
        <h1>UPDATE Item</h1>
        <br>

        <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
        <tr>
                    <td>Title:</td>
                    <td><input type="text" name="title" value="<?php echo $title; ?>"></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><textarea name="description" cole="30" rows="5"><?php echo $description; ?></textarea></td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td><input type="number" name="price" value="<?php echo $price; ?>"></td>
                </tr>
                <tr>
                    <td> Current Image:</td>
                    <td>
                        <?php 
                            if($current_image == "")
                            {
                                echo  "<div class='error'>Image Not Available.</div>";
                            }
                            else
                            {
                                ?>
                                <img src="<?php echo HOMEURL; ?>images/item/<?php echo $current_image; ?>" width="125px">
                                <?php
                            }
                        ?>
                    </td>
                </tr>
             
                <tr>
                    <td> Category:</td>
                    <td><select name="category">
                    <?php 
                            //create php to displAY CATEGORIES
                            //sql query
                            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                            $res = mysqli_query($conn, $sql);

                            $count = mysqli_num_rows($res);

                            if($count>0)
                            {
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $category_id = $row['id'];
                                    $category_title = $row['title'];
                                    

                                    //echo "<option value='$category_id'>$category_title</option>";
                                    ?>
                                    <option <?php if($current_category==$category_id){echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                    <?php
                                    
                                }
                            }
                            else
                            {
                               
                                echo "<option value='0'>Category Not Found</option>";
                                
                            }
                        
                        
                        ?>
                        
                        </select>
                    </td>
                </tr>
                <tr>
                <td>Featured:</td>
                    <td><input <?php if($featured=="Yes") {echo "checked";}?> type="radio" name="featured" value="Yes">Yes
                    <input <?php if($featured=="No") {echo "checked";}?> type="radio" name="featured" value="No" >No</td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td><input <?php if($active=="Yes") {echo "checked";}?> type="radio" name="active" value="Yes">Yes
                    <input <?php if($active=="No") {echo "checked";}?> type="radio" name="active" value="No" >No</td>
                </tr>
               
                
                <tr>
                    <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                    <input type="submit" name="submit" value="UPDATE ITEM" class="btn-primary">
                </td>
                </tr>
            </table>
        
        </form>

        <?php 
        
            if(isset($_POST['submit']))
            {
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];


                $sql3 = "UPDATE tbl_item SET
                    title = '$title',
                    description = '$description',
                    price = $price,
                    
                    category_id = '$category',
                    featured = '$featured',
                    active = '$active'
                    WHERE id=$id
                    
                    ";

                    $res3 = mysqli_query($conn, $sql3);
                    if($res3==true)
                    {
                        $_SESSION['update'] = "<div class='success'>Item Updated Successfully.</div>";
                        header('loaction:'.HOMEURL.'admin/manage-item.php');
                    }
                    else
                    {
                        $_SESSION['update'] = "<div class='error'>Unsuccessful.</div>";
                        header('loaction:'.HOMEURL.'admin/manage-item.php');
                    }


            }
        
        
        ?>
    </div>
</div>

<?php include('partials/footer.php'); ?>