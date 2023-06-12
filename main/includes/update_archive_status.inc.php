<?php

if (isset($_POST['retrieve'])) {
    $article_id = $_POST['article_id'];
    $status = $_POST['retrieve'];

    include 'autoloader.inc.php';
    spl_autoload_register('myAutoLoaderInclude');

    $update = new articlecontr;
    $update->editArchiveStatus($article_id, $status);

    header('location:../student/my_archives.student.php');
} else {
    echo 'RETRIEVE NOT SENT';
}
