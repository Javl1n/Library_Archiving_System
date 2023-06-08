<?php

class studentcontr extends student
{
    public function updateStudentStatus($student, $status)
    {
        $this->updateStatus($student, $status);
    }
}
