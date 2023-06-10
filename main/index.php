<?php
session_start();
include './includes/autoloader.inc.php';
include './includes/css.inc.php';
spl_autoload_register('myAutoLoaderMain');

if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
} else {
    if ($_SESSION['user_type'] == 1) {
        header('location:./admin/article_manage.admin.php');
    } elseif ($_SESSION['user_type'] == 2 || ($_SESSION['user_type'] == 2)) {
        header('location:./student/article.student.php');
    }
}
