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
                <button name='tag' value='<?php echo $tag['tag_id'] ?>' class='btn btn-outline-light m-1 '>
                    <?php echo $tag['tag_title'] ?>
                </button>
            <?php
            }
            ?>
        </div>
    <?php
    }

    public function showArticle($article_id)
    {
        $article = $this->getArticle($article_id);
        $tags = $this->getArticleWTags($article_id);
        $authors = $this->getArticleWAuthors($article_id); ?>

        <!-- Title -->
        <div class="row py-3">
            <div class="col-lg-2 col-sm-4 py-sm-0 ps-sm-2">
                <label for="first_name" class="col-form-label form-control-lg">Title:</label>
            </div>
            <div class="col-sm-7 col-lg-10">
                <input type="text" id="first_name" value="<?php echo $article['article_title'] ?>" class="form-control-plaintext form-control-lg" readonly>
            </div>
        </div>
        <!-- Course -->
        <div class="row py-1">
            <div class="col-lg-2 col-sm-4 py-sm-0 ps-sm-2">
                <label for="course" class="col-form-label form-control-lg">Course:</label>
            </div>

            <div class="col-sm-7 col-lg-10">
                <?php $course_full = $article['abbreviation'] . ' - ' . $article['course_title'] ?>
                <input type="text" class="form-control-plaintext form-control-lg" value="<?php echo $course_full ?>" readonly>
            </div>
        </div>
        <div class="row row-cols-2">
            <!-- Authors -->
            <div class="row py-3">
                <div class="col-lg-2 col-sm-4 py-sm-0 ps-sm-2">
                    <label for="first_name" class="col-form-label form-control-lg">Authors:</label>
                </div>
                <div class="col-sm-7 col-lg-10">
                    <div class="card" style="height: 100px">
                        <div class="card-body mh-100 overflow-y-scroll gap-5 d-block">
                            <?php foreach ($authors as $author) {
                                if (!empty($author['middle_name'])) {
                                    $MI = $author['middle_name'][0];
                                } else {
                                    $MI = '';
                                }
                                $fullName = $author['first_name'] . ' ' . $MI . '. ' . $author['last_name']; ?>
                                <button class="btn btn-orange my-1"><?php echo $fullName ?></button>
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
                    <div class="card" style="height: 100px">
                        <div class="card-body mh-100 overflow-y-scroll">
                            <?php foreach ($tags as $tag) { ?>
                                <a class="btn btn-orange mt-1"><?php echo $tag['tag_title'] ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Abstraction -->
        <div class="row py-3 justify-content-center">
            <h1 class="text-center">ABSTRACTION</h1>
        </div>
        <div class="row py-3 justify-content-center">
            <div class="col-7">
                <div class="card">
                    <div class="card-body">
                        <p><?php echo $article['article_description'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($article['article_status_id'] == 2) { ?>
            <div class="row justify-content-end">
                <div class="col-2">
                    <form action="../includes/update_article_status.inc.php" method="POST">
                        <input hidden name='article_id' value="<?php echo $article['article_id'] ?>">
                        <button class="btn btn-success" type="submit" name="update" value="1">
                            Approve
                        </button>
                        <button class="btn btn-danger" type="submit" name="update" value="3">
                            Decline
                        </button>
                    </form>
                </div>
            </div>
        <?php }
    }

    public function showArticles($cid, $tid, $year, $user_type)
    {
        if ($cid != 0) {
            $articles = $this->getArticlesWithCourse($cid, 1);
        } elseif ($tid != 0) {
            $articles = $this->getArticlesWithTags($tid, 1);
        } elseif ($year != 0) {
            $articles = $this->getArticlesbyYear($year, 1);
        } else {
            $articles = $this->getArticles(1);
        }
        foreach ($articles as $article) { ?>
            <tr>
                <td><?php echo $article['article_id'] ?></th>
                <td><?php echo $article['article_title'] ?></td>
                <td><?php echo $article['year_published'] ?></td>
                <td><?php echo $article['course_title'] . ' (' . $article['abbreviation'] . ')'; ?></td>
                <td>
                    <?php if ($user_type == 1) {
                        $action = 'view_article.admin.php';
                    } elseif ($user_type == 2) {
                        $action = 'view_article.student.php';
                    } ?>
                    <form action="<?php echo $action ?>" method='post'>
                        <button class="btn btn-orange" name="view" value="<?php echo $article['article_id'] ?>">
                            View
                        </button>
                    </form>
                </td>
            </tr>

        <?php }
    }

    public function showUploadRequests($cid, $tid, $year, $status_id)
    {
        if ($cid != 0) {
            $articles = $this->getArticlesWithCourse($cid, $status_id);
        } elseif ($tid != 0) {
            $articles = $this->getArticlesWithTags($tid, $status_id);
        } elseif ($year != 0) {
            $articles = $this->getArticlesbyYear($year, $status_id);
        } else {
            $articles = $this->getArticles($status_id);
        }
        foreach ($articles as $article) { ?>
            <tr>
                <td><?php echo $article['article_id'] ?></th>
                <td><?php echo $article['article_title'] ?></td>
                <td><?php echo $article['year_published'] ?></td>
                <td><?php echo $article['course_title'] . ' (' . $article['abbreviation'] . ')'; ?></td>
                <td><?php echo $article['article_status_title'] ?></td>
                <td>
                    <form action="view_article.admin.php" method='post'>
                        <button class="btn btn-orange" name="view" value="<?php echo $article['article_id'] ?>">
                            View
                        </button>
                    </form>
                </td>
            </tr>

        <?php }
    }

    public function showMyArchives($id, $cid, $tid, $year)
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
            <tr>
                <td><?php echo $article['article_id'] ?></th>
                <td><?php echo $article['article_title'] ?></td>
                <td><?php echo $article['year_published'] ?></td>
                <td><?php echo $article['course_title'] . ' (' . $article['abbreviation'] . ')'; ?></td>
                <td><?php echo $article['article_status_title']; ?></td>
                <td>
                    <?php if ($article['article_status_id'] == 3) { ?>
                        <form action="../includes/delete_article.inc.php" method='post'>
                            <button class="btn btn-danger w-100" name="delete" type="submit" value="<?php echo $article['article_id'] ?>">
                                Delete
                            </button>
                        </form>
                    <?php } elseif ($article['article_status_id'] == 2) { ?>
                        <form action="my_article.student.php" method='post'>
                            <button class="btn btn-orange w-100" name="edit" type="submit" value="<?php echo $article['article_id'] ?>">
                                Edit
                            </button>
                        </form>
                    <?php } elseif ($article['article_status_id'] == 1) { ?>


                        <div class="row justify-content-center">
                            <div class="col-5 ">
                                <form action="my_article.student.php" method='post'>
                                    <button class="btn btn-orange w-100 " name="edit" type="submit" value="<?php echo $article['article_id'] ?>">Edit</button>
                                </form>
                            </div>
                            <div class="col-6">
                                <form action="../includes/delete_article.inc.php" method='post'>
                                    <button class="btn btn-danger w-100 " name="delete" type="submit" value="<?php echo $article['article_id'] ?>">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </td>
            </tr>

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
            <tr>
                <td><?php echo $article['article_id'] ?></th>
                <td><?php echo $article['article_title'] ?></td>
                <td><?php echo $article['year_published'] ?></td>
                <td><?php echo $article['course_title'] . ' (' . $article['abbreviation'] . ')'; ?></td>
                <td><?php echo $article['article_status_title']; ?></td>
                <td>
                    <?php if ($article['article_status_id'] == 3) { ?>
                        <form action="../includes/delete_article.inc.php" method='post'>
                            <button class="btn btn-danger w-100" name="delete" type="submit" value="<?php echo $article['article_id'] ?>">
                                Delete
                            </button>
                        </form>
                    <?php } elseif ($article['article_status_id'] == 2) { ?>
                        <form action="my_article.student.php" method='post'>
                            <button class="btn btn-orange w-100" name="edit" type="submit" value="<?php echo $article['article_id'] ?>">
                                Edit
                            </button>
                        </form>
                    <?php } elseif ($article['article_status_id'] == 1) { ?>


                        <div class="row justify-content-center">
                            <div class="col-5 ">
                                <form action="my_article.student.php" method='post'>
                                    <button class="btn btn-orange w-100 " name="edit" type="submit" value="<?php echo $article['article_id'] ?>">Edit</button>
                                </form>
                            </div>
                            <div class="col-6">
                                <form action="../includes/delete_article.inc.php" method='post'>
                                    <button class="btn btn-danger w-100 " name="delete" type="submit" value="<?php echo $article['article_id'] ?>">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </td>
            </tr>

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
                                <label class="btn btn-outline-dark my-1" for="<?php echo $id ?>"><?php echo $fullName ?></label>
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
                                <label class="btn btn-outline-dark my-1" for="tag-<?php echo $tag['tag_id'] ?>"><?php echo $tag['tag_title'] ?></label>
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

    public function editArticleUI($article_id)
    {
        $tags = $this->getTags();
        $authors = $this->getAuthors();
        $article = $this->getArticle($article_id);
        $tags_current = $this->getArticleWTags($article_id);
        $authors_current = $this->getArticleWAuthors($article_id);  ?>


        <form action="../includes/edit_article.inc.php" method="POST">
            <!-- Title -->
            <div class="row py-3">
                <div class="col-lg-2 col-sm-4 py-sm-0 ps-sm-2">
                    <label for="title" class="col-form-label form-control-lg">Title:</label>
                </div>
                <div class="col-sm-7 col-lg-10">
                    <input type="text" id="title" name="title" value="<?php echo $article['article_title'] ?>" class="form-control form-control-lg" required>
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
                            if ($course['course_id'] == $article['course_id']) {
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
                                foreach ($authors_current as $author_current) {
                                    if ($author_current['user_id'] == $author['user_id']) {
                                        $checked = 'autocomplete="off" checked';
                                        break;
                                    } else {
                                        $checked = '';
                                    }
                                }
                            ?>
                                <input type="checkbox" class="btn-check" id="<?php echo $id ?>" name="author[]" value="<?php echo $author['user_id'] ?>" <?php echo $checked ?>>
                                <label class="btn btn-outline-dark my-1" for="<?php echo $id ?>"><?php echo $fullName ?></label>
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
                            <?php foreach ($tags as $tag) {
                                if (!empty($tags_current)) {
                                    foreach ($tags_current as $tag_current) {
                                        if ($tag_current['tag_id'] == $tag['tag_id']) {
                                            $checked = 'autocomplete="off" checked';
                                            break;
                                        } else {
                                            $checked = '';
                                        }
                                    }
                                } ?>
                                <input type="checkbox" class="btn-check" id="tag-<?php echo $tag['tag_id'] ?>" name="tag[]" value="<?php echo $tag['tag_id'] ?>" <?php echo $checked ?>>
                                <label class="btn btn-outline-dark my-1" for="tag-<?php echo $tag['tag_id'] ?>"><?php echo $tag['tag_title'] ?></label>
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
                    <textarea class="form-control" name="abstraction" rows="10" id="floatingTextarea"><?php echo $article['article_description'] ?></textarea>
                </div>
            </div>
            <!-- Button -->
            <div class="row justify-content-end ">
                <div class="col-lg-1 col-sm-3 ps-5">
                    <button name="edit" type="submit" class="btn btn-success" value="<?php echo $article['article_id'] ?>">EDIT</button>
                </div>
                <?php if ($article['article_status_id']) { ?>
                    <form action="../includes/delete_article.inc.php" method="post">
                        <!-- <div class="row justify-content-end "> -->
                        <div class="col-lg-2 col-sm-3 ps-5">
                            <button name="delete" type="submit" class="btn btn-danger" value="<?php echo $article['article_id'] ?>">DELETE</button>
                        </div>
                        <!-- </div> -->
                    </form>

                <?php } ?>
            </div>
        </form>

<?php }
}
