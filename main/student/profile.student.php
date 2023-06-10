<?php
session_start();

include '../includes/autoloader.inc.php';
include_once '../includes/css.inc.php';
include '../includes/js.inc.php';

spl_autoload_register('myAutoLoaderAdmin');


$page = 2;
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
    echo $nav_css;
    echo $sidebar_css;
    echo $jquery_admin;
    echo $bootstrap_admin_js
    ?>
</head>

<body>
    <?php
    include_once '../includes/student.navbar.php';
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="card m-5">
                <div class="card-body">
                    <?php
                    $user->viewStudentProfile($_SESSION['user_id']);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>