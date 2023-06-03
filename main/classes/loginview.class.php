<?php

class loginview extends login
{

    public function showUser()
    {

        if (isset($_SESSION["user_id"])) {
            if ($_SESSION["user_type"] == 1) { ?>
                <?php echo $_SESSION["first_name"]; ?>
                <?php echo $_SESSION["middle_name"]; ?>
                <?php echo $_SESSION["last_name"]; ?>
                <br>
            <?php
            } elseif ($_SESSION["user_type"] == 2) {
                $student = new studentview;
                $result = $student->showStudent($_SESSION["user_id"]);
                echo $result['course_title'];
            }
            ?>
            <a href="./includes/logout.inc.php">log out</a>
        <?php
        } else { ?>
            <a href="signup.php">signup</a>
            <br>
            <a href="login.php">login</a>
<?php
        }
    }
}
