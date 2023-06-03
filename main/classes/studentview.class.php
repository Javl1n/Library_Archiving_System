<?php

class studentview extends student
{

    public function showcourseoptions()
    {
        $id = 1;
        while ($row = $this->getCourseList($id)) {
?>
            <option value='<?php echo $row[0]['course_id'] ?>'>
                <?php echo  $row[0]['course_title'] ?>
            </option>
<?php
            $id++;
        }
    }
}
