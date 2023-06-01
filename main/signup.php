<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <?php
    include('./includes/css.inc.php');
    echo $bootstrap_css;
    //echo $register_css;
    ?>

</head>

<body>
    <div class="container-fluid">
        <br>
        <br>
        <br>
        <br>
        <div class="row align-items-center justify-content-center">
            <div class="col-md-7">
                <div class="media">
                    <img class="align-self-center mr-5  " src="./assets/SEAIT.jpg" alt="Generic placeholder image">
                    <div class="media-body">
                        <h1 class="mt-0">SEAIT Library System</h1>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h1>Create an account</h2>
                        </div>
                        <form action="./includes/signup.include.php" method="POST">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">course</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="username">Student id:</label>
                                <input type="text" name="user_id" id="username" placeholder="Student ID" class="form-control" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="pass_word">Password:</label>
                                    <input type="password" name="password" id="pass_word" placeholder="Password" class="form-control" required>
                                </div>
                                <div class="form-group col">
                                    <label for="pass_word">Confirm Password:</label>
                                    <input type="password" name="confpassword" id="pass_word" placeholder="Password" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input type="text" name="first_name" id="first_name" placeholder="First Name" class="form-control" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" name="last_name" id="last_name" placeholder="Last Name" class="form-control" required>
                                </div>
                                <div class="form-group col-5">
                                    <label for="middle_initial">Middle Name:</label>
                                    <input type="text" name="middle_name" id="middle_initial" placeholder="Middle Name" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="email">Email:</label>
                                    <input type="text" name="email" id="email" placeholder="Email" class="form-control" required>
                                </div>
                                <div class="form-group col">
                                    <label for="contact_number">Contact Number:</label>
                                    <input type="text" name="contact_number" id="contact_number" placeholder="Contact Number" class="form-control" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name='submit'>Register</button>
                            <p class="register">Already a member? <a href="index.php">Log in</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
    </div>


</body>

</html>