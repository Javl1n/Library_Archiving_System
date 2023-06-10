<?php

class studentcontr extends student
{
    public function updateStudentStatus($student, $status)
    {
        $this->updateStatus($student, $status);
    }

    public function updateStudentProfile($student_id, $first_name, $middle_name, $last_name, $course, $year_level, $email, $contact)
    {
        $successes = $this->updateStudent($student_id, $course, $year_level);
        if (!$successes) {
            echo 'DILI MA UPDATE ANG STUDENTs<br>';
        }
        $success = $this->updateUser($student_id, $first_name, $middle_name, $last_name, $email, $contact);
        if (!$success) {
            echo 'DILI MA UPDATE ANG USERs';
        }
    }
}
