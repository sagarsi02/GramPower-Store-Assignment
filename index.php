<?php
// Chech if Session start then anyone not access Login or signup
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header("location: home.php");
}
$showError = false;
$showAlert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // $exists=false;

    //Check whether this username Exists
    $existSql = "SELECT * FROM `users` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0) {
        // $exists = true;
        $showError = "Username is Already Exists";
    } else {
        // $exists = false;
        if (($password == $cpassword)) {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
                header("location: login.php?signup=true");
            }
        } else {
            $showError = "Passwords do not match";
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>SignUp</title>
</head>

<body>

    <!-- section  -->
    <div class="sign-log-sec bg-dark">
        <form method="POST" id="log-sign">
            <!-- Alert -->
            <?php
            if ($showAlert) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Account Created Successfully
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            if ($showError) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    ' . $showError . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            ?>
            <!-- Alert End -->
            <h4 class="text-center">SignUp</h4>
            <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input type="text" maxlength="13" class="form-control" name="username" id="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" maxlength="15" class="form-control" name="password" id="password" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Password</label>
                <input type="password" maxlength="15" class="form-control" name="cpassword" id="cpassword" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Make sure to type the same password</div>
            </div>
            <p>Already have an account <a href="login.php">Click here</a></p>
            <button type="submit" class="btn btn-primary">signUp</button>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
        -->
</body>

</html>