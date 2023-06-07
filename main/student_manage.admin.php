<?php
session_start();
include './includes/autoloader.inc.php';
include './includes/css.inc.php';
include './includes/js.inc.php';
include './includes/navbar.admin.php';
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
    student_manage();
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 bg-dark min-vh-100">

                <form action="student_manage.admin.php" method="post">
                    <br>
                    <h2 class="text-white">Courses</h1>
                        <p class="text-light">
                            <?php
                            $courses = new studentview;
                            $courses->showcoursebuttons();
                            ?>
                        </p>
                </form>
            </div>
            <div class="col">
                <div class="card m-3">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class='col-1' scope="col">Student_ID</th>
                                    <th class='col-3' scope="col">Full Name</th>
                                    <th class='col-4' scope="col">Course</th>
                                    <th class='col-1' scope="col">Year Level</th>
                                    <th class='col-2' scope="col">Email</th>
                                    <th class='col' scope="col">Contact</th>
                                    <th class='col' scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_POST['submit'])) {
                                    $cid = $_POST['submit'];
                                } else {
                                    $cid = 10;
                                }
                                $students = new studentview;
                                $students->showStudentList($cid);

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