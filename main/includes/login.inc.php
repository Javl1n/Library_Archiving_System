<?php
if (isset($_POST["submit"])) {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];

    include 'autoloader.inc.php';
    spl_autoload_register('myAutoLoaderInclude');
    $signup = new logincontr($user_id, $password);

    $signup->loginUser();

    header('location: ../index.php?error=none');
}
