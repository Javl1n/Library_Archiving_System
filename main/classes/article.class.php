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

    protected function setArchive($article)
    {
        $sql = "INSERT INTO archive (archive_id, archive_title, year_published, article_description, course_id, archive_status_id)
                VALUES (?, ?, ?, ?, ?, 1)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$article['article_id'], $article['article_title'], $article['year_published'], $article['article_description'], $article['course_id']]);

        $stmt = null;
    }

    protected function setArchiveAuthors($id, $author)
    {
        $sql = "INSERT INTO archive_author (archive_id, student_id) VALUES (?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id, $author]);

        $stmt = null;
    }

    protected function setArchiveTags($id, $tag)
    {
        $sql = "INSERT INTO archive_tag (archive_id, tag_id) VALUES (?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id, $tag]);

        $stmt = null;
    }

    protected function getArchives()

    protected function permaDeleteArticle($id)
    {
        $sql = "DELETE FROM article WHERE article_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $stmt = null;
    }

    protected function updateArticle($id, $title, $cid, $description)
    {
        $sql = "UPDATE article
                SET article_title = ?,
                    course_id = ?,
                    article_description = ?
                WHERE article_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$title, $cid, $description, $id]);

        $stmt = null;
    }

    protected function updateArticleStatus($id, $status)
    {
        $sql = "UPDATE article
                SET article_status_id = ?
                WHERE article_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$status, $id]);

        $stmt = null;
    }

    protected function setAuthors($id, $author)
    {
        $sql = "INSERT INTO author (article_id, student_id) VALUES (?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id, $author]);

        $stmt = null;
    }

    protected function deleteAuthors($id)
    {
        $sql = "DELETE FROM author WHERE article_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $stmt = null;
    }
    protected function setTags($id, $tag)
    {
        $sql = "INSERT INTO article_tag (article_id, tag_id) VALUES (?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id, $tag]);

        $stmt = null;
    }

    protected function deleteTags($id)
    {
        $sql = "DELETE FROM article_tag WHERE article_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

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

    protected function getArticleWTags($id)
    {
        $sql = "SELECT * FROM article art
                    INNER JOIN course c ON c.course_id = art.course_id
                    INNER JOIN article_status ars ON ars.article_status_id = art.article_status_id
                    INNER JOIN (article_tag artag 
                                    INNER JOIN tag t ON t.tag_id = artag.tag_id)
                        ON artag.article_id = art.article_id
                WHERE art.article_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $results = $stmt->fetchALL();
        return $results;
    }

    protected function getArticleWAuthors($id)
    {
        $sql = "SELECT * FROM article art
                    INNER JOIN course c ON c.course_id = art.course_id
                    INNER JOIN article_status ars ON ars.article_status_id = art.article_status_id
                    INNER JOIN (author auth 
                                    INNER JOIN user u ON u.user_id = auth.student_id)
                        ON auth.article_id = art.article_id
                WHERE art.article_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $results = $stmt->fetchALL();
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

    protected function getArticles($status)
    {
        $sql = "SELECT * FROM article a
                INNER JOIN course c ON c.course_id = a.course_id
                INNER JOIN article_status ast ON ast.article_status_id = a.article_status_id
                WHERE a.article_status_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$status]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getArticlesWithTags($tag, $status)
    {
        $sql = "SELECT * FROM article_tag arg
                INNER JOIN (article arc INNER JOIN course c ON c.course_id = arc.course_id)
                        ON arc.article_id = arg.article_id
                WHERE arg.tag_id = ? AND arc.article_status_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$tag, $status]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getArticlesWithCourse($course, $status)
    {
        $sql = "SELECT * FROM article a
                INNER JOIN course c ON c.course_id = a.course_id
                WHERE a.course_id = ? AND a.article_status_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$course, $status]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getArticlesbyYear($year, $status)
    {
        $sql = "SELECT * FROM article a
                INNER JOIN course c ON c.course_id = a.course_id
                WHERE YEAR(year_published) = ? AND a.article_status_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$year, $status]);
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
