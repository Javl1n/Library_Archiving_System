<?php
session_start();
include '../includes/autoloader.inc.php';
include '../includes/css.inc.php';
include '../includes/js.inc.php';

spl_autoload_register('myAutoLoaderAdmin');

if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
}

$page = 3;
$action = 'article_manage.admin.php';
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
    include_once '../includes/admin.navbar.php';
    ?>
    <div class="container-fluid">
        <div class="row">
            <?php
            include_once '../includes/article_filter.inc.php';
            ?>

            <div class="col">
                <br>
                <div class="row">
                    <div class="col-12 ms-3 mx-1">
                        <div class="gap-3 d-block">


                            <!-- <button class="btn btn-orange" name='status'>View approved</button> -->


                            <button class="btn btn-orange d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#filters" aria-controls="filters">filters</button>

                        </div>
                    </div>
                </div>
                <div class="card m-3">
                    <div class="card-body table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class='col-1' scope="col">ID</th>
                                    <th class='col-4' scope="col">Title</th>
                                    <th class='col' scope="col">Published</th>
                                    <th class='col-4' scope="col">Course</th>
                                    <th class='col' scope="col">Status</th>
                                    <th class='col' scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $articles = new articleview;
                                $cid = 0;
                                $tag = 0;
                                $year = 0;
                                $status = 2;
                                if (isset($_POST['course'])) {
                                    $cid = $_POST['course'];
                                } elseif (isset($_POST['tag'])) {
                                    $tag = $_POST['tag'];
                                } elseif (isset($_POST['year_search'])) {
                                    $year = $_POST['year'];
                                } elseif (isset($_POST['status'])) {
                                    $status = $_POST['status'];
                                }
                                $articles->showUploadRequests($cid, $tag, $year, $status);
                                ?>
                            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>