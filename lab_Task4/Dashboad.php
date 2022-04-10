<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
</head>

<body>

    <?php
    include 'Dashboard_navbar.php';
    ?>
    <?php include 'List_of_dashboard.php'; ?>

    <p>Welcome <?php echo $_SESSION['username'] ?> </p>
    <?php require 'footer.php'; ?>
</body>

</html>