<?php
session_start();

include '../includes/autoloader.inc.php';
include_once '../includes/css.inc.php';
include '../includes/js.inc.php';

spl_autoload_register('myAutoLoaderAdmin');


$page = 3;
$action = 'my_upload.student.php';
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
                <div class="row gx-2 pt-3 ps-3">
                    <h4>Archive of <?php echo $_SESSION['first_name'] . ' id: ' . $_SESSION['user_id'] ?></h4>
                </div>
                <div class="row gx-2">
                    <div class="col-10 ps-4">
                        <div class="gap-3 d-block">
                            <a class="btn btn-orange d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#filters" aria-controls="filters">Filters</a>
                            <a class="btn btn-orange" href="my_upload.student.php">My Articles</a>
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
                                    <th class='col-2' scope="col">Status</th>
                                    <th class='col-1 text-center' scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $articles = new articleview;
                                if (isset($_POST['course'])) {
                                    $cid = $_POST['course'];
                                    $tag = 0;
                                    $year = 0;
                                } elseif (isset($_POST['tag'])) {
                                    $cid = 0;
                                    $tag = $_POST['tag'];
                                    $year = 0;
                                } elseif (isset($_POST['year_search'])) {
                                    $cid = 0;
                                    $tag = 0;
                                    $year = $_POST['year'];
                                } else {
                                    $cid = 0;
                                    $tag = 0;
                                    $year = 0;
                                }
                                $articles->showMyArchives($_SESSION['user_id'], $cid, $tag, $year);
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