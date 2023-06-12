<?php

class studentview extends student
{

    public function showcourseoptions()
    {

        $row = $this->getCourseList();
        foreach ($row as $row) { ?>

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

    public function viewVerificationInfo($student_id)
    {
        $row = $this->showStudent($student_id);
        ?>
        <div class="row">
            <div class="col-lg-4 col-md-12 ps-4 pt-5">
                <div class="col-lg-12 col-sm-12 mx-auto pb-lg-5">
                    <img src="/library_archiving_system2/main/assets/verifications/<?php echo $row['verification_photo'] ?>" alt="" class="img-fluid img-thumbnail rounded">
                </div>
            </div>
            <div class="col pt-lg-5 pt-sm-2 ps-lg-5 my-auto">
                <form action="../includes/verify_student.inc.php" method="post">
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
                            <input type="hidden" name="student_id" value="<?php echo $row['user_id'] ?>">
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
                            <input type="text" id="full_name" class="form-control-plaintext form-control-lg" value="<?php echo $full_name ?>" readonly>
                        </div>
                    </div>
                    <!-- Course -->
                    <div class="row py-1">
                        <div class="col-lg-3 col-sm-4 py-sm-0 ps-sm-2">
                            <label for="course" class="col-form-label form-control-lg">Course:</label>
                        </div>
                        <div class="col-sm-7 col-lg-8">
                            <?php
                            $course = $row['abbreviation'] . ' - ' . $row['course_title'];
                            ?>
                            <input type="text" id="course" class="form-control-plaintext form-control-lg" value="<?php echo $course ?>" readonly>
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
                            <input type="text" id="year_level" class="form-control-plaintext form-control-lg" value="<?php echo $year_level ?> year" readonly>
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="row py-1">
                        <div class="col-lg-3 col-sm-4 py-sm-0 ps-sm-2 pe-0">
                            <label for="email" class="col-form-label form-control-lg">Email:</label>
                        </div>
                        <div class="col-sm-6 col-lg-8">
                            <input type="email" id="email" name="email" class="form-control-plaintext form-control-lg" value="<?php echo $row['email'] ?>" readonly>
                        </div>
                    </div>
                    <!-- Contact -->
                    <div class="row py-1">
                        <div class="col-lg-3 col-sm-4 py-sm-0 ps-sm-2 pe-0">
                            <label for="contact" class="col-form-label form-control-lg">Contact:</label>
                        </div>
                        <div class="col-sm-6 col-lg-8">
                            <input type="text" id="contact" name="contact" class="form-control-plaintext form-control-lg" value="<?php echo sprintf('%011d', $row['contact_number'])  ?>" readonly>
                        </div>
                    </div>

                    <div class="row justify-content-end pt-3">
                        <div class="col-lg-2 col-sm-3">
                            <button name="verify" class="btn btn-success">Verify</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }

    public function viewStudentVerificationRequest($student_id)
    {
        $row = $this->showStudent($student_id); ?>

        <form action="../includes/submit_verification.inc.php" method="POST" enctype="multipart/form-data">
            <div class="row">
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
                    <input type="hidden" name="student_id" value="<?php echo $row['user_id'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-4 py-sm-0 ps-sm-2 pe-0">
                    <label for="verification" class="col-form-label form-control-lg">Verification:</label>
                </div>

                <div class="col-sm-8 col-lg-8">
                    <div class="input-group">
                        <input type="file" name="verify" class="form-control" id="verification" onchange="loadFile(event)">
                        <button name="submit" class="btn btn-orange">verify</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mx-auto pt-5">
                    <img id="verify_picture" class="img-fluid img-thumbnail">
                </div>
                <script>
                    var loadFile = function(event) {
                        var image = document.getElementById('verify_picture');
                        image.src = URL.createObjectURL(event.target.files[0]);
                    };
                </script>
            </div>
        </form>

    <?php }

    public function viewStudentProfile($student)
    {
        $row = $this->showStudent($student);
        if (isset($_POST['edit'])) {
            $readonly = ' ';
            $plain_text = ' ';
            $action = '../includes/update_profile.inc.php';
        } else {
            $readonly = 'readonly';
            $plain_text = '-plaintext';
            $action = 'profile.student.php';
        } ?>

        <div class="row">
            <div class="col-lg-4 col-md-12 ps-4 pt-5">
                <!-- Update Profile Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Profile</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="../includes/update_profile_picture.inc.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <input type="hidden" name="student_id" value="<?php echo $row['user_id'] ?>">
                                    <div class="row py-4">
                                        <div class="col-lg-6 mx-auto">
                                            <img id="verify_picture" class="img-fluid rounded-circle">
                                        </div>
                                        <script>
                                            var loadFile = function(event) {
                                                var image = document.getElementById('verify_picture');
                                                image.src = URL.createObjectURL(event.target.files[0]);
                                            };
                                        </script>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-4 py-sm-0 ps-sm-2 pe-0">
                                            <label for="profile_update" class="col-form-label form-control-lg">file:</label>
                                        </div>
                                        <div class="col-sm-8 col-lg-8">
                                            <div class="input-group">
                                                <input type="file" name="profile" class="form-control" id="profile_update" onchange="loadFile(event)">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button name='update_profile' class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-sm-5 mx-auto">
                    <div class="row justify-content-center">
                        <a data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <?php if (empty($row['profile_picture'])) {
                                $profile = 'default.jpg';
                            } else {
                                $profile = $row['profile_picture'];
                            } ?>
                            <img src="/library_archiving_system2/main/assets/profiles/<?php echo $profile ?>" alt="profile picture" class="img-fluid img-thumbnail rounded-circle">
                        </a>
                    </div>




                </div>
                <h3 class="text-center pt-lg-4 pt-sm-4"><?php echo $row['first_name'] ?></h3>
                <h6 class="text-center text-primary">
                    <?php if ($row['verification_status_id'] == 3) { ?>
                        <a href="verify.profile.student.php" class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Verify Account</a>
                    <?php } elseif ($row['verification_status_id'] == 2) { ?>
                        Verification Pending
                    <?php } elseif ($row['verification_status_id'] == 1) { ?>
                        Verified
                    <?php } ?>
                </h6>
            </div>
            <div class="col pt-lg-5 pt-sm-2 ps-lg-5 my-auto">
                <form action="<?php echo $action ?>" method="post" enctype="multipart/form-data">
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
                            <input type="hidden" name="student_id" value="<?php echo $row['user_id'] ?>">
                        </div>
                    </div>
                    <!-- Full Name -->
                    <?php if (isset($_POST['edit'])) { ?>
                        <!-- First Name -->
                        <div class="row py-1">
                            <div class="col-lg-3 col-sm-4 py-sm-0 ps-sm-2">
                                <label for="first_name" class="col-form-label form-control-lg">First Name:</label>
                            </div>
                            <div class="col-sm-7 col-lg-8">
                                <input type="text" id="first_name" name="first_name" class="form-control<?php echo $plain_text; ?> form-control-lg" value="<?php echo $row['first_name'] ?>" <?php echo $readonly; ?>>
                            </div>
                        </div>
                        <!-- Middle Name -->
                        <div class="row py-1">
                            <div class="col-lg-3 col-sm-4 py-sm-0 ps-sm-2">
                                <label for="middle_name" class="col-form-label form-control-lg">Middle Name:</label>
                            </div>
                            <div class="col-sm-7 col-lg-8">
                                <input type="text" id="middle_name" name="middle_name" class="form-control form-control-lg" value="<?php echo $row['middle_name'] ?>">
                            </div>
                        </div>
                        <!-- Last Name -->
                        <div class="row py-1">
                            <div class="col-lg-3 col-sm-4 py-sm-0 ps-sm-2">
                                <label for="last_name" class="col-form-label form-control-lg">Last Name:</label>
                            </div>
                            <div class="col-sm-7 col-lg-8">
                                <input type="text" id="last_name" name="last_name" class="form-control form-control-lg" value="<?php echo $row['last_name'] ?>">
                            </div>
                        </div>
                    <?php } else {  ?>
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
                    <?php }  ?>
                    <!-- Course -->
                    <div class="row py-1">
                        <div class="col-lg-3 col-sm-4 py-sm-0 ps-sm-2">
                            <label for="course" class="col-form-label form-control-lg">Course:</label>
                        </div>
                        <?php if (isset($_POST['edit'])) { ?>
                            <div class="col-sm-7 col-lg-8">
                                <select name="course" id="course" class="form-select form-select-lg">
                                    <?php
                                    $courses = $this->getCourseList();
                                    foreach ($courses as $course) {
                                        $course_full = $course['abbreviation'] . ' - ' . $course['course_title'];
                                        if ($course['course_id'] == $row['course_id']) {
                                            $current_course = 'selected';
                                        } else {
                                            $current_course = '';
                                        }
                                    ?>
                                        <option <?php echo $current_course ?> value="<?php echo $course['course_id'] ?>"><?php echo $course_full ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        <?php } else {  ?>
                            <div class="col-sm-7 col-lg-8">
                                <?php
                                $course = $row['abbreviation'] . ' - ' . $row['course_title'];
                                ?>
                                <input type="text" id="course" class="form-control-plaintext form-control-lg" value="<?php echo $course ?>" <?php echo $readonly; ?>>
                            </div>
                        <?php }  ?>
                    </div>
                    <!-- Year Level -->
                    <div class="row py-1">
                        <div class="col-lg-3 col-sm-4 py-sm-0 ps-sm-2">
                            <label for="year_level" class="col-form-label form-control-lg">Year Level:</label>
                        </div>
                        <?php if (isset($_POST['edit'])) { ?>
                            <div class="col-sm-7 col-lg-8">
                                <select name="year_level" id="year_level" class="form-select form-select-lg">
                                    <?php
                                    for ($year_choice = 1; $year_choice <= 4; $year_choice++) {
                                        if ($year_choice == $row['year_level']) {
                                            $current_yl = 'selected';
                                        } else {
                                            $current_yl = '';
                                        }
                                        switch ($year_choice % 10) {
                                            case 1:
                                                $year_level_choice = $year_choice . 'st';
                                                break;
                                            case 2:
                                                $year_level_choice = $year_choice . 'nd';
                                                break;
                                            case 3:
                                                $year_level_choice = $year_choice . 'rd';
                                                break;
                                            default:
                                                $year_level_choice = $year_choice . 'th';
                                                break;
                                        }
                                    ?>
                                        <option <?php echo $current_yl ?> value="<?php echo $year_choice ?>"><?php echo $year_level_choice . ' year' ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        <?php } else {  ?>
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
                        <?php }  ?>
                    </div>
                    <!-- Email -->
                    <div class="row py-1">
                        <div class="col-lg-3 col-sm-4 py-sm-0 ps-sm-2 pe-0">
                            <label for="email" class="col-form-label form-control-lg">Email:</label>
                        </div>
                        <div class="col-sm-6 col-lg-8">
                            <input type="email" id="email" name="email" class="form-control<?php echo $plain_text; ?> form-control-lg" value="<?php echo $row['email'] ?>" <?php echo $readonly; ?>>
                        </div>
                    </div>
                    <!-- Contact -->
                    <div class="row py-1">
                        <div class="col-lg-3 col-sm-4 py-sm-0 ps-sm-2 pe-0">
                            <label for="contact" class="col-form-label form-control-lg">Contact:</label>
                        </div>
                        <div class="col-sm-6 col-lg-8">
                            <input type="text" id="contact" name="contact" class="form-control<?php echo $plain_text; ?> form-control-lg" value="<?php echo sprintf('%011d', $row['contact_number'])  ?>" <?php echo $readonly; ?>>
                        </div>
                    </div>

                    <div class="row justify-content-end pt-3">
                        <?php if (isset($_POST['edit'])) { ?>
                            <div class="col-lg-1 col-sm-2">
                                <button name="save" class="btn btn-orange">Save</button>
                            </div>
                        <?php } else { ?>

                            <div class="col-lg-2 col-sm-3">
                                <button name="edit" class="btn btn-orange">Edit Profile</button>
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
        if ($cid != 0) {
            $row = $this->getStudents_bCourse($cid, $status);
        } else {
            $row = $this->getStudents_bStatus($status);
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

    public function showVerificationList($cid)
    {
        if ($cid != 0) {
            $row = $this->getStudents_vpCourse($cid);
        } else {
            $row = $this->getStudents_vPending();
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
                    <form action="student_verification_view.admin.php" method='post'>
                        <button class="btn btn-orange" name="view" value="<?php echo $row['user_id'] ?>">
                            View
                        </button>
                    </form>
                </td>

            </tr>
<?php
        }
    }
}
