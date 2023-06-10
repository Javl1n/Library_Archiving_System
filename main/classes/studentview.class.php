<?php

class studentview extends student
{

    public function showcourseoptions()
    {

        $row = $this->getCourseList();
        foreach ($row as $row) {
?>
            <option value='<?php echo $row['course_id'] ?>'>
                <?php echo $row['course_title'] ?>
            </option>
        <?php

        }
    }

    public function showcoursebuttons()
    {

        $department = $this->getDepartmentList();

        foreach ($department as $department) {
        ?>
            <h6 class='text-white'><?php echo $department['department_title'] ?></h6>
            <?php
            $course = $this->getCourselist_bD($department['department_id']);
            echo '<ul>';
            foreach ($course as $course) {
            ?>

                <div class="col-12">
                    <hr>
                    <button name='course' value='<?php echo $course['course_id'] ?>' class='text-white button-course'>
                        <?php echo $course['abbreviation'] . ' - ' .  $course['course_title'] ?>
                    </button>

                </div>

        <?php
            }
            echo '</ul><br>';
        }
    }

    public function showStudent($student_id)
    {
        $results = $this->getStudent($student_id);
        return $results;
    }

    public function viewStudentProfile($student)
    {
        $row = $this->showStudent($student);
        if (isset($_POST['edit'])) {
            $readonly = ' ';
            $plain_text = ' ';
        } else {
            $readonly = 'readonly';
            $plain_text = '-plaintext';
        }
        ?>
        <div class="row">
            <div class="col-lg-4 col-md-12 ps-4 pt-5">
                <div class="col-lg-7 col-sm-5 mx-auto">
                    <img src="/library_archiving_system2/main/assets/profiles/default.jpg" alt="" class="img-fluid rounded-circle">
                </div>
                <h3 class="text-center py-lg-4 pt-sm-4"><?php echo $row['first_name'] ?></h3>
            </div>
            <div class="col pt-lg-5 pt-sm-2 ps-lg-5">
                <form action="profile.student.php" method="post">
                    <!-- Student ID -->
                    <div class="row py-1">
                        <div class="col-lg-3 col-sm-4 py-sm-0 ps-sm-2 pe-0">
                            <label for="student_id" class="col-form-label form-control-lg">Student ID:</label>
                        </div>
                        <div class="col-sm-6 col-lg-8">
                            <?php
                            $id1 = $row['user_id'] / 100000;
                            $id2 = $row['user_id'] % 100000;
                            $idf = intval($id1) . '-' . sprintf('%05d', $id2);
                            ?>
                            <input type="text" id="student_id" class="form-control-plaintext form-control-lg" value="<?php echo $idf ?>" readonly>
                        </div>
                    </div>
                    <!-- Full Name -->
                    <div class="row py-1">
                        <div class="col-lg-3 col-sm-4 py-sm-0 ps-sm-2">
                            <label for="full_name" class="col-form-label form-control-lg">Full Name:</label>
                        </div>
                        <div class="col-sm-7 col-lg-8">
                            <?php
                            $middle_name = $row['middle_name'];
                            $MI = $middle_name[0];
                            $full_name = $row['first_name'] . ' ' . $MI . '. ' . $row['last_name'];
                            ?>
                            <input type="text" id="full_name" class="form-control<?php echo $plain_text; ?> form-control-lg" value="<?php echo $full_name ?>" <?php echo $readonly; ?>>
                        </div>
                    </div>
                    <!-- Course -->
                    <div class="row py-1">
                        <div class="col-lg-3 col-sm-4 py-sm-0 ps-sm-2">
                            <label for="student_id" class="col-form-label form-control-lg">Course:</label>
                        </div>
                        <div class="col-sm-7 col-lg-8">
                            <?php
                            $course = $row['abbreviation'] . ' - ' . $row['course_title'];
                            ?>
                            <input type="text" id="student_id" class="form-control-plaintext form-control-lg" value="<?php echo $course ?>" <?php echo $readonly; ?>>
                        </div>
                    </div>
                    <!-- Year Level -->
                    <div class="row py-1">
                        <div class="col-lg-3 col-sm-4 py-sm-0 ps-sm-2">
                            <label for="year_level" class="col-form-label form-control-lg">Year Level:</label>
                        </div>
                        <div class="col-sm-7 col-lg-8">
                            <?php
                            $year = $row['year_level'];
                            switch ($year % 10) {
                                case 1:
                                    $year_level = $year . 'st';
                                    break;
                                case 2:
                                    $year_level = $year . 'nd';
                                    break;
                                case 3:
                                    $year_level = $year . 'rd';
                                    break;
                                default:
                                    $year_level = $year . 'th';
                                    break;
                            }
                            ?>
                            <input type="text" id="year_level" class="form-control<?php echo $plain_text; ?> form-control-lg" value="<?php echo $year_level ?> year" <?php echo $readonly; ?>>
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="row py-1">
                        <div class="col-lg-3 col-sm-4 py-sm-0 ps-sm-2 pe-0">
                            <label for="email" class="col-form-label form-control-lg">Email:</label>
                        </div>
                        <div class="col-sm-6 col-lg-8">
                            <input type="text" id="email" class="form-control-plaintext form-control-lg" value="<?php echo $row['email'] ?>" <?php echo $readonly; ?>>
                        </div>
                    </div>
                    <!-- Contact -->
                    <div class="row py-1">
                        <div class="col-lg-3 col-sm-4 py-sm-0 ps-sm-2 pe-0">
                            <label for="contact" class="col-form-label form-control-lg">Contact:</label>
                        </div>
                        <div class="col-sm-6 col-lg-8">
                            <input type="text" id="contact" class="form-control-plaintext form-control-lg" value="<?php echo sprintf('%011d', $row['contact_number'])  ?>" <?php echo $readonly; ?>>
                        </div>
                    </div>

                    <div class="row justify-content-end pt-3">
                        <?php if (isset($_POST['edit'])) { ?>
                            <div class="col-lg-1 col-sm-2">
                                <button type="submit" name="save" class="btn btn-orange">Save</button>
                            </div>
                        <?php } else { ?>

                            <div class="col-lg-2 col-sm-3">
                                <button type="submit" name="edit" class="btn btn-orange">Edit Profile</button>
                            </div>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>
        <?php
    }

    public function showStudentList($cid, $status)
    {
        $row = $this->getStudents_bC($cid, $status);
        if ($cid != 0) {
            $row = $this->getStudents_bC($cid, $status);
        } else {
            $row = $this->getStudents_bSt($status);
        }
        foreach ($row as $row) {
            $full_name = $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'];
            $id1 = $row['user_id'] / 100000;
            $id2 = $row['user_id'] % 100000;
            if ($row['year_level'] == 1) {
                $year = '1st year';
            } else if ($row['year_level'] == 2) {
                $year = '2nd year';
            } else if ($row['year_level'] == 3) {
                $year = '3rd year';
            } else if ($row['year_level'] == 4) {
                $year = '4th year';
            }
        ?>
            <tr>

                <td><?php echo intval($id1) . '-' . sprintf('%05d', $id2); ?></th>
                <td><?php echo $full_name ?></td>
                <td><?php echo $row['course_title'] . " (" . $row['abbreviation'] . ")" ?></td>
                <td><?php echo $year ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['contact_number'] ?></td>
                <td><?php echo $row['status_title'] ?></td>
                <td>
                    <form action="/LIBRARY_ARCHIVING_SYSTEM2/main/includes/status_update.inc.php" method='post'>
                        <input type="hidden" name="student_id" value="<?php echo $row['user_id'] ?>">
                        <button class="btn btn-<?php
                                                if ($status == 1) {
                                                    echo 'danger';
                                                } elseif ($status == 2) {
                                                    echo 'success';
                                                }
                                                ?>" name="status_update" value="
                        <?php
                        if ($status == 1) {
                            echo 2;
                        } else if ($status == 2) {
                            echo 1;
                        }
                        ?>">
                            <?php
                            if ($status == 1) {
                                echo 'restrict';
                            } else if ($status == 2) {
                                echo 'unrestrict';
                            }
                            ?>
                        </button>
                    </form>
                </td>

            </tr>
<?php

        }
    }
}
