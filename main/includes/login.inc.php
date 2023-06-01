<?php
if (isset($_POST["submit"])) {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];

    include 'autoloader.inc.php';
    spl_autoload_register('myAutoLoaderInclude');
    $signup = new signupcontr($user_id, $first_name, $middle_name, $last_name, $password, $pwdrepeat, $email, $contact);

    $signup->signupUser();

    header('location: ../index.php?error=none');
}
