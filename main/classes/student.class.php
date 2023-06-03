<?php

class student extends dbconnection
{
    protected function getStudent($student_id)
    {
        $sql = "SELECT * FROM student s 
                INNER JOIN user u ON u.user_id = s.user_id
                INNER JOIN course c ON c.course_id = s.course_id
                INNER JOIN user_status st ON st.status_id = s.status_id
                WHERE s.user_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$student_id]);

        $results = $stmt->fetch();

        return $results;
    }
    protected function getCourseList()
    {
        $sql = "SELECT * FROM course";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getStudents()
    {
        $sql = "SELECT * FROM student s 
                INNER JOIN user u ON u.user_id = s.user_id
                INNER JOIN course c ON c.course_id = s.course_id
                INNER JOIN user_status st ON st.status_id = s.status_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();

        return $results;
    }
}
