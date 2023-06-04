<?php
if (isset($_POST["submit"])) {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];

    include 'autoloader.inc.php';
    spl_autoload_register('myAutoLoaderInclude');
    $login = new logincontr($user_id, $password);

    $login->loginUser();
}
