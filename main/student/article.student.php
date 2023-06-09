<?php
session_start();

include '../includes/autoloader.inc.php';
include_once '../includes/css.inc.php';
include '../includes/js.inc.php';

spl_autoload_register('myAutoLoaderAdmin');


$page = 1
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

    <div class="container-fluid">
        <div class="row">
            <?php
            include_once '../includes/article_filter.inc.php';
            ?>

            <div class="col">
                <br>
                <div class="row gx-2">
                    <div class="col-10">
                        <div class="row gx-2">
                            <div class="col-2 m-sm-1">
                                <button class="btn btn-orange d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#filters" aria-controls="filters">filters</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card m-3">
                    <div class="card-body table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class='col-1' scope="col">Student_ID</th>
                                    <th class='col-3' scope="col">Full Name</th>
                                    <th class='col-4' scope="col">Course</th>
                                    <th class='col-1' scope="col">Year Level</th>
                                    <th class='col-2' scope="col">Email</th>
                                    <th class='col' scope="col">Contact</th>
                                    <th class='col' scope="col">Status</th>
                                    <th class='col' scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>