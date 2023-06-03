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
            $_SESSION['user_id'] = $user[0]['user_id'];
            $_SESSION['first_name'] = $user[0]['first_name'];
            $_SESSION['last_name'] = $user[0]['last_name'];
            $_SESSION['middle_name'] = $user[0]['middle_name'];
            $_SESSION['email'] = $user[0]['email'];
            $_SESSION['contact_number'] = $user[0]['contact_number'];
            $_SESSION['user_type'] = $user[0]['user_type_id'];
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
