<?php

if (isset($_POST['edit'])) {
    $id = $_POST['edit'];
    $title = $_POST['title'];
    $course = $_POST['course'];
    $description = $_POST['abstraction'];
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

    include 'autoloader.inc.php';
    spl_autoload_register('myAutoLoaderInclude');
    $update = new articlecontr;
    $update->editArticle($id, $title, $course, $description, $authors, $tags);

    header('location: ../student/my_upload.student.php');
} else {
    echo 'EDIT NOT SET';
}
