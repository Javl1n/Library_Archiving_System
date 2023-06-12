<?php

if (isset($_POST['delete'])) {
    $article = $_POST['delete'];

    include 'autoloader.inc.php';
    spl_autoload_register('myAutoLoaderInclude');

    $delete = new articlecontr;
    $delete->deleteArticle($article);
    header('location:../student/my_upload.student.php');
} else {
    echo 'DELETE NOT SET';
}
