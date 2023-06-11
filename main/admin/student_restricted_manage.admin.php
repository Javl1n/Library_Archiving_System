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
$status = 2;
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
    <div class="container-fluid">
        <div class="row">
            <?php
            include_once '../includes/student_filter.admin.inc.php';
            ?>

            <div class="col">
                <div class="row gx-2 pt-3">
                    <div class="col-10 ms-3 mx-1">
                        <div class="gap-3 d-block">
                            <button class="btn btn-orange d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#courseOptions" aria-controls="courseOptions">Course</button>
                            <a href="student_active_manage.admin.php" class="btn btn-orange">View Active</a>
                            <a href="student_verification_manage.admin.php" class="btn btn-orange">Verification Requests</a>
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
                                    <th class='col-2' scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $students = new studentview;
                                if (isset($_POST['course'])) {
                                    $cid = $_POST['course'];
                                } else {
                                    $cid = 0;
                                }
                                $students->showStudentList($cid, $status);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>