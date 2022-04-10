<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forgot Password</title>
</head>

<body>
    <h1>Home Finder</h1>
    <?php require 'Navbar.php'; ?>
    <?php
    $emailerr = "";
    $email = "";
    if (isset($_POST['submit'])) {
        if (empty($_POST["email"])) {
            $emailerr = "Email is required";
        } else {
            $email = ($_POST["email"]);
            $data = file_get_contents("Data.json");
            $data = json_decode($data, true);
            foreach ($data as $emailaddress) {
                if ($emailaddress['e-mail'] === $_POST['email']) {
                    $emailaddress['e-mail'] = $email;
                } else {
                    echo "no match";
                }
            }
        }
    }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <fieldset>
            <legend> Forgot Password </legend>
            Enter Email: <input type="text" name="email">
            <span class="error">* <?php echo $emailerr; ?></span>
            <br><br>
            <input type="submit" name="submit" value="Submit">
            <a href="Login.php">Go to Login</a>
            <h3>Mail sent to <?php echo $email; ?></h3>
        </fieldset>
    </form>
    <?php require 'footer.php'; ?>
</body>

</html>