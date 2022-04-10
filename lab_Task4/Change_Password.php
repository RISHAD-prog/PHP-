<!DOCTYPE html>
<html lang="en">

<head>
    <title>Password change</title>
    <style type="text/css">
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    include 'Dashboad.php';
    include 'Registration_Logic.php';
    $currErr = $NewpassErr = $renewpasErr = "";
    $Newpass = $renewpass = "";
    $currPass = "";
    $incurrpass = "";
    $user_count = 0;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $currPass = $_POST["currentpass"];
        $Newpass = $_POST["newpassword"];
        $uname = $_SESSION['username'];
        $user = GetUserInfo($uname);
        $renewpass = $_POST["retypenewpassword"];
        $data = file_get_contents('Data.json');
        $data = json_decode($data, true);
        foreach ($data as $row) {
            if ($row["username"] === $uname) {
                if ($currPass != $row['password']) {
                    $currErr = "current password does not match";
                }
                if ($currPass == $Newpass) {
                    $NewpassErr = "New password can not be same as current password";
                }
                if ($Newpass != $renewpass) {
                    $renewpasErr = "doest not match to the new password";
                }
                if ($currPass == $row['password'] and $currPass != $Newpass and $Newpass == $renewpass) {
                    $user = updateINFO($_POST, $uname);
                }
            }
        }
    }

    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <fieldset>
            <legend>Current Password</legend>
            Current Password:<input type="text" name="currentpass">
            <span class="error">* <?php echo $currErr; ?></span>
            <br><br>
            New Password:<input type="text" name="newpassword">
            <span class="error">* <?php echo $NewpassErr; ?></span>
            <br><br>
            Retype new password: <input type="text" name="retypenewpassword">
            <span class="error">* <?php echo $renewpasErr; ?></span>
            <br><br>
            <input type="submit" value="Submit">
        </fieldset>
    </form>

</body>

</html>