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

$page = 1;
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
            <div class="col-3 bg-dark min-vh-100" style="position: fixed;">
                <h2 class="text-light">Filter by</h1>
                    <form action="#">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>filter by course</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </form>
            </div>
            <div class="col offset-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>