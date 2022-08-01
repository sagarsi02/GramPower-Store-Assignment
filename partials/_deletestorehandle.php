<?php
    include '_dbconnect.php';
    // $sno = mysqli_real_escape_string($conn, $_GET['sno']);
    $sno = $_GET['sno'];
    $sql = "DELETE FROM `add_store` WHERE `add_store`.`store_sno` = $sno";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location: /grampower/home.php?delete=true");
    } else {
          header("location: /grampower/home.php?delete=FALSE");
      }



?>