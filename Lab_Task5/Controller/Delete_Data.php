<?php

require_once '../Model/model.php';

if (deleteData($_GET['id'])) {
    header('Location:../View/Display_Profit.php');
}
