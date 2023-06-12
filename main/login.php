<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <?php
    include('./includes/css.inc.php');
    echo $loginregister_css;
    echo $bootstrap_css;
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
                        <h1 class="pt-4 text-center">Login</h1>
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
                </div>
            </div>
        </div>
    </div>
</body>

</html>