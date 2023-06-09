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

    protected function getArticles()
    {
        $sql = "SELECT * FROM article a
                INNER JOIN course c ON c.course_id = a.course_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getArticlesWithTags($tag)
    {
        $sql = "SELECT * FROM article_tag arg
                INNER JOIN (article arc INNER JOIN course c ON c.course_id = arc.course_id)
                        ON arc.article_id = arg.article_id
                WHERE arg.tag_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$tag]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getArticlesWithCourse($course)
    {
        $sql = "SELECT * FROM article a
                INNER JOIN course c ON c.course_id = a.course_id
                WHERE a.course_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$course]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getArticlesbyYear($year)
    {
        $sql = "SELECT * FROM article a
                INNER JOIN course c ON c.course_id = a.course_id
                WHERE YEAR(year_published) = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$year]);
        $results = $stmt->fetchAll();
        return $results;
    }
}
