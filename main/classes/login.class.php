<?php
class login extends dbconnection
{
    protected function getUser($user_id, $password)
    {
        $sql = 'SELECT password FROM user WHERE user_id = ?';
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute(array($user_id, $password))) {
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
        $checkpwd = password_verify($passwd, $pwdHashed[0]['password']);


        $stmt = null;
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
