<?php
// Chech if Session start then anyone not access Login or signup
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header("location: home.php");
}
$showError = false;
$login = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];

    // $sql = "Select * from users where username='$username' AND password='$password'";
    $sql = "Select * from users where username='$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: home.php?login=true");
            } else {
                $showError = "Invelid Credentials";
                header("location: login.php?login=false");
            }
        }
    } else {
        $showError = "Invelid Credentials";
        header("location: login.php?login=false");
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

    <title>Login</title>
</head>

<body>

    <!-- section  -->
    <div class="sign-log-sec bg-dark">
        <form action="/grampower/login.php" id="log-sign" method="POST">
            <?php
                if (isset($_GET['signup']) && ($_GET['signup']=="true")) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alrt-msg">
                        Account Created Successfully
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" id="alrt-close"></button>
                    </div>';
            }
                if (isset($_GET['login']) && ($_GET['login']=="false")) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="alrt-msg">
                        Invalid Credentials
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" id="alrt-close"></button>
                    </div>';
            }
                if (isset($_GET['logout']) && ($_GET['logout']=="true")) {
                    echo '<div class="alert alert-primary alert-dismissible fade show" role="alert" id="alrt-msg">
                        Logout Successfully
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" id="alrt-close"></button>
                    </div>';
            }
            ?>
            <h4 class="text-center">Login</h4>
            <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" aria-describedby="emailHelp">
            </div>
            <p>Create a new account <a href="index.php">Click here</a></p>
            <button type="submit" class="btn btn-primary">Login</button>
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