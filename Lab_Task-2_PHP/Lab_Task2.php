<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <style type="text/css">
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php

    $nameErr = $emailErr = $genderErr = $dateErr = $degreeErr = $BGErr = "";
    $name = $email = $gender = $date   = $Degree =  $BG = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
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
        } else {
            $email = ($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                $email = "";
            }
        }
        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = ($_POST["gender"]);
        }
        if (empty($_POST["date"])) {
            $dateErr = "cannot be empty";
        } else {
            $date = ($_POST["date"]);
        }
        if (empty($_POST['degree'])) {
            $degreeErr = "At least two of them must be selected";
        } else if (count($_POST['degree']) < 2) {
            $degreeErr = "select another one";
        } else {

            $Degree = implode(",", $_POST['degree']);
        }


        if (($_POST["Blood"]) == "none") {
            $BGErr = "Must be selected";
        } else {
            $BG = ($_POST["Blood"]);
        }
    }

    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        Name:<input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error">* <?php echo $nameErr; ?></span>
        <br><br>
        E-mail:
        <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error">* <?php echo $emailErr; ?></span>
        <br><br>
        Gender:
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other">Other
        <span class="error">* <?php echo $genderErr; ?></span>
        <br><br>
        Date:
        <input type="date" name="date" value="<?php echo $date; ?>" min="1953-01-01" max="1998-12-31">
        <span class="error">* <?php echo $dateErr; ?></span>
        <br><br>
        Degree:
        <input type="checkbox" name="degree[]" value="SSC"> SSC
        <input type="checkbox" name="degree[]" value="HSC"> HSC
        <input type="checkbox" name="degree[]" value="BSc"> BSc
        <input type="checkbox" name="degree[]" value="MSc"> MSc
        <span class="error">* <?php echo $degreeErr; ?></span>
        <br><br>
        Blood Group:
        <select name="Blood" id="Blood">
            <option <?php if (isset($BG) && $BG == "none") echo "selected"; ?> value="none">none</option>
            <option <?php if (isset($BG) && $BG == "Apos") echo "selected"; ?> value="Apos">A+</option>
            <option <?php if (isset($BG) && $BG == "Aneg") echo "selected"; ?> value="Aneg">A-</option>
            <option <?php if (isset($BG) && $BG == "Bpos") echo "selected"; ?> value="Bpos">B+</option>
            <option <?php if (isset($BG) && $BG == "Bneg") echo "selected"; ?> value="Bneg">B-</option>
            <option <?php if (isset($BG) && $BG == "Opos") echo "selected"; ?> value="Opos">O+</option>
            <option <?php if (isset($BG) && $BG == "Oneg") echo "selected"; ?> value="Oneg">O-</option>
            <option <?php if (isset($BG) && $BG == "ABpos") echo "selected"; ?> value="ABpos">AB+</option>
            <option <?php if (isset($BG) && $BG == "ABneg") echo "selected"; ?> value="ABneg">AB-</option>
        </select>
        <span class="error">* <?php echo $BGErr; ?></span>
        <br><br>

        <input type="submit" name="submit" value="Submit">
    </form>
    <h2>Your input</h2>
    <?php
    echo $name . "<br>";
    echo $email . "<br>";
    echo $gender . "<br>";
    echo $date . "<br>";

    echo  $Degree . "<br>";


    echo $BG . "<br>";
    ?>
</body>

</html>