<?php
include_once('dbconnection.php');

class user extends dbconnection
{

    public function __construct()
    {
        parent::connect();
    }

    public function check_login($id, $password)
    {

        $sql = "SELECT * FROM user WHERE user_id = '$id' AND password = '$password'";
        $query = $this->connection->query($sql);

        if ($query->num_rows > 0) {
            $user = $query->fetch_array();
            return $user['id'];
        } else {
            return false;
        }
    }

    public function check_user_type($id)
    {
    }

    public function student_info($id)
    {
        $sql = "SELECT * FROM student
        INNER JOIN user ON user.user_id = student.user_id
        INNER JOIN course ON course.course_id = student.course_id
        INNER JOIN user_status ON user_status.status_id = student.status_id
        WHERE student.user_id = '$id'";
        $query = $this->connection->query($sql);
        $row = $query->fetch_array();
        return $row;
    }
}
