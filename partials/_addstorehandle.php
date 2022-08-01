<?php

    $showError = false;
    $showAlert = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include '_dbconnect.php';
        $storeName = $_POST["store-name"];
        $storeAbout = $_POST["about"];
        $p_cat1 = $_POST["cat-1"];
        $p_cat2 = $_POST["cat-2"];
        $p_cat3 = $_POST["cat-3"];
        $address = $_POST["address"];
        $alias = $_POST["store-url"];
        $open_from = $_POST["open-from"];
        $open_to = $_POST["open-to"];
        $coverImg = $_POST["cover-img"];
        $imgGal1 = $_POST["img-gal-1"];
        $imgGal2 = $_POST["img-gal-2"];
        $imgGal3 = $_POST["img-gal-3"];

        $sql= "INSERT INTO `add_store` (`store_name`, `store_about`, `cat_1`, `cat_2`, `cat_3`, `address`, `store_alias`, `hour_from`, `hour_to`, `cover_img`, `img_link1`, `img_link2`, `img_link3`) VALUES ('$storeName', '$storeAbout', '$p_cat1', '$p_cat2', '$p_cat3', '$address', '$alias', '$open_from', '$open_to', '$coverImg', '$imgGal1', '$imgGal2', '$imgGal3')";
        $result = mysqli_query($conn, $sql);
        if($result){
            $showAlert = true;
            header("location: /grampower/addStore.php?storeAdded=true");
        }else{
            $showError = false;
            header("location: /grampower/addStore.php?storeAdded=false");

        }
    }

?>