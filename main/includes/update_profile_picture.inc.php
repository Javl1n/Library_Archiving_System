<?php

if (isset($_POST['update_profile'])) {
    $id = $_POST['student_id'];
    $file = $_FILES['profile'];
    $file_name = $file['name'];
    $file_tmp_name = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];
    $file_type = $file['type'];

    include 'autoloader.inc.php';
    spl_autoload_register('myAutoLoaderInclude');
    $update = new studentcontr;
    $update->setProfilePicture($id, $file_name, $file_tmp_name, $file_size, $file_error, $file_type);
}
