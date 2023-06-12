<?php

if (isset($_POST['retrieve'])) {
    $article = $_POST['retrieve'];

    include 'autoloader.inc.php';
    spl_autoload_register('myAutoLoaderInclude');

    $delete = new articlecontr;
    $delete->retrieveArticle($article);
    header('location:../admin/manage_archive.admin.php');
} else {
    echo 'RETRIEVE NOT SET';
}
