<!DOCTYPE html>
<html lang="en">

<head>

    <title>Profile</title>
</head>

<body>

    <?php

    include 'Dashboad.php';

    function studentInfo($data)
    {
        if (file_exists('Data.json')) {
            include 'validate.php';
            $current_data = file_get_contents('Data.json');

            $current_data = json_decode($current_data, true);
            foreach ($current_data as $row) {
                if ($_SESSION['username'] === $row['username']) {
                    $data = array(
                        'name' => $row['name'],
                        'e-mail' => $row['e-mail'],
                        'username' => $row['username'],
                        'gender' => $row['gender'],
                        'dob' => $row['dob'],
                    );
                    return $data;
                }
            }
        }
    }

    $name = "";

    $student = studentInfo($name);

    echo $student['name'];
    echo "<br>";
    echo $student['e-mail'];
    echo "<br>";
    echo $student['username'];
    echo "<br>";
    echo $student['gender'];
    echo "<br>";
    echo $student['dob'];
    echo "<br>";
    ?>

</body>

</html>