<?php

if (isset($_POST['status_update'])) {
    $status = $_POST['status_update'];
    $student = $_POST['student_id'];

    include 'autoloader.inc.php';
    spl_autoload_register('myAutoLoaderInclude');
    $update = new studentcontr;
    $update->updateStudentStatus($student, $status);
    if ($status == 1) {
        $page = 'restricted';
    } else if ($status == 2) {
        $page = 'active';
    }
    header('location:/LIBRARY_ARCHIVING_SYSTEM2/main/admin/student_' . $page . '_manage.admin.php');
}
