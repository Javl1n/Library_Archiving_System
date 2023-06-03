<?php
class login extends dbconnection
{
    protected function getUser($user_id, $password)
    {
        $sql = 'SELECT password FROM user WHERE user_id = ?';
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute(array($user_id))) {
            $stmt = null;
            header('location: ../login.php?error=gettinguserstmtFailed');
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../login.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll();
        $checkpwd = password_verify($password, $pwdHashed[0]['password']);
        if ($checkpwd == false) {
            $stmt = null;
            header("location: ../login.php?error=incorrectpassword");
            exit();
        } elseif ($checkpwd == true) {
            $sql = 'SELECT * FROM user WHERE user_id = ?';
            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute(array($user_id))) {
                $stmt = null;
                header('location: ../login.php?error=gettinguserstmtFailed2');
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../login.php?error=usernotfound2");
                exit();
            }

            $user = $stmt->fetchAll();

            session_start();
            $_SESSION['userid'] = $user[0]['user_id'];
            $_SESSION['first_name'] = $user[0]['first_name'];
            $stmt = null;
        }
    }

    protected function checkUser($user_id)
    {
        $sql = 'SELECT user_id FROM user WHERE user_id = ?';
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute(array($user_id))) {
            $stmt = null;
            header('location: ../signup.php?error=stmtfailedincheckingforuser');
            exit();
        }
        $resultCheck = true;
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        }

        return $resultCheck;
    }
}
