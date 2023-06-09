<div class="col-3 min-vh-100 offcanvas-lg offcanvas-start text-bg-dark overflow-auto" tabindex="-1" id="filters" aria-labelledby="filterLabels">
    <div class="offcanvas-header">
        <h2 class="offcanvas-title" id="filterLabels">Filter by</h2>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" data-bs-target="#filters" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body col-12">
        <?php
        if ($_SESSION['user_type'] == 1) {
            $action = 'article_manage.admin.php';
        } elseif ($_SESSION['user_type'] == 2 || $_SESSION['user_type'] == 3) {
            $action = 'article.student.php';
        }
        ?>
        <form action="<?php echo $action; ?>" class="w-100" method="post">
            <div class="row d-sm-none d-md-block py-3">

                <h2>Filter by:</h2>

            </div>
            <?php
            $filter = new articleview;
            ?>

            <a class="link-underline link-underline-opacity-0 text-white fs-4" data-bs-toggle="collapse" href="#courseOption" role="button" aria-expanded="false" aria-controls="courseOption">
                Courses

            </a>
            <div class="collapse" id="courseOption">
                <br>
                <?php
                $filter->showCourseButtons();
                ?>
            </div>
            <hr>

            <a class="link-underline link-underline-opacity-0 text-white fs-4" data-bs-toggle="collapse" href="#tags" role="button" aria-expanded="false" aria-controls="tags">
                Tags
            </a>
            <div class="collapse" id="tags">
                <br>
                <?php
                $filter->showTagButtons();
                ?>
            </div>
            <hr>

            <div class="input-group input-group-md text-bg-dark">
                <span class="input-group-text text-bg-dark" id="basic-addon1">Year</span>
                <select class="form-select text-bg-dark" id="inputGroupSelect04" name="year" aria-label="Example select with button addon">
                    <?php
                    for ($year = 2017; $year <= 2023; $year++) {
                        if (isset($_POST['year_search'])) {
                            if ($year == $_POST['year']) {
                                $selected = 'selected';
                            } else {
                                $selected = ' ';
                            }
                        } else {
                            $selected = ' ';
                        }
                    ?>
                        <option value="<?php echo $year; ?>" <?php echo $selected; ?>><?php echo $year; ?></option>
                    <?php } ?>
                </select>
                <button class="btn btn-outline-light" type="submit" name="year_search">Search</button>
            </div>
            <hr>
            <div class="row justify-content-end pt-3 px-5">
                <div class="col-2">
                    <a class="btn btn-outline-light btn-lg" href="<?php echo $action; ?>">Reset</a>
                </div>
            </div>
        </form>
    </div>
</div>