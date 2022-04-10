<?php
include 'Navbar.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product Details</title>
    <link rel="stylesheet" type="text/css" href="../CSS/Styles.css">
</head>

<body>

    <div class="add_Product">
        <form action="../Controller/AddData.php" method="POST">
            <fieldset>
                <legend class="legend"> Add Product</legend>
                <label> Property Type </label> <br>
                <input type="text" id="product_type" name="product_type" class="name" placeholder="Enter product type" value="">
                <br><br>
                <label> Buying Price </label><br>
                <input type="text" id="buying_price" name="buying_price" class="name" placeholder="Enter product buying price" value="">
                <br><br>
                <label> Seling Price </label><br>
                <input type="text" id="selling_price" name="selling_price" class="name" placeholder="Enter product selling price" value="">
                <br><br>
                <input type="checkbox" name="display"> <label> Display </label> <br><br>
                <input type="submit" name="addData" class="button" value="Submit">
            </fieldset>
        </form>
    </div>

</body>

</html>