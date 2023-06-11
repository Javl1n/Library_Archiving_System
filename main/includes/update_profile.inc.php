<?php

if (isset($_POST['save'])) {
    $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $course = $_POST['course'];
    $year_level = $_POST['year_level'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    include 'autoloader.inc.php';
    spl_autoload_register('myAutoLoaderInclude');
    $update = new studentcontr;
    $update->updateStudentProfile($student_id, $first_name, $middle_name, $last_name, $course, $year_level, $email, $contact);

    header('location: ../student/profile.student.php');
}
