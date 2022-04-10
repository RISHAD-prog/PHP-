<?php
require_once '../Model/Query.php';
if (isset($_POST['submit'])) {
    $message = '';

    $nameErr = $emailErr = $genderErr = $dateErr = $degreeErr = $BGErr = "";
    $name = $email = $gender = $date   = $Degree =  $BG = "";
    $usernameErr = $passErr = $conpassErr = "";
    $username = $pass = $conpass = "";

    if (isset($_POST["submit"])) {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else if (!empty($_POST["name"])) {
            $name = ($_POST["name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
                $name = "";
            } else if (strlen($name) < 2) {
                $nameErr = "Contains at least two  words";
                $name = "";
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else if (!empty($_POST["email"])) {
            $email = ($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                $email = "";
            }
        }
        if (empty($_POST["username"])) {
            $usernameErr = "User Name is required";
        } else if (!empty($_POST["username"])) {
            $username = ($_POST["username"]);
            if (!preg_match("/^[a-zA-Z-'_]*$/", $username)) {
                $usernameErr = "Only letters and underscore allowed";
                $username = "";
            } else if (strlen($username) < 2) {
                $usernameErr = "Contains at least two  words";
                $username = "";
            }
        }
        if (empty($_POST["password"])) {
            $passErr = "password is required";
        } else if (!empty($_POST["password"])) {
            $pass = ($_POST["password"]);
            if (strlen($pass) < 8) {
                $passErr = " must not be less than eight (8) characters";
                $pass = "";
            } else if (!preg_match("/[@, #, $,%]/", $pass)) {
                $passErr = "must contain at least one of the special characters (@, #, $,%)";
                $pass = "";
            }
        }
        if (empty($_POST["confirmpassword"])) {
            $conpassErr = "This field is required";
        } else if (!empty($_POST["confirmpassword"])) {
            if ($_POST["password"] == $_POST["confirmpassword"]) {
                $conpass = $_POST["confirmpassword"];
            } else {

                $conpassErr = "doest not match to the new password";
            }
        }
        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else if (!empty($_POST["gender"])) {
            $gender = ($_POST["gender"]);
        }
        if (empty($_POST["dob"])) {
            $dateErr = "cannot be empty";
        } else if (!empty($_POST["dob"])) {
            $date = ($_POST["dob"]);
        }
        if (!empty($name) && !empty($email) && !empty($username) && !empty($gender) && !empty($date)) {
            // if ($_SESSION['username'] == 'Admin' and $_POST['confirmpassword'] == 'rishad007@') {
            //     session_start();
            //     header("location:View_Profile.php");
            // } else {
            //     header("location:Login.php");
            // }
            $data['fullname'] = $_POST['name'];
            $data['username'] = $_POST['username'];
            $data['email'] = $_POST['email'];
            $data['password'] = $_POST['confirmpassword'];
            $data['gender'] = $_POST['gender'];
            $data['dateofbirth'] = $_POST['dob'];
            if (insert_data($data)) {
                session_start();
                header("location:../View/View_Profile.php");
            } else {
                echo 'You are not allowed to access this page.';
            }
        } else {
            echo 'You are not allowed to access this page.';
        }
    }
}
