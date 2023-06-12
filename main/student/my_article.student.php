<?php
session_start();

include '../includes/autoloader.inc.php';
include_once '../includes/css.inc.php';
include '../includes/js.inc.php';

spl_autoload_register('myAutoLoaderAdmin');


$page = 3;
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
    <div class="container-lg container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-12">
                <div class="card m-5">
                    <div class="card-header">
                        <h3>EDIT ARTICLE</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        $upload = new articleview;
                        $upload->editArticleUI($_POST['edit']);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>