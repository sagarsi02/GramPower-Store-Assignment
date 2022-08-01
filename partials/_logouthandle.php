<?php
session_start();

session_unset();
session_destroy();

header("location: /grampower/login.php?logout=true");
exit;



?>