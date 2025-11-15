<?php include('partials-front/menu.php'); ?>

    <!-- SEARCH Section Starts Here -->
    <section class="item-search text-center">
        <div class="container">
            
            <form action="<?php echo HOMEURL; ?>item-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Products.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- SEARCH Section Ends Here -->

    <?php
    if(isset($_SESSION['order']))
    {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
    ?>

    <!-- Categories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Categories</h2>

            <?php 
            $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 6";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>
                        <a href="<?php echo HOMEURL; ?>category-items.php?category_id=<?php echo $id; ?>">
                        <div class="box-3 float-container">
                        <?php 
                            if($image_name=="")
                            {
                                echo "<div class='error'>Image Not Available</div>";
                            }
                            else
                            {
                                ?>
                                <img src="<?php echo HOMEURL; ?>images/category/<?php echo $image_name; ?>" class="img-responsive img-curve">
                                <?php
                            }
                        
                        ?>
                        

                        <h3 class="float-text text-color"><?php echo $title; ?></h3>
                        </div>
                        </a>
                    <?php
                }
            }
            else
            {
                echo "<div class='error'>Category not added.</div>";
            }
            
            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- Menu Section Starts Here -->
    <section class="item-menu">
        <div class="container">
            <h2 class="text-center">Products</h2>

            <?php 
            $sql2 = "SELECT * FROM tbl_item WHERE active='Yes' AND featured='Yes' LIMIT 6";

            $res2 = mysqli_query($conn, $sql2);

            $count2 = mysqli_num_rows($res2);

            if($count2>0)
            {
                while($row=mysqli_fetch_assoc($res2))
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
                                <img src="<?php echo HOMEURL; ?>images/item/<?php echo $image_name; ?>" class="img-responsive img-curve">
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

                    
                        

                        <!--<h3 class="float-text text-color"><?php echo $title; ?></h3>-->
                        <!--</div>
                        </a>-->
                    <?php
                }
            }
            else
            {
                echo "<div class='error'>Item Not Available.</div>";
            }
            
            ?>

 


            <div class="clearfix"></div>

            

        </div>
    </section>
    <!-- Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>