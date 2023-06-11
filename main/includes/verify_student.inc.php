<?php

if (isset($_POST['verify'])) {
    $student = $_POST['student_id'];

    include 'autoloader.inc.php';
    spl_autoload_register('myAutoLoaderInclude');

    $verify = new studentcontr;
    $verify->verifyStudent($student);
    header('location:/LIBRARY_ARCHIVING_SYSTEM2/main/admin/student_verification_manage.admin.php');
}
