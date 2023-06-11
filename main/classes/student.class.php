<?php

class student extends dbconnection
{
    protected function getStudent($student_id)
    {
        $sql = "SELECT * FROM student s 
                INNER JOIN user u ON u.user_id = s.user_id
                INNER JOIN course c ON c.course_id = s.course_id
                INNER JOIN student_status st ON st.status_id = s.status_id
                INNER JOIN verification_status vs ON vs.verification_status_id = s.verification_status_id
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

    protected function getCourselist_bD($id)
    {
        $sql = "SELECT * FROM course where department_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $results = $stmt->fetchAll();
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
    protected function getStudents_vpCourse($cid)
    {
        $sql = "SELECT * FROM student s 
                INNER JOIN user u ON u.user_id = s.user_id
                INNER JOIN course c ON c.course_id = s.course_id
                INNER JOIN student_status st ON st.status_id = s.status_id
                WHERE s.course_id = ? AND s.verification_status_id = 2";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$cid]);
        $results = $stmt->fetchAll();

        return $results;
    }
    protected function getStudents_vPending()
    {
        $sql = "SELECT * FROM student s 
                INNER JOIN user u ON u.user_id = s.user_id
                INNER JOIN course c ON c.course_id = s.course_id
                INNER JOIN student_status st ON st.status_id = s.status_id
                WHERE s.verification_status_id = 2";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([]);
        $results = $stmt->fetchAll();

        return $results;
    }
    protected function getStudents_bCourse($cid, $status)
    {
        $sql = "SELECT * FROM student s 
                INNER JOIN user u ON u.user_id = s.user_id
                INNER JOIN course c ON c.course_id = s.course_id
                INNER JOIN student_status st ON st.status_id = s.status_id
                WHERE s.course_id = ? AND s.status_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$cid, $status]);
        $results = $stmt->fetchAll();

        return $results;
    }
    protected function getStudents_bStatus($status)
    {
        $sql = "SELECT * FROM student s 
                INNER JOIN user u ON u.user_id = s.user_id
                INNER JOIN course c ON c.course_id = s.course_id
                INNER JOIN student_status st ON st.status_id = s.status_id
                WHERE s.status_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$status]);
        $results = $stmt->fetchAll();

        return $results;
    }

    protected function updateStatus($student_id, $status)
    {
        $sql = "UPDATE student 
                SET status_id = ?
                WHERE user_id = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$status, $student_id]);

        $stmt = null;
    }

    protected function updateStudent($student_id, $course, $year_level)
    {
        $sql = "UPDATE student 
                SET course_id = ?, year_level = ?
                WHERE user_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $success = $stmt->execute([$course, $year_level, $student_id]);
        if (!$success) {
            echo 'DILI MA UPDATE ANG STUDENT';
        }
        $stmt = null;
    }

    protected function updateStudentVerification($student_id, $ver_id)
    {
        $sql = "UPDATE student 
                SET verification_status_id = ?
                WHERE user_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $success = $stmt->execute([$ver_id, $student_id]);
        if (!$success) {
            echo 'DILI MA UPDATE ANG STUDENT';
        }
        $stmt = null;
    }

    protected function updateUser($student_id, $first_name, $middle_name, $last_name, $email, $contact)
    {
        $sql = "UPDATE user 
                SET first_name = ?,
                middle_name = ?,
                last_name = ?,
                email = ?,
                contact_number = ?
                WHERE user_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$first_name, $middle_name, $last_name, $email, $contact, $student_id]);

        $stmt = null;
    }

    protected function submitVerReq($student_id, $photo)
    {
        $sql = "UPDATE student 
            SET verification_photo = ?,
            verification_status_id = 2
            WHERE user_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$photo, $student_id]);

        $stmt = null;
    }
}
