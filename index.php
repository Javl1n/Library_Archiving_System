<?php
include_once('classes.php');
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
    $user = new user();
    $id = 202200360;
    $info = $user->student_info($id);
    echo $info['first_name'];
    ?>
</body>

</html>