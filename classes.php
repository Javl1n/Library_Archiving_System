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
        $sql = "SELECT * FROM student s
                INNER JOIN user u ON u.user_id = s.user_id
                INNER JOIN course c ON c.course_id = s.course_id
                INNER JOIN user_status st ON st.status_id = s.status_id
                WHERE s.user_id = '$id'";
        $query = $this->connection->query($sql);
        $row = $query->fetch_array();
        return $row;
    }
}
