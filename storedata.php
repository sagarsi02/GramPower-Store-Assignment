<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Css Link -->
    <link rel="stylesheet" href="/grampower/css/style.css">
    <link rel="stylesheet" href="/grampower/css/responsive.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <title>GramPower -
        <?php echo $_SESSION['username'] ?>
    </title>
</head>

<body>
    <!-- Navbar -->
    <?PHP
        include 'partials/_dbconnect.php';
        include 'partials/_navbar.php';
    ?>
    <!-- Navbar End -->
    <?php
    include 'partials/_dbconnect.php';
    $alias = mysqli_real_escape_string($conn, $_GET['alias']);
    $sql = "SELECT * FROM `add_store` WHERE store_alias='$alias'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $store_sno = $row['store_sno'];
        $storeName = $row['store_name'];
        $store_about = $row['store_about'];
        $cat_1 = $row['cat_1'];
        $cat_2 = $row['cat_2'];
        $cat_3 = $row['cat_3'];
        $address = $row['address'];
        $hour_from = $row['hour_from'];
        $hour_to = $row['hour_to'];
        $cover_img = $row['cover_img'];
        $img_link1 = $row['img_link1'];
        $img_link2 = $row['img_link2'];
        $img_link3 = $row['img_link3'];
    }
    ?>
    <div class="container">
        <h3 class="text-center my-2"><?php echo $storeName; ?></h3>
        <div class="store-details">
            <div class="cover-img">
                <img src="<?php echo $cover_img; ?>" id="cover-img" alt="Cover Image">
            </div>
            <div class="store-data">
                <div class="photo-gal-about-range">
                    <div class="img-gallery">
                        <h6 class="text-center">Photo Gallery</h6>
                        <div class="store-img-gal">
                            <img src="<?php echo $img_link1; ?>" id="img-gal" alt="Gallery 1">
                            <img src="<?php echo $img_link2; ?>" id="img-gal" alt="Gallery 2">
                            <img src="<?php echo $img_link3; ?>" id="img-gal" alt="Gallery 3">
                        </div>
                    </div>
                    <div class="shop-about">
                        <h6 class="text-center">About Us</h6>
                        <p class="shop-desc"><?php echo $store_about; ?></p>
                    </div>
                    <div class="prod-range">
                        <h6 class="text-center">Product Range</h6>
                        <p class="prod-category">Product Category</p>
                        <ul class="cat-ul">
                            <li class="cat-li"><?php echo $cat_1; ?></li>
                            <li class="cat-li"><?php echo $cat_2; ?></li>
                            <li class="cat-li"><?php echo $cat_3; ?></li>
                        </ul>
                    </div>
                </div>
                <div class="hour-location">
                    <div class="store-hour">
                        <h6 class="text-center">Store Hours</h6>
                        <ul class="hour-ul">
                            <li class="hour-li">Sunday: Closed</li>
                            <li class="hour-li">Monday: <?php echo $hour_from; ?>:00 Am To <?php echo $hour_to; ?>:00 Pm</li>
                            <li class="hour-li">Tuesday: <?php echo $hour_from; ?>:00 Am To <?php echo $hour_to; ?>:00 Pm</li>
                            <li class="hour-li">Wednesday: <?php echo $hour_from; ?>:00 Am To <?php echo $hour_to; ?>:00 Pm</li>
                            <li class="hour-li">Thrusday: <?php echo $hour_from; ?>:00 Am To <?php echo $hour_to; ?>:00 Pm</li>
                            <li class="hour-li">Friday: <?php echo $hour_from; ?>:00 Am To <?php echo $hour_to; ?>:00 Pm</li>
                            <li class="hour-li">Saturday: <?php echo $hour_from; ?>:00 Am To <?php echo $hour_to; ?>:00 Pm</li>
                        </ul>
                    </div>
                    <div class="store-location">
                        <h6 class="text-center">Store Location</h6>
                        <p class="store-add"><?php echo $address; ?></p>
                        <div class="iframe">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29344.91848385313!2d77.39974481843952!3d23.166009432342292!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x397c437b201d6d77%3A0x77ea77474fa43bc4!2sKolar%20Rd%2C%20Bhopal%2C%20Madhya%20Pradesh!5e0!3m2!1sen!2sin!4v1659285479125!5m2!1sen!2sin" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Shop Data List -->

    <!-- Shop Data List End -->
    <!-- Add Shop -->
    <a href="/grampower/addStore.php" type="button" class="btn btn-sm" id="add-shop-btn">add new store</a>
    <!-- Add Shop End-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>