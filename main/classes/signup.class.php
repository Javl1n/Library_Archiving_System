<?php
class signup extends dbconnection
{
    protected function setUser($user_id, $first_name, $middle_name, $last_name, $password, $email, $contact_number)
    {
        $sql = 'INSERT INTO user (user_id, first_name, middle_name, last_name, password, email, contact_number, user_type_id) VALUES (?, ?, ?, ?, ?, ?, ?, 2)';
        $stmt = $this->connect()->prepare($sql);
        $hashpass = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($user_id, $first_name, $middle_name, $last_name, $hashpass, $email, $contact_number))) {
            $stmt = null;
            header('location: ../signup.php?error=stmtfailed ');
            exit();
        }

        $stmt = null;
    }
    protected function setStudent($user_id, $course_id, $year)
    {


        $sql2 = 'INSERT INTO student (user_id, course_id, year_level, status_id) VALUES (?, ?, ?, 3)';
        $stmt2 = $this->connect()->prepare($sql2);

        if (!$stmt2->execute(array($user_id, $course_id, $year))) {
            $stmt = null;
            header('location: ../signup.php?error=stmtfailed ');
            exit();
        }
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
