<?php

class student extends dbconnection
{

    public function getCourseList($id)
    {
        $sql = "SELECT * FROM course WHERE course_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $results = $stmt->fetchALL();
        return $results;
    }
}
