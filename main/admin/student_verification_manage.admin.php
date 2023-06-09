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
            <div class="col-3 offcanvas-lg offcanvas-start text-bg-dark overflow-auto" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasResponsiveLabel">Courses</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body col-12 ">

                    <form action="student_restricted_manage.admin.php" method="post">
                        <div class="row d-sm-none d-md-block">
                            <h2>Courses</h2>
                        </div>
                        <br>
                        <?php
                        $courses = new studentview;
                        $courses->showcoursebuttons();
                        ?>
                    </form>

                </div>
            </div>

            <div class="col">
                <br>
                <div class="row">
                    <div class="col-3 m-1">
                        <form action="student_active_manage.admin.php" method='post'>
                            <button type="submit" name='status' value='2' class="btn btn-orange">View Active</button>
                        </form>
                        <form action="student_active_manage.admin.php" method='post'>
                            <button type="submit" name='status' value='2' class="btn btn-orange">View Active</button>
                        </form>
                    </div>
                    <div class="col-2 m-1">
                        <button class="btn btn-primary d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive">Course</button>
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
                                <?php
                                $students = new studentview;
                                if (isset($_POST['course'])) {
                                    $cid = $_POST['course'];
                                    $students->showStudentList_bC($cid, $status);
                                } else {
                                    $students->showStudentList_bSt($status);
                                }
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