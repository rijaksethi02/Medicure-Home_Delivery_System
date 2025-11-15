<?php
include('../config/constants.php');

if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    //get the value and delete
    $id= $_GET['id'];
    $image_name = $_GET['image_name'];

    //remove physical img file is available
    if($image_name != "")
    {
        //img available. so remove it
        $path = "../images/item/".$image_name;
        //remove the image
        $remove = unlink($path);

        //if failed to remove img thenadd error mesage and stop process
        if($remove==false)
        {
            //set session messae
            $_SESSION['upload'] = "<div class='error'>Failed to remove  image.</div>";
            //redirect
            header('location:'.HOMEURL.'admin/manage-item.php');
            //stop process
            die();
        }
    }
  //delete data from database
  $sql = "DELETE FROM tbl_item WHERE id=$id";

  //execute the query
  $res = mysqli_query($conn, $sql);

  //check data deleted or not
  if($res==true)
  {
      $_SESSION['delete'] = "<div class='success'>Item Deleted</div>";
      header('location:'.HOMEURL.'admin/manage-item.php');
  }
  else 
  {
      $_SESSION['delete'] = "<div class='error'>Unsuccessful</div>";
      header('location:'.HOMEURL.'admin/manage-item.php');
  }
}
else 
{
    $_SESSION['unauthorize'] = "<div class='error'>Unsuccessful</div>";
                header('location:'.HOMEURL.'admin/manage-item.php');
}
?>