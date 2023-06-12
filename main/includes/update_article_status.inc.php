<?php

if (isset($_POST['update'])) {
    $article_id = $_POST['article_id'];
    $status = $_POST['update'];

    include 'autoloader.inc.php';
    spl_autoload_register('myAutoLoaderInclude');
    $update = new articlecontr;
    $update->editArticleStatus($article_id, $status);

    header('location:../admin/manage_request.admin.php');
}
