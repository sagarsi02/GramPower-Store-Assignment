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
    <title>GramPower -
        <?php echo $_SESSION['username'] ?>
    </title>
</head>

<body>
    <!-- Navbar -->
    <?php include 'partials/_navbar.php';?>
    <!-- Navbar End -->

    <!-- Shop List -->
    <div class="container">
        <div class="shop-list my-3">
            <div class="list-group list-group-flush">
                <?php
                include 'partials/_dbconnect.php';
                // Login Alert
                if (isset($_GET['login']) && ($_GET['login'] == "true")) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alrt-msg">
                    Login Successfully
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" id="alrt-close"></button>
                </div>';
                }
                // Login Alert End
                // Store Delete Alert
                if (isset($_GET['delete']) && ($_GET['delete'] == "true")) {
                    echo '<div class="alert alert-primary alert-dismissible fade show" role="alert" id="alrt-msg">
                    Store Delete Successfully
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" id="alrt-close"></button>
                </div>';
                }
                // Store Delete Alert End
                $storeAvailable = false;
                $sql2 = "SELECT * FROM `add_store`";
                $results = mysqli_query($conn, $sql2);
                while ($row = mysqli_fetch_assoc($results)) {
                    $storeAvailable = true;
                    $sno = $row['store_sno'];
                    $title = $row['store_name'];
                    $alias = $row['store_alias'];
                    echo '<li class="list-group-item list-group-item-action" id="shop-lists">
                                <i class="fa-solid fa-shop" id="store-icon"></i>
                                <a href="storedata/' . $alias . '" id="store-link">' . $title . '</a>
                                <a href="partials/_deletestorehandle.php?sno=' . $sno . '" type="delete-btn" id="delete-store-btn"><i class="fa-solid fa-delete-left" id="delete-store"></i></a>
                            </li>';
                }
                if(!$storeAvailable){
                    echo '<div class="alert alert-primary" role="alert">
                            Store is not available <a href="addStore.php" class="alert-link">Add New Store</a>
                        </div>';
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Shop List End -->
    <!-- Add Shop -->
    <a href="addStore.php" type="button" class="btn btn-sm" id="add-shop-btn">add new store</a>
    <!-- Add Shop End-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>