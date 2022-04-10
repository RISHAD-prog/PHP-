<!DOCTYPE html>
<html>

<body>
    <?php
    include "Navbar.php";

    ?>
    <form method="post" action="../Controller/Find_Property.php">
        <h1>SEARCH FOR House Types</h1>
        <input type="text" name="house_type" />
        <input type="submit" name="findproperty" value="Search" />
    </form>



</body>

</html>