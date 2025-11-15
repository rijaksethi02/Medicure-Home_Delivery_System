<?php include('partials-front/menu.php'); ?>

    <!-- SEARCH Section Starts Here -->
    <section class="item-search text-center">
        <div class="container">
        <?php 
        
        $search = $_POST['search'];
        
        ?>
            
            <h2>Products on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- SEARCH Section Ends Here -->



    <!-- Menu Section Starts Here -->
    <section class="item-menu">
        <div class="container">
            <h2 class="text-center">Products</h2>

            <?php 

           

            $sql = "SELECT * FROM tbl_item WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>
                        
                    <div class="item-menu-box">
                    <div class="item-menu-img">
                    <?php 
                            if($image_name=="")
                            {
                                echo "<div class='error'>Image Not Available</div>";
                            }
                            else
                            {
                                ?>
                                <img src="<?php echo HOMEURL; ?>images/item/<?php echo $image_name; ?>"  class="img-responsive img-curve">
                                <?php
                            }
                        
                        ?>
                        
                    
                    </div>

                    <div class="item-menu-desc">
                    <h4><?php echo $title; ?></h4>
                    <p class="item-price">₹<?php echo $price; ?></p>
                    <p class="item-detail">
                    <?php echo $description; ?>
                    </p>
                    <br>

                    <a href="<?php echo HOMEURL; ?>order.php?item_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                    </div>
                    </div>
                        

                        <!--<h3 class="float-text text-white"><?php echo $title; ?></h3>
                        </div>
                        </a>-->
                    <?php
                }
            }
            else
            {
                echo "<div class='error'>Item Not Found..</div>";
            }
            
            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>