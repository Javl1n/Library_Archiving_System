<?php
include 'includes/autoloader.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $student = new UsersView();
    $Info = $student->showStudent(202200360);
    $full_name = $Info['first_name'] . ' ' . $Info['middle_name'] . ' ' . $Info['last_name'];
    echo 'Full Name: ' . $full_name . '<br>Course: ' . $Info['course_title'] . ' (' . $Info['abbreviation'] . ')';
    ?>
</body>

</html>