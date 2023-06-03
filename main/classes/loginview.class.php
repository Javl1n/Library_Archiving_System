<?php

class loginview extends login
{
    public function showUser()
    {
        if (isset($_SESSION["userid"])) { ?>
            <?php echo $_SESSION["first_name"]; ?>
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
