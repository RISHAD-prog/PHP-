<!DOCTYPE html>
<html>

<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style type="text/css">
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <br />

    <div class="container" style="width:500px;">
        <?php
        require 'Navbar.php';
        ?>
        <h3>Add User</h3><br />
        <form action="../Controller/Adding_data.php" method="post">
            <?php
            if (isset($error)) {
                echo $error;
            }
            ?>
            <br />
            <label>Full Name</label>
            <input type="text" name="name" class="form-control" value="" />

            </br>
            <label>E-mail</label>
            <input type="text" name="email" class="form-control" value="" />

            </br>
            <label>User Name</label>
            <input type="text" name="username" class="form-control" value="" />

            </br>
            <label>Password</label>
            <input type="password" name="password" class="form-control" />

            </br>
            <label>Confirm Password</label>
            <input type="password" name="confirmpassword" class="form-control" />

            <br>

            <fieldset>
                <legend>Gender</legend>
                <input type="radio" id="male" name="gender" value="male">
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Female</label>
                <input type="radio" id="other" name="gender" value="other">
                <label for="other">Other</label>

                </br>
                <legend>Date of Birth:</legend>
                <input type="date" name="dob">

                </br>
            </fieldset>

            <input type="submit" name="submit" value="Register" class="btn btn-info" /><br />
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
        </form>
    </div>
    <br />
</body>

</html>