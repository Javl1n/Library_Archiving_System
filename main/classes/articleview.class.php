<?php

class articleview extends article
{
    public function showCourseButtons()
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

    public function showTagButtons()
    {
        $tag = $this->getTags();
        ?><div class="d-grid gap-3 d-md-block">
            <?php
            foreach ($tag as $tag) {
            ?>
                <button name='tag' value='<?php echo $tag['tag_id'] ?>' class='btn btn-outline-light m-lg-1'>
                    <?php echo $tag['tag_title'] ?>
                </button>
            <?php
            }
            ?>
        </div>
        <?php
    }

    public function showArticles($cid, $tid, $year)
    {
        if ($cid != 0) {
            $articles = $this->getArticlesWithCourse($cid);
        } elseif ($tid != 0) {
            $articles = $this->getArticlesWithTags($tid);
        } elseif ($year != 0) {
            $articles = $this->getArticlesbyYear($year);
        } else {
            $articles = $this->getArticles();
        }

        foreach ($articles as $articles) { ?>
            <td><?php echo $articles['article_id'] ?></th>
            <td><?php echo $articles['article_title'] ?></td>
            <td><?php echo $articles['year_published'] ?></td>
            <td><?php echo $articles['course_title'] . ' (' . $articles['abbreviation'] . ')'; ?></td>
            <td></td>
<?php
        }
    }
}
