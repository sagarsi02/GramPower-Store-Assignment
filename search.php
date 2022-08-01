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
        <div class="text-center my-3 fs-5">Search for <em><b><?php echo $_GET['query'];?></b></em></h6>
        <div class="shop-list my-3">
           <div class="list-group list-group-flush">
           <!-- <li class="list-group-item list-group-item-action" id="shop-lists">
                <i class="fa-solid fa-shop" id="store-icon"></i>
                <a href="storedata" id="store-link">Title</a>
                <a href="#" type="delete-btn" id="delete-store-btn"><i class="fa-solid fa-delete-left" id="delete-store"></i></a>
            </li> -->
            <?php
                include 'partials/_dbconnect.php';
                $query = $_GET['query'];
                $search = false;
                $sql2 = "SELECT * FROM `add_store` WHERE MATCH (store_name) against('$query')";
                $results = mysqli_query($conn, $sql2);
                while ($row = mysqli_fetch_assoc($results)) {
                    $search = true;
                    $sno = $row['store_sno'];
                    $title = $row['store_name'];
                    $alias = $row['store_alias'];
                    echo '<li class="list-group-item list-group-item-action" id="shop-lists">
                                <i class="fa-solid fa-shop" id="store-icon"></i>
                                <a href="storedata/' . $alias . '" id="store-link">' . $title . '</a>
                                <a href="partials/_deletestorehandle.php?sno=' . $sno . '" type="delete-btn" id="delete-store-btn"><i class="fa-solid fa-delete-left" id="delete-store"></i></a>
                            </li>';
                }
                if(!$search){
                    echo '<div class="alert alert-primary" role="alert">
                    Not Found <a href="addStore.php" class="alert-link">Add New Store</a>.
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