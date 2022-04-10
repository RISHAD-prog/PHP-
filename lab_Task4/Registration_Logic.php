<?php
include 'Registration_datalogic.php';
function dataloading()
{
    return readData();
}
function AddData($data)

{
    $final_data = storeData($data);
    if (file_put_contents('Data.json', $final_data)) {
        // header("location:../View/View_Profile.php");
    }
}
function GetUserInfo($data)
{
    $current_data = dataloading();


    foreach ($current_data as $row) {
        if ($row['username'] == $data) {
            $d_data = array(
                'name' => $row['name'],
                'e-mail' => $row['e-mail'],
                'username' => $row['username'],

                'dob' => $row['dob'],
            );
            return $d_data;
        }
    }
}
function updateINFO($data, $name)
{
    $updateUser = [];
    $getUser = dataloading();
    foreach ($getUser as $i => $user) {
        if ($user['username'] == $name) {
            $getUser[$i] = $updateUser = array_merge($user, $data);
        }
    }
    file_put_contents('Data.json', json_encode($getUser));
    return $updateUser;
}
function deleteUser($username)
{
    $users = dataloading();

    foreach ($users as $i => $user) {
        if ($user['username'] == $username) {
            array_splice($users, $i, 1);
        }
    }

    file_put_contents('Data.json', json_encode($users));
}
