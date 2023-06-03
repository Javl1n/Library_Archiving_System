<?php
session_start();
include './includes/autoloader.inc.php';
include './includes/css.inc.php';
spl_autoload_register('myAutoLoaderMain');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    echo $bootstrap_css;
    ?>
</head>

<body>
    <?php
    $user = new loginview();
    $user->showUser();
    echo "<br>";
    $student = new studentview;
    $student->showStudentList();
    ?>
</body>

</html>