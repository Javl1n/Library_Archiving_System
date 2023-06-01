<?php

include('./includes/css.include.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <?php
    include('./includes/css.include.php');
    ?>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>

<body>
    <br>
    <br>
    <br>
    <div>
        <h1>Create an account</h2>
    </div>
    <form action="./includes/signup.include.php" method="POST">

        <div class="form-group">
            <label for="username">Student id:</label><br>
            <input type="text" name="user_id" id="username" placeholder="Student ID" required>
        </div>

        <div class="form-group">
            <label for="pass_word">Password:</label><br>
            <input type="password" name="password" id="pass_word" placeholder="Password" required>
        </div>
        <div class="form-group">
            <label for="pass_word">Confirm Password:</label><br>
            <input type="password" name="confpassword" id="pass_word" placeholder="Password" required>
        </div>

        <div class="form-group">
            <label for="first_name">First Name:</label><br>
            <input type="text" name="first_name" id="first_name" placeholder="First Name" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label><br>
            <input type="text" name="last_name" id="last_name" placeholder="Last Name" required>
        </div>
        <div class="form-group">
            <label for="middle_initial">Middle Name:</label><br>
            <input type="text" name="middle_name" id="middle_initial" placeholder="Middle Name" required>
        </div>


        <div class="form-group">
            <label for="email">Email:</label><br>
            <input type="text" name="email" id="email" placeholder="Email" required>
        </div>

        <div class="form-group">
            <label for="contact_number">Contact Number:</label><br>
            <input type="text" name="contact_number" id="contact_number" placeholder="Contact Number" required>
        </div>
        <button type="submit" class="nav-button green-button" name='submit'>Register</button>

        <p class="register">Already a member? <a href="index.php">Log in</a></p>
    </form>
    <br>
    <br>
    <br>
</body>

</html>