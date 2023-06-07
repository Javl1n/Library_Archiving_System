<?php
session_start();
include './includes/autoloader.inc.php';
include './includes/css.inc.php';
include './includes/js.inc.php';
include './includes/admin.navbar.php';
spl_autoload_register('myAutoLoaderMain');

if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
}

$page = 2;
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
    echo $student_manage_admin_css;
    echo $jquery;
    echo $bootstrap_js;
    ?>
</head>

<body>
    <?php
    student_manage($page);
    ?>
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-3 col-sm-10 bg-dark min-vh-100 collapse collapse-horizontal" id="courses">
                <div class="row">
                    <div class="col-md-0 col-sm-1 m-2">
                        <button class="btn btn-outline-light" type="button" data-bs-toggle="collapse" data-bs-target="#courses" aria-expanded="false" aria-controls="courses">
                            Close
                        </button>
                    </div>
                </div>
                <form action="student_manage.admin.php" method="post">

                    <?php
                    $courses = new studentview;
                    $courses->showcoursebuttons();
                    ?>
                </form>
            </div>

            <div class="col">
                <br>
                <div class="row">
                    <div class="col-1 m-1">
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#courses" aria-expanded="false" aria-controls="courses">
                            Filter By
                        </button>
                    </div>
                    <div class="col-3 m-1">
                        <form action="student_manage.admin.php" method='post'>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <?php
                                if (isset($_POST['status'])) {
                                    $status = $_POST['status'];
                                } else {
                                    $status = null;
                                }

                                if ($status == 1) {
                                    $active = 'active" aria-current="page';
                                } elseif ($status == 2) {
                                    $restricted = 'active" aria-current="page';
                                }
                                ?>
                                <button type="submit" name='status' value='1' class="btn btn-primary <?php echo $active; ?>">Active</button>
                                <button type="submit" name='status' value='2' class="btn btn-primary <?php echo $restricted; ?>">Restricted</button>
                            </div>
                        </form>
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
                                if (isset($_POST['course'])) {
                                    $cid = $_POST['course'];
                                } else {
                                    $cid = 1;
                                }
                                $students = new studentview;
                                if (isset($_POST['course'])) {
                                    $students->showStudentList_bC($cid);
                                } elseif (isset($_POST['status'])) {
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