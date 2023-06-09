<?php

class article extends dbconnection
{
    protected function getDepartmentList()
    {
        $sql = "SELECT * FROM department";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();
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

    protected function getCourselist_bD($id)
    {
        $sql = "SELECT * FROM course WHERE department_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getTags()
    {
        $sql = "SELECT * FROM tag";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();
        return $results;
    }
}
