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
    if (!isset($student_id, $first_name, $middle_name, $last_name, $course, $year_level, $email, $contact)) {
        echo 'WALAY NA RECIEVE';
    } else {
        echo $student_id;
        echo '<br>';
        echo $first_name;
        echo '<br>';
        echo $middle_name;
        echo '<br>';
        echo $last_name;
        echo '<br>';
        echo $course;
        echo '<br>';
        echo $year_level;
        echo '<br>';
        echo $email;
        echo '<br>';
        echo $contact;
        echo '<br>';
        include 'autoloader.inc.php';
        spl_autoload_register('myAutoLoaderInclude');
        $update = new studentcontr;
        $update->updateStudentProfile($student_id, $first_name, $middle_name, $last_name, $course, $year_level, $email, $contact);



        header('location: ../student/profile.student.php');
    }
}
