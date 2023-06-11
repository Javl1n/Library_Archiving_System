<?php

class studentcontr extends student
{
    public function updateStudentStatus($student, $status)
    {
        $this->updateStatus($student, $status);
    }

    public function updateStudentProfile($student_id, $first_name, $middle_name, $last_name, $course, $year_level, $email, $contact)
    {
        $this->updateStudent($student_id, $course, $year_level);
        $this->updateUser($student_id, $first_name, $middle_name, $last_name, $email, $contact);
    }

    public function verifyStudent($student_id)
    {
        $this->updateStudentVerification($student_id, 1);
    }

    public function submitVerification($id, $file_name, $file_tmp_name, $file_size, $file_error, $file_type)
    {
        if ($this->checkPic($file_name) == false) {
            header("location: ../student/verify.profile.student.php?error=invalid_file_name");
            exit();
        }
        if ($file_error === 1) {
            header("location: ../student/verify.profile.student.php?error=uploading_file_failed");
            exit();
        }
        if ($file_size > 500000) {
            header("location: ../student/verify.profile.student.php?error=file_too_large_size=$file_size");
            exit();
        }
        $file_actual_extension = $this->getPicFilExt($file_name);
        $file_name_new = $id . '_verification.' . $file_actual_extension;
        $file_destination = '../assets/verifications/' . $file_name_new;
        if (!move_uploaded_file($file_tmp_name, $file_destination)) {
            header("location: ../student/verify.profile.student.php?error=moving_file_failed_tmp= $file_destination");
            exit();
        }
        $this->submitVerReq($id, $file_name_new);
        header('location: ../student/profile.student.php?upload_success');
    }

    public function setProfilePicture($id, $file_name, $file_tmp_name, $file_size, $file_error, $file_type)
    {
        if ($this->checkPic($file_name) == false) {
            header("location: ../student/profile.student.php?error=invalid_file_name");
            exit();
        }
        if ($file_error === 1) {
            header("location: ../student/profile.student.php?error=uploading_file_failed");
            exit();
        }

        if ($file_size > 500000) {
            header("location: ../student/profile.student.php?error=file_too_large_size=$file_size");
            exit();
        }
        list($width, $height, $type, $attr) = getimagesize($file_tmp_name);

        if ($width < ($height - 10) || $width > ($height + 10)) {
            header("location: ../student/profile.student.php?error=picture_not_squared w:$width h:$height");
            exit();
        }
        $old_file_png = $id .  '.png';
        $old_file_jpeg = $id .  '.jpeg';
        $old_file_jpg = $id .  '.jpg';

        $file_actual_extension = $this->getPicFilExt($file_name);
        $file_name_new = $id . '.' . $file_actual_extension;
        $path = '../assets/profiles/';
        $file_destination = $path . $file_name_new;
        if (file_exists($path . $old_file_png)) {
            unlink($path . $old_file_png);
        }
        if (file_exists($path . $old_file_jpeg)) {
            unlink($path . $old_file_jpeg);
        }
        if (file_exists($path . $old_file_jpg)) {
            unlink($path . $old_file_jpg);
        }
        if (!move_uploaded_file($file_tmp_name, $file_destination)) {
            header("location: ../student/profile.student.php?error=moving_file_failed_tmp= $file_destination");
            exit();
        }
        $this->updateProfilePicture($id, $file_name_new);
        header('location: ../student/profile.student.php?upload_success');
    }

    public function checkPic($file_name)
    {
        $file_actual_extension = $this->getPicFilExt($file_name);
        $allowed = array('jpg', 'jpeg', 'png');
        if (in_array($file_actual_extension, $allowed)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public function getPicFilExt($file_name)
    {
        $file_extension = explode('.', $file_name);
        $file_actual_extension = strtolower(end($file_extension));
        return $file_actual_extension;
    }
}
