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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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

    <!-- Add Store -->
    <div class="register">
        <div class="row m-0">
            <!-- Store Added Alert -->
            <?php
            if (isset($_GET['storeAdded']) && ($_GET['storeAdded'] == "true")) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alrt-msg">
                        Store Added Successfully
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" id="alrt-close"></button>
                    </div>';
            }
            if (isset($_GET['storeAdded']) && ($_GET['storeAdded'] == "false")) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="alrt-msg">
                        Store not Added Successfully
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" id="alrt-close"></button>
                    </div>';
            }
            ?>
            <!-- Store Added Alert End -->
            <div class="col-md-3 register-left m-auto align-items-center">
                <img src="img/gp-logo.svg" alt="" />
                <h3>Welcome</h3>
                <p>Connect with GramPower Store</p>

            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Add New Store</h3>
                        <form class="row register-form" action="partials/_addstorehandle.php" method="POST">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Store Name *" name="store-name" required />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="About *" name="about" required />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Product Categoty 1 *" name="cat-1" required />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Product Categoty 2 *" name="cat-2" required />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Product Categoty 3 *" name="cat-3" required />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Address *" name="address" required />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Store Url *" name="store-url" required />
                                    <p class="url-sug fw-lighter">Enter the title of the store for ease of use.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Open From in Am*" name="open-from" required />
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Open To in Pm *" name="open-to" required />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Cover Image Link *" name="cover-img" required />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Image Gallery Link 1 *" name="img-gal-1" required />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Image Gallery Link 2 *" name="img-gal-2" required />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Image Gallery Link 3 *" name="img-gal-3" required />
                                </div>
                                <div class="reg-back">
                                    <input type="submit" class="btnRegister" value="Register" />
                                    <a href="home.php" class="btnBack" type="button" name=""><i class="fa-solid fa-circle-arrow-left mx-2"></i>Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Add Store End -->


    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>