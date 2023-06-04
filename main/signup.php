<?php
include('./includes/autoloader.inc.php');
include_once('./includes/css.inc.php');
spl_autoload_register('myAutoLoaderMain');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <?php

    echo $loginregister_css
    ?>
</head>

<body>
    <div class="center">
        <h1>Registration</h1>
        <form action="./includes/signup.inc.php" method="POST">
            <div class="selection">
                <label for="course">Course</label>
                <select id="course" name="course">
                    <?php
                    $courses = new studentview;
                    $courses->showCourseOptions();
                    ?>
                </select>
            </div>
            <div class="txt_field">
                <input type="text" name="user_id" required>
                <label>Student ID</label>
            </div>

            <div class="txt_field">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="txt_field">
                <input type="password" name="confpassword" required>
                <label>Confirm Password</label>
            </div>
            <div class="txt_field">
                <input type="text" name="first_name" required>
                <label>First Name</label>
            </div>
            <div class="txt_field">
                <input type="text" name="last_name" required>
                <label>Last Name</label>
            </div>
            <div class="txt_field">
                <input type="text" name="middle_name" required>
                <label>Middle Name</label>
            </div>
            <div class="selection">
                <label for="year">Year Level</label>
                <select id="year" name="year">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            <div class="txt_field">
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
            <div class="txt_field">
                <input type="text" name="contact_number" required>
                <label>Contact</label>
            </div>

            <input type="submit" name="submit" value="Register">
            <div class="signup_link">
                Already a member?<a href="login.php">login</a>
            </div>
        </form>
    </div>


</body>

</html>