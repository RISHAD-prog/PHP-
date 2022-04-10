<?php
require_once '../Controller/Show_Data.php';
$property = edit_property($_GET['id']);
include 'Navbar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit_Data</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Product Details</title>
        <link rel="stylesheet" type="text/css" href="../CSS/Styles.css">
    </head>

    <body>

        <div class="add_Product">
            <form action="../Controller/Update_Data.php" method="POST">
                <fieldset>
                    <legend class="legend"> Add Product</legend>
                    <label> Property Type </label> <br>
                    <input type="text" name="product_type" id="product_type" class="name" placeholder="Enter product type" value="<?php echo $property['House_Type']; ?>">
                    <br><br>
                    <label> Buying Price </label><br>
                    <input type="text" name="buying_price" id="buying_price" class="name" placeholder="Enter product buying price" value="<?php echo $property['Buying_Price']; ?>">
                    <br><br>
                    <label> Seling Price </label><br>
                    <input type="text" name="selling_price" id="selling_price" class="name" placeholder="Enter product selling price" value="<?php echo $property['Selling_Price']; ?>">
                    <br><br>
                    <input type="checkbox" name="display"> <label> Display </label> <br><br>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                    <input type="submit" name="addData" class="button" value="Submit">
                </fieldset>
            </form>
        </div>

    </body>

    </html>