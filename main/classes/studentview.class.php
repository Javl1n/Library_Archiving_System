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
    public function showStudentList_bC($cid)
    {
        $row = $this->getStudents_bC($cid);

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
                <td></td>

            </tr>
        <?php

        }
    }

    public function showStudentList_bSt($status)
    {
        $row = $this->getStudents_bSt($status);

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
                <td></td>

            </tr>
<?php

        }
    }
}
