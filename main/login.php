<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <?php
    include('./includes/css.inc.php');
    echo $loginregister_css;
    ?>
</head>

<body>
    <div class="center">
        <h1>Login</h1>
        <form action="./includes/login.inc.php" method="post">
            <div class="txt_field">
                <input type="text" name="user_id" placeholder="Student ID" required>

            </div>
            <div class="txt_field">
                <input type="password" name="password" placeholder="Password" required>

            </div>
            <input type="submit" name="submit" value="Login">
            <div class="signup_link">
                Not a member?<a href="signup.php">Signup</a>
            </div>
        </form>
    </div>


</body>

</html>