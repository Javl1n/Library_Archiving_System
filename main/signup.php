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

    echo $loginregister_css;
    echo $bootstrap_css
    ?>
</head>

<body>
    <div class="container ">
        <div class="row pt-5 min-vh-100 align-items-center">
            <div class="col-7">
                <div class="row justify-content-center">

                    <img src="assets/SEAIT.jpg" style="width: 400px" class="img-fluid" alt="">
                </div>
                <div class="row text-center justify-content-center">
                    <div class="col-12 pb-5">
                        <h1>
                            <b>SEAIT LIBRARY ARCHIVING SYSTEM</b>
                        </h1>
                        <h3>
                            Your Only Archiving System
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-4 ms-5">
                <div class="justify-content-md-center card">
                    <div class="card-body">
                        <h1 class="pt-4 text-center">Registration</h1>
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
                                <input type="text" name="middle_name">
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
                                <input type="email" name="email">
                                <label>Email</label>
                            </div>
                            <div class="txt_field">
                                <input type="text" name="contact_number">
                                <label>Contact</label>
                            </div>

                            <input type="submit" name="submit" value="Register">
                            <div class="signup_link">
                                Already a member?<a href="login.php">login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>

</html>