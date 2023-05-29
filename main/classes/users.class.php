<?php
include_once('dbconnection.class.php');

class Users extends dbconnection
{
    protected function getUser($user_id)
    {
        $sql = "SELECT * FROM user WHERE user_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user_id]);

        $results = $stmt->fetchAll();

        return $results;
    }

    protected function setUser($user_id, $first_name, $middle_name, $last_name, $password)
    {
        $sql = "INSERT INTO user (user_id, first_name, middle_name, last_name, user_type_id, password) VALUES (?, ?, ?, ?, 2, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user_id, $first_name, $middle_name, $last_name, $password]);
    }

    protected function getStudent($user_id)
    {
        $sql = "SELECT * FROM student s 
                INNER JOIN user u ON u.user_id = s.user_id
                INNER JOIN course c ON c.course_id = s.course_id
                INNER JOIN user_status st ON st.status_id = s.status_id
                WHERE s.user_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user_id]);

        $results = $stmt->fetch();

        return $results;
    }

    protected function setStudent($user_id, $first_name, $middle_name, $last_name, $password)
    {
        $sql = "INSERT INTO user (user_id, first_name, middle_name, last_name, user_type_id, password) VALUES (?, ?, ?, ?, 2, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user_id, $first_name, $middle_name, $last_name, $password]);
    }

    protected function getCourse($user_id)
    {
        $sql = "SELECT * FROM user WHERE user_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user_id]);

        $results = $stmt->fetchAll();

        return $results;
    }

    protected function getstatus($user_id)
    {
        $sql = "SELECT * FROM user WHERE user_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user_id]);

        $results = $stmt->fetchAll();

        return $results;
    }
}
