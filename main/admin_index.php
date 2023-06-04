<?php
session_start();
include './includes/autoloader.inc.php';
include './includes/css.inc.php';
spl_autoload_register('myAutoLoaderMain');

if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
}
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
    YOU ARE AN ADMIN
    <a href="./includes/logout.inc.php">log out</a>
</body>

</html>