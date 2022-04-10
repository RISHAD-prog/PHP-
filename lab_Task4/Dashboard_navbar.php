<?php
session_start();
if (isset($_SESSION['username'])) {
    echo "<p> looged in as " . $_SESSION['username'] . "</P>";
} else {
    header("location:Login.php");
}
?>
<a href="Logout.php">Logout</a>