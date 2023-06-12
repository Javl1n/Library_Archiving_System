<?php

class articleview extends article
{
    public function showCourseButtons()
    {

        $department = $this->getDepartmentList();

        foreach ($department as $department) { ?>
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
        ?><div class="d-block">
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

        foreach ($articles as $article) { ?>
            <td><?php echo $article['article_id'] ?></th>
            <td><?php echo $article['article_title'] ?></td>
            <td><?php echo $article['year_published'] ?></td>
            <td><?php echo $article['course_title'] . ' (' . $article['abbreviation'] . ')'; ?></td>
            <td>
                <form action="student_verification_view.admin.php" method='post'>
                    <button class="btn btn-orange" name="view" value="<?php echo $article['article_id'] ?>">
                        View
                    </button>
                </form>
            </td>

        <?php }
    }

    public function showMyArticles($id, $cid, $tid, $year)
    {
        if ($cid != 0) {
            $articles = $this->getMyArticlesWithCourse($id, $cid);
        } elseif ($tid != 0) {
            $articles = $this->getMyArticlesWithTags($id, $tid);
        } elseif ($year != 0) {
            $articles = $this->getMyArticlesbyYear($id, $year);
        } else {
            $articles = $this->getAuthArticles($id);
        }

        foreach ($articles as $article) { ?>
            <td><?php echo $article['article_id'] ?></th>
            <td><?php echo $article['article_title'] ?></td>
            <td><?php echo $article['year_published'] ?></td>
            <td><?php echo $article['course_title'] . ' (' . $article['abbreviation'] . ')'; ?></td>
            <td><?php echo $article['article_status_title']; ?></td>
            <td>
                <form action="" method='post'>
                    <button class="btn btn-orange" name="view" value="<?php echo $article['article_id'] ?>">
                        View
                    </button>
                </form>
            </td>

        <?php }
    }

    public function uploadArticleUI($id)
    {
        $student = new studentview;
        $row = $student->showStudent($id);
        $tags = $this->getTags();
        $authors = $this->getAuthors();
        ?>
        <form action="../includes/upload_article.inc.php" method="POST" enctype="multipart/form-data">
            <!-- Title -->
            <div class="row py-3">
                <div class="col-lg-2 col-sm-4 py-sm-0 ps-sm-2">
                    <label for="first_name" class="col-form-label form-control-lg">Title:</label>
                </div>
                <div class="col-sm-7 col-lg-10">
                    <input type="text" id="first_name" name="title" class="form-control form-control-lg" required>
                </div>
            </div>
            <!-- Course -->
            <div class="row py-1">
                <div class="col-lg-2 col-sm-4 py-sm-0 ps-sm-2">
                    <label for="course" class="col-form-label form-control-lg">Course:</label>
                </div>

                <div class="col-sm-7 col-lg-10">
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
            </div>
            <!-- Authors -->
            <div class="row py-3">
                <div class="col-lg-2 col-sm-4 py-sm-0 ps-sm-2">
                    <label for="first_name" class="col-form-label form-control-lg">Authors:</label>
                </div>
                <div class="col-sm-7 col-lg-10">
                    <div class="card" style="height: 100px">
                        <div class="card-body mh-100 overflow-y-scroll gap-5 d-block">
                            <?php foreach ($authors as $author) {
                                $id = 'author-' . $author['user_id'];
                                if (!empty($author['middle_name'])) {
                                    $MI = $author['middle_name'][0];
                                } else {
                                    $MI = '';
                                }
                                $fullName = $author['first_name'] . ' ' . $MI . '. ' . $author['last_name'];
                                if ($row['user_id'] == $author['user_id']) {
                                    $checked = 'autocomplete="off" checked';
                                } else {
                                    $checked = '';
                                } ?>
                                <input type="checkbox" class="btn-check" id="<?php echo $id ?>" name="author[]" value="<?php echo $author['user_id'] ?>" <?php echo $checked ?>>
                                <label class="btn btn-outline-dark" for="<?php echo $id ?>"><?php echo $fullName ?></label>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tags -->
            <div class="row py-3">
                <div class="col-lg-2 col-sm-4 py-sm-0 ps-sm-2">
                    <label for="first_name" class="col-form-label form-control-lg">Tags:</label>
                </div>
                <div class="col-sm-7 col-lg-10">
                    <div class="card" style="height: 150px">
                        <div class="card-body mh-100 overflow-y-scroll">
                            <?php foreach ($tags as $tag) { ?>
                                <input type="checkbox" class="btn-check" id="tag-<?php echo $tag['tag_id'] ?>" name="tag[]" value="<?php echo $tag['tag_id'] ?>" autocomplete="off">
                                <label class="btn btn-outline-dark" for="tag-<?php echo $tag['tag_id'] ?>"><?php echo $tag['tag_title'] ?></label>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Abstraction -->
            <div class="row py-3">
                <div class="col-lg-2 col-sm-4 py-sm-0 ps-sm-2">
                    <label for="first_name" class="col-form-label form-control-lg">Abstraction:</label>
                </div>
                <div class="col-sm-7 col-lg-10">
                    <textarea class="form-control" name="abstraction" placeholder="Description about your article..." rows="10" id="floatingTextarea" required></textarea>
                </div>
            </div>
            <!-- Button -->
            <div class="row justify-content-end ">
                <div class="col-lg-2 col-sm-3 ps-5">
                    <button name="submit" class="btn btn-success">Upload</button>
                </div>
            </div>
        </form>
<?php }
}
