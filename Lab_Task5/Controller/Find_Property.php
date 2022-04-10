<?php

require_once '../Model/model.php';

if (isset($_POST['findproperty'])) {



    try {

        $allSearchedProperty = searchData($_POST['house_type']);
        require_once '../View/ShowSearched_Data.php';
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}
