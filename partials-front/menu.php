<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicure Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body bgcolor="#f7f1e3">
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="<?php echo HOMEURL; ?>" title="Logo">
                    <img src="images/logo3.jpg" alt="Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo HOMEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo HOMEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo HOMEURL; ?>items.php">Products</a>
                    </li>
                    <li>
                        <a href="<?php echo HOMEURL; ?>about-us.php">About Us</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->