<?php

if (isset($_POST['submit'])) {
    $id = $_POST['student_id'];
    $file = $_FILES['verify'];
    $file_name = $_FILES['verify']['name'];
    $file_tmp_name = $_FILES['verify']['tmp_name'];
    $file_size = $_FILES['verify']['size'];
    $file_error = $_FILES['verify']['error'];
    $file_type = $_FILES['verify']['type'];

    include 'autoloader.inc.php';
    spl_autoload_register('myAutoLoaderInclude');
    $verify = new studentcontr;
    $verify->submitVerification($id, $file_name, $file_tmp_name, $file_size, $file_error, $file_type);
}
