<?php
class signupcontr extends signup
{
    private $user_id;
    private $first_name;
    private $middle_name;
    private $last_name;
    private $password;
    private $pwdrepeat;
    private $email;
    private $contact;
    private $course_id;
    private $year;

    public function __construct($user_id, $first_name, $middle_name, $last_name, $password, $pwdrepeat, $email, $contact, $course_id, $year)
    {
        $this->user_id = $user_id;
        $this->first_name = $first_name;
        $this->middle_name = $middle_name;
        $this->last_name = $last_name;
        $this->password = $password;
        $this->pwdrepeat = $pwdrepeat;
        $this->email = $email;
        $this->contact = $contact;
        $this->course_id = $course_id;
        $this->year = $year;
    }

    public function signupUser()
    {
        if ($this->invalidUid() == false) {
            header("location: ../signup.php?error=invaliduserid");
            exit();
        }
        if ($this->passwordNotMatch() == false) {
            header("location: ../signup.php?error=wrongpasswordmatch");
            exit();
        }
        if ($this->passwordNotMatch() == false) {
            header("location: ../signup.php?error=wrongpasswordmatch");
            exit();
        }
        if ($this->userTakenCheck() == false) {
            header("location: ../signup.php?error=useralreadytaken");
            exit();
        }
        if ($this->invalidContact() == false) {
            header("location: ../signup.php?error=contactinvalid");
            exit();
        }

        $this->setUser($this->user_id, $this->first_name, $this->middle_name, $this->last_name, $this->password, $this->email, $this->contact);
    }

    public function signupStudent()
    {
        $this->setStudent($this->user_id, $this->course_id, $this->year);
    }

    private function invalidUid()
    {
        $result = true;
        if (!preg_match("/^[0-9]*$/", $this->user_id)) {
            $result = false;
        }
        return $result;
    }

    private function passwordNotMatch()
    {
        $result = true;
        if ($this->password !== $this->pwdrepeat) {
            $result = false;
        }
        return $result;
    }
    private function invalidContact()
    {
        $result = true;
        if (!preg_match("/^[0-9]*$/", $this->user_id)) {
            $result = false;
        }
        return $result;
    }

    private function userTakenCheck()
    {
        $result = true;
        if (!$this->checkUser($this->user_id, $this->email)) {
            $result = false;
        }
        return $result;
    }
}
