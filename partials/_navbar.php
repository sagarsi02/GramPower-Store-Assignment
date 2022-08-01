<?php
include '_dbconnect.php';
?>
    <nav class="navbar" id="navigation" style="background-color: #39007d;">
        <div class="container">
            <a class="navbar-brand d-flex" href="/grampower/home.php">
                <i class="fa-solid fa-house text-light fs-3"></i>
                <h3 class="text-light mx-4 my-0 fs-4 logo-tit">Gram Power | Strore</h3>
            </a>
            <div class="search-form d-flex">
                <form class="d-flex" role="search" id="search-handle" action="/grampower/search.php" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Search" name="query" id="search" aria-label="Search">
                    <button class="btn" type="submit" id="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <div class="dropdown mx-4">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="user-drop" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user"></i>
                    </button>
                    <a class="btn btn-secondary dropdown-toggle" type="button" id="user-menu-drop" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">
                                <?php echo $_SESSION['username'] ?>
                            </a></li>
                        <li><a class="dropdown-item" href="/grampower/partials/_logouthandle.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>