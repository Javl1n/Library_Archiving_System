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
    public function showStudent($student_id)
    {
        $results = $this->getStudent($student_id);
        return $results;
    }
    public function showStudentList()
    {
        $row = $this->getStudents();
        foreach ($row as $row) {
        ?>

            <?php echo $row['course_title'] . " (" . $row['abbreviation'] . ") - " ?>

            <?php echo $row['first_name'] ?>
            <?php echo $row['last_name'] ?>

<?php

        }
    }
}
