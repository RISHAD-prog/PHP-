<?php
require_once '../Controller/Show_Data.php';
$property = show_profit();
include 'Navbar.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Display Profit</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Property Type</th>
                <th>Profit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($property as $i => $data) : ?>
                <tr>

                    <td><?php echo $data['House_Type'] ?></td>
                    <td><?php echo $data['Selling_Price'] - $data['Buying_Price'] ?></td>
                    <td><a href="edit_propertydata.php?id=<?php echo $data['ID'] ?>">Edit </a>
                        &nbsp<a href="../Controller/Delete_Data.php?id=<?php echo $data['ID'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete </a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>