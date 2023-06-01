<?php

if (isset($_POST["submit"])) {
    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $password = $_POST['password'];
    $pwdrepeat = $_POST['confpassword'];
    $email = $_POST['email'];
    $contact = $_POST['contact_number'];

    include 'autoloader.inc.php';
    spl_autoload_register('myAutoLoader');
    $signup = new signupcontr($user_id, $first_name, $middle_name, $last_name, $password, $pwdrepeat, $email, $contact);

    $signup->signupUser();

    header('location: ../index.php?error=none');
}
