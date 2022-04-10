<?php
require_once '../Model/model.php';
if (isset($_POST['addData'])) {
    $data['product_type'] = $_POST['product_type'];
    $data['buying_price'] = $_POST['buying_price'];
    $data['selling_price'] = $_POST['selling_price'];
    if (addData($data) and !empty($_POST['display'])) {
        session_start();
        header("location:../View/Display_Profit.php");
    } else {
        echo 'You are not allowed to access this page.';
    }
} else {
    echo 'You are not allowed to access this page.';
}
