<?php
session_start();
include '../includes/autoloader.inc.php';
include '../includes/css.inc.php';
include '../includes/js.inc.php';

spl_autoload_register('myAutoLoaderAdmin');

if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
}

$page = 2;
$status = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <?php
    echo $bootstrap_css;
    echo $nav_css;
    echo $sidebar_css;
    echo $jquery_admin;
    echo $bootstrap_admin_js;
    ?>
</head>

<body>
    <?php
    include '../includes/admin.navbar.php';
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card m-5">
                <div class="card-body">
                    <?php
                    $student_id = $_POST['view'];
                    $verify = new studentview;
                    $verify->viewVerificationInfo($student_id);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>