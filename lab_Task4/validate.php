<?php

if (isset($_SESSION['username'])) {
    echo "<h1>Welcome to your dashborad " . $_SESSION['username'] . "</h1>";
} else {
    header("location:Login.php");
}
?>

<a href="Login.php">Go to login</a><br><br>