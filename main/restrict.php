<?php

session_start();
include './includes/autoloader.inc.php';
include './includes/css.inc.php';
spl_autoload_register('myAutoLoaderMain');

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restricted</title>

    <?php
    echo $bootstrap_css;
    ?>
</head>

<body>
    <div class="container min-vh-100">
        <div class="row justify-content-center pt-5">
            <div class="col-3">
                <img src="./assets/restricted.png" class='img-fluid' alt="">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <h1 class="text-center">RESTRICTED ACCOUNT</h1>
                <p class="fs-5 text-center">Please contact your library immediately</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-1">
                <form action="./includes/logout.inc.php">
                    <button class="btn btn-orange">log out</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>