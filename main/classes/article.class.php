<?php

class article extends dbconnection
{

    protected function getLastInsertID()
    {
        $sql = "SELECT last_insert_id()";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetch();
        return $results;
    }

    protected function setAuthors($id, $author)
    {
        $sql = "INSERT INTO author (article_id, student_id) VALUES (?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id, $author]);

        $stmt = null;
    }

    protected function setTags($id, $tag)
    {
        $sql = "INSERT INTO article_tag (article_id, tag_id) VALUES (?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id, $tag]);

        $stmt = null;
    }

    protected function setArticle($title, $course, $description)
    {
        $sql = "INSERT INTO article (article_title, year_published, course_id, article_description, article_status_id) VALUES (?, curdate(), ?, ?, 2);";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$title, $course, $description]);


        $sql = "SELECT LAST_INSERT_ID(article_id) from article order by LAST_INSERT_ID(article_id) desc limit 1;";
        $stmt2 = $this->connect()->prepare($sql);
        $stmt2->execute();
        $results = $stmt2->fetchAll();
        return $results;
    }

    protected function getArticle($id)
    {
        $sql = "SELECT * FROM article art
                    INNER JOIN course c ON c.course_id = art.course_id
                    INNER JOIN article_status ars ON ars.article_status_id = art.article_status_id
                WHERE art.article_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $results = $stmt->fetch();
        return $results;
    }


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

    protected function getAuthors()
    {
        $sql = "SELECT * FROM student s
                                INNER JOIN user u ON u.user_id = s.user_id
                WHERE verification_status_id = 1";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

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

    protected function getAuthArticles($id)
    {
        $sql = "SELECT * FROM author auth
                INNER JOIN (article arc 
                            INNER JOIN course ac ON ac.course_id = arc.course_id
                            INNER JOIN article_status ars ON ars.article_status_id = arc.article_status_id)
                    ON arc.article_id = auth.article_id
                WHERE auth.student_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getMyArticlesWithCourse($id, $course)
    {
        $sql = "SELECT * FROM author auth
                INNER JOIN (article arc
                            INNER JOIN course c ON c.course_id = arc.course_id
                            INNER JOIN article_status ars ON ars.article_status_id = arc.article_status_id)
                ON arc.article_id = auth.article_id
                WHERE arc.course_id = ? AND auth.student_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$course, $id]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getMyArticlesbyYear($id, $year)
    {
        $sql = "SELECT * FROM author auth
                INNER JOIN (article arc 
                            INNER JOIN course c ON c.course_id = arc.course_id
                            INNER JOIN article_status ars ON ars.article_status_id = arc.article_status_id)
                ON arc.article_id = auth.article_id
                WHERE auth.student_id = ? AND YEAR(arc.year_published) = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id, $year]);
        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getMyArticlesWithTags($id, $tag)
    {
        $sql = "SELECT * FROM author auth
                    INNER JOIN (article_tag atag
                                    INNER JOIN (article arc
                                                    INNER JOIN course c ON c.course_id = arc.course_id
                                                    INNER JOIN article_status ars ON ars.article_status_id = arc.article_status_id)
                                    ON arc.article_id = atag.article_id
                                    INNER JOIN tag ON tag.tag_id = atag.tag_id)
                    ON atag.article_id = auth.article_id
                WHERE auth.student_id = ? AND atag.tag_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id, $tag]);

        $results = $stmt->fetchAll();
        return $results;
    }
}
