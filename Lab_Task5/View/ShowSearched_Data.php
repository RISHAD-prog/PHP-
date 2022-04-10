<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style>
        table,
        td,
        th {
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <?php
    include "Search_Data.php";

    ?>

    <table>
        <thead>
            <tr>
                <th>House Type</th>
                <th>Profit</th>

            </tr>
        </thead>
        <tbody>
            <p><?php echo $_POST['house_type']; ?></p>
            <?php foreach ($allSearchedProperty as $i => $data) : ?>
                <tr>
                    <td><?php echo $data['House_Type'] ?></td>
                    <td><?php echo $data['Selling_Price'] - $data['Buying_Price'] ?></td>
                </tr>
            <?php endforeach; ?>


        </tbody>


    </table>


</body>

</html>