<?php

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $course = $_POST['course'];

    if (!empty($_POST['author'])) {
        $authors = $_POST['author'];
    } else {
        header('location: ../student/upload_article.student.php?must select an author');
        exit();
    }
    if (!empty($_POST['tag'])) {
        $tags = $_POST['tag'];
    } else {
        $tags = '';
    }

    $abstraction = $_POST['abstraction'];

    include 'autoloader.inc.php';
    spl_autoload_register('myAutoLoaderInclude');

    $article = new articlecontr;
    $article->uploadArticle($title, $course, $authors, $tags, $abstraction);

    header('location: ../student/my_upload.student.php?upload_successful');
}
