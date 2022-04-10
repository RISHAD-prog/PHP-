<?php
require_once '../Model/model.php';
if (isset($_POST['addData'])) {
    $userdata['product_type'] = $_POST['product_type'];
    $userdata['buying_price'] = $_POST['buying_price'];
    $userdata['selling_price'] = $_POST['selling_price'];
    if (updateData($_POST['id'], $userdata) and !empty($_POST['display'])) {
        session_start();
        header('Location:../View/Display_Profit.php');
    } else {
        echo 'You are not allowed to access this page.';
    }
} else {
    echo 'You are not allowed to access this page.';
}
